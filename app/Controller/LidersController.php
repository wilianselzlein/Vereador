<?php
App::uses('AppController', 'Controller');
/**
 * Liders Controller
 *
 * @property Lider $Lider
 */
class LidersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Lider->recursive = 0;
		$this->set('liders', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Lider->exists($id)) {
			throw new NotFoundException(__('Invalid lider'));
		}
		$options = array('conditions' => array('Lider.' . $this->Lider->primaryKey => $id));
		$this->set('lider', $this->Lider->find('first', $options));
		$this->set('bairro', $this->Lider->Pessoa->Bairro->find('list'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Lider->create();
			if ($this->Lider->save($this->request->data)) {
				$this->Session->setFlash(__('The lider has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lider could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Lider->exists($id)) {
			throw new NotFoundException(__('Invalid lider'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Lider->save($this->request->data)) {
				$this->Session->setFlash(__('The lider has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lider could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Lider.' . $this->Lider->primaryKey => $id));
			$this->request->data = $this->Lider->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Lider->id = $id;
		if (!$this->Lider->exists()) {
			throw new NotFoundException(__('Invalid lider'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Lider->delete()) {
			$this->Session->setFlash(__('Lider deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Lider was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
