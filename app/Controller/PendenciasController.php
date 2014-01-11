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
		$this->Pendencia->recursive = 0;
		$this->set('pendencias', $this->paginate());
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
