<?php
App::uses('AppController', 'Controller');
/**
 * Bairros Controller
 *
 * @property Bairro $Bairro
 */
class BairrosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() { //$todos = false
		$this->Filter->addFilters(
			array('filter1' => array('OR' => array(
						'Bairro.id' => array('operator' => 'LIKE'),
						'Bairro.nome' => array('operator' => 'LIKE')
					)
				),
				'filter2' => array(
					'Bairro.cidade_id' => array(
						'select' => $this->Filter->select('Cidades:', $this->Bairro->Cidade->find('list'))
					)
				)	
			)		
		);
		$this->Filter->setPaginate('order', 'Bairro.nome ASC'); // optional
//		if (! $todos)
//		    $this->Filter->setPaginate('limit', 10);
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
               
		
		$this->Bairro->recursive = 0;
		$this->set('bairros', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bairro->exists($id)) {
			throw new NotFoundException(__('Bairro invalido'));
		}
		$options = array('conditions' => array('Bairro.' . $this->Bairro->primaryKey => $id), 'recursive' => 2);
		$this->set('bairro', $this->Bairro->find('first', $options));              
		
                
                $this->Filter->addFilters(
			array('filter1' => array('OR' => array(
						'Pessoa.nome' => array('operator' => 'LIKE'),
                                                'Grupo.nome' => array('operator' => 'LIKE'),
                                                'Pendencia.titulo' => array('operator' => 'LIKE'),
                                                'Pendencia.historico' => array('operator' => 'LIKE'),
                                                'Pendencia.data' => array('operator' => 'LIKE'),
						'User.username' => array('operator' => 'LIKE')
					)
				),
				'filter2' => array(
					'Pendencia.situacao_id' => array(
						'select' => $this->Filter->select('Situação:', $this->Bairro->Pessoa->Pendencia->Situacao->find('list'))
					)
				)	
			)		
		);
		$this->set('pendencias', $this->Bairro->Pessoa->Pendencia->find('all', array('conditions' => array('Pessoa.bairro_id' => $id), 'conditions' => $this->Filter->getConditions())));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bairro->create();
			if ($this->Bairro->save($this->request->data)) {
				$this->Session->setFlash(__('O bairro foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O bairro nao pode ser salvo. Tente novamente.'));
			}
		}
		$cidades = $this->Bairro->Cidade->find('list');
		$this->set(compact('cidades'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bairro->exists($id)) {
			throw new NotFoundException(__('Bairro invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Bairro->save($this->request->data)) {
				$this->Session->setFlash(__('O bairro foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O bairro nao pode ser salvo. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Bairro.' . $this->Bairro->primaryKey => $id));
			$this->request->data = $this->Bairro->find('first', $options);
		}
		$cidades = $this->Bairro->Cidade->find('list');
		$this->set(compact('cidades'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bairro->id = $id;
		if (!$this->Bairro->exists()) {
			throw new NotFoundException(__('Bairro invalido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bairro->delete()) {
			$this->Session->setFlash(__('Bairro deletado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Bairro nao deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
