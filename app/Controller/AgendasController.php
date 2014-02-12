<?php
App::uses('AppController', 'Controller');
/**
 * Agendas Controller
 *
 * @property Agenda $Agenda
 */
class AgendasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Agenda->recursive = 0;
		$this->set('agendas', $this->paginate(array(), array('limit' => $this->Agenda->find('count'))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Agenda->exists($id)) {
			throw new NotFoundException(__('Tarefa invalida'));
		}
		$options = array('conditions' => array('Agenda.' . $this->Agenda->primaryKey => $id));
		$this->set('agenda', $this->Agenda->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Agenda->create();
			if ($this->Agenda->save($this->request->data)) {
				$this->Session->setFlash(__('Tarefa salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Tarefa na salva. Tente novamente.'));
			}
		}
		$users = $this->Agenda->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Agenda->exists($id)) {
			throw new NotFoundException(__('Invalid agenda'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Agenda->save($this->request->data)) {
				$this->Session->setFlash(__('Tarefa salva.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Tarefa nao salva. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Agenda.' . $this->Agenda->primaryKey => $id));
			$this->request->data = $this->Agenda->find('first', $options);
		}
		$users = $this->Agenda->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Agenda->id = $id;
		if (!$this->Agenda->exists()) {
			throw new NotFoundException(__('tarefa invalida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Agenda->delete()) {
			$this->Session->setFlash(__('Tarefa deletada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tarefa nao deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
