<?php
App::uses('AppController', 'Controller');
/**
 * Grupos Controller
 *
 * @property Grupo $Grupo
 */
class GruposController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Grupo->recursive = 0;
		$this->set('grupos', $this->paginate(array(), array('limit' => $this->Grupo->find('count'))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Grupo->exists($id)) {
			throw new NotFoundException(__('Grupo invalido.'));
		}
		$options = array('conditions' => array('Grupo.' . $this->Grupo->primaryKey => $id), 'recursive' => 3);
		$this->set('grupo', $this->Grupo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Grupo->create();
			if ($this->Grupo->save($this->request->data)) {
				$this->Session->setFlash(__('Grupo salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Grupo nao pode ser salvo. Tente novamente.'));
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
		if (!$this->Grupo->exists($id)) {
			throw new NotFoundException(__('Grupo invalido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Grupo->save($this->request->data)) {
				$this->Session->setFlash(__('Grupo salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Grupo nao pode ser salvo. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Grupo.' . $this->Grupo->primaryKey => $id));
			$this->request->data = $this->Grupo->find('first', $options);
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
		$this->Grupo->id = $id;
		if (!$this->Grupo->exists()) {
			throw new NotFoundException(__('Grupo invalido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Grupo->delete()) {
			$this->Session->setFlash(__('Grupo deletado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Grupo nao deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
