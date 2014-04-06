<?php
App::uses('AppController', 'Controller');
/**
 * Situacaos Controller
 *
 * @property Situacao $Situacao
 */
class SituacaosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Situacao->recursive = 0;
		$this->set('situacaos', $this->paginate(array(), array('limit' => $this->Situacao->find('count'))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Situacao->exists($id)) {
			throw new NotFoundException(__('Situacao invalida.'));
		}
		$options = array('conditions' => array('Situacao.' . $this->Situacao->primaryKey => $id));
		$this->set('situacao', $this->Situacao->find('first', $options));
		$this->set('user', $this->Situacao->Pendencia->User->find('list'));
		$this->set('grupo', $this->Situacao->Pendencia->Grupo->find('list'));
		$this->set('pessoa', $this->Situacao->Pendencia->Pessoa->find('list'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Situacao->create();
			if ($this->Situacao->save($this->request->data)) {
				$this->Session->setFlash(__('Situacao salva.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Situacao nao pode ser salvo. Tente novamente.'));
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
		if (!$this->Situacao->exists($id)) {
			throw new NotFoundException(__('Situacao invalida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Situacao->save($this->request->data)) {
				$this->Session->setFlash(__('Situacao foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Situacao nao pode ser salvo. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Situacao.' . $this->Situacao->primaryKey => $id));
			$this->request->data = $this->Situacao->find('first', $options);
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
		$this->Situacao->id = $id;
		if (!$this->Situacao->exists()) {
			throw new NotFoundException(__('Situacao invalida.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Situacao->delete()) {
			$this->Session->setFlash(__('Situacao deletada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Situacao nao deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
