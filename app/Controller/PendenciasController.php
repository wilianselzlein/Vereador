<?php
App::uses('AppController', 'Controller');
/**
 * Pendencias Controller
 *
 * @property Pendencia $Pendencia
 */
class PendenciasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Filter->addFilters(
			array('filter1' => array('OR' => array(
						'Pendencia.id' => array('operator' => 'LIKE')
					)
				),
				'filter2' => array(
					'Pendencia.pessoa_id' => array(
						'select' => $this->Filter->select('Pessoas:', $this->Pendencia->Pessoa->find('list'))
					)
				),
				'filter3' => array(
					'Pendencia.grupo_id' => array(
						'select' => $this->Filter->select('Grupos:', $this->Pendencia->Grupo->find('list'))
					)
				),
				'filter4' => array(
				    'Pendencia.data' => array(
					'operator' => 'between',
				        'between' => array( 'text' => __(' e ', true), 'date' => true)
					)
				),
				'filter5' => array(
					'Pendencia.situacao_id' => array(
						'select' => $this->Filter->select('Situacaos:', $this->Pendencia->Situacao->find('list'))
					)
				)
			)
		);
		$this->Filter->setPaginate('order', 'Pendencia.id ASC'); // optional
		//$this->Filter->setPaginate('limit', 10); // optional
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Pendencia->recursive = 0;
                $bairros = $this->Pendencia->Pessoa->Bairro->find('list');
		$this->set('pendencias', $this->paginate());
                $this->set('bairros', $bairros);
	}
/**
 * fechar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function fechar($id = null) {
		if (!$this->Pendencia->exists($id)) {
			throw new NotFoundException(__('Pendencia invalida'));
		}
	
		$model = new Pendencia(); 
		$savedata = array();
		$savedata['id'] = $id;
		$savedata['situacao_id'] = 3;
		$model->create();
		$model->save($savedata);

		$this->Session->setFlash(__('Pendencia fechada.'));
		$this->redirect(array('action' => 'index'));
		
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pendencia->exists($id)) {
			throw new NotFoundException(__('Pendencia invalida'));
		}
		$options = array('conditions' => array('Pendencia.' . $this->Pendencia->primaryKey => $id));
		$this->set('pendencia', $this->Pendencia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pendencia->create();
			if ($this->Pendencia->save($this->request->data)) {
				$this->Session->setFlash(__('Pendencia foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Pendencia nao pode ser salvo. Tente novamente.'));
			}
		}
		$users = $this->Pendencia->User->find('list');
		$situacaos = $this->Pendencia->Situacao->find('list');
		$grupos = $this->Pendencia->Grupo->find('list');
		$pessoas = $this->Pendencia->Pessoa->find('list');
		$this->set(compact('users', 'situacaos', 'grupos', 'pessoas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pendencia->exists($id)) {
			throw new NotFoundException(__('Pendencia invalida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pendencia->save($this->request->data)) {
				$this->Session->setFlash(__('Pendencia foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Pendencia nao pode ser salvo. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Pendencia.' . $this->Pendencia->primaryKey => $id));
			$this->request->data = $this->Pendencia->find('first', $options);
		}
		$users = $this->Pendencia->User->find('list');
		$situacaos = $this->Pendencia->Situacao->find('list');
		$grupos = $this->Pendencia->Grupo->find('list');
		$pessoas = $this->Pendencia->Pessoa->find('list');
		$this->set(compact('users', 'situacaos', 'grupos', 'pessoas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pendencia->id = $id;
		if (!$this->Pendencia->exists()) {
			throw new NotFoundException(__('Pendencia invalida.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pendencia->delete()) {
			$this->Session->setFlash(__('Pendencia deletado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pendencia nao deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
