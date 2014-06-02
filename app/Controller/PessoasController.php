<?php
App::uses('AppController', 'Controller');
/**
 * Pessoas Controller
 *
 * @property Pessoa $Pessoa
 */
class PessoasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Filter->addFilters(
			array('filter1' => array('OR' => array(
				'Pessoa.id' => array('operator' => 'LIKE'),
				'Pessoa.nome' => array('operator' => 'LIKE'),
				'Pessoa.endereco' => array('operator' => 'LIKE'),
				'Pessoa.numero' => array('operator' => 'LIKE'),
				'Bairro.nome' => array('operator' => 'LIKE'),
				'Cidade.nome' => array('operator' => 'LIKE'),
				'Pessoa.cep' => array('operator' => 'LIKE'),
				'Pessoa.fone' => array('operator' => 'LIKE'),
				'Pessoa.email' => array('operator' => 'LIKE'),
				'Pessoa.celular' => array('operator' => 'LIKE'),   
				'Pessoa.Documento' => array('operator' => 'LIKE'),   
				'Pessoa.titulo' => array('operator' => 'LIKE'),   
				'Pessoa.zona' => array('operator' => 'LIKE'),   
				'Pessoa.secao' => array('operator' => 'LIKE'),   
				'Pessoa.obs'   => array('operator' => 'LIKE')
				)
			)
			)
		);
		$this->Filter->setPaginate('order', 'Pessoa.nome ASC'); // optional
		//$this->Filter->setPaginate('limit', 10); // optional
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Pessoa->recursive = 0;
		$this->set('pessoas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pessoa->exists($id)) {
			throw new NotFoundException(__('Pessoa invalida.'));
		}
		$options = array('conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id), 'recursive' => 3);
		$this->set('pessoa', $this->Pessoa->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pessoa->create();
			if ($this->request->data['Pessoa']['cep'] == '') {
			    $cid = $this->Pessoa->Cidade->findById($this->request->data['Pessoa']['cidade_id']);
			    $this->request->data['Pessoa']['cep'] = $cid['Cidade']['cep'];
			}
			if ($this->Pessoa->save($this->request->data)) {
				$this->Session->setFlash(__('Pessoa salva.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Pessoa nao pode ser salva. Tente novamente.'));
			}
		}
		$cidades = $this->Pessoa->Cidade->find('list');
		$bairros = $this->Pessoa->Bairro->find('list');
                $liders = $this->Pessoa->Lider->find('list');
		$this->set(compact('cidades', 'bairros', 'liders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pessoa->exists($id)) {
			throw new NotFoundException(__('Pessoa invalida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pessoa->save($this->request->data)) {
				$this->Session->setFlash(__('Pessoa foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Pessoa nao pode ser salvo. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id));
			$this->request->data = $this->Pessoa->find('first', $options);
		}
		$cidades = $this->Pessoa->Cidade->find('list');
		$bairros = $this->Pessoa->Bairro->find('list');
                $liders = $this->Pessoa->Lider->find('list');
		$this->set(compact('cidades', 'bairros', 'liders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pessoa->id = $id;
		if (!$this->Pessoa->exists()) {
			throw new NotFoundException(__('Pessoa invalida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pessoa->delete()) {
			$this->Session->setFlash(__('Pessoa deletada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pessoa nao deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
