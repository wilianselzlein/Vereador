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
	public function index() {
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
		$options = array('conditions' => array('Bairro.' . $this->Bairro->primaryKey => $id));
		$this->set('bairro', $this->Bairro->find('first', $options));
		$this->set('cidade', $this->Bairro->Cidade->find('list'));
		$this->set('pendencias', $this->Bairro->Pessoa->Pendencia->find('all', array('conditions' => array('Pessoa.bairro_id' => $id))));
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
				$this->Session->setFlash(__('The bairro foi salvo.'));
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
