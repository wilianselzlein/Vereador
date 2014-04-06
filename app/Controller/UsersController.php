<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function beforeFilter() {
	        parent::beforeFilter();
	        $this->Auth->allow('add', 'logout');
	}    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate(array(), array('limit' => $this->User->find('count'))));
	}

	public function login() {
		if ($this->Auth->login()) {
			    $this->redirect($this->Auth->redirect());
		} else {
		        $this->Session->setFlash(__('Usuario e senha invalido!'));
		}
	}

	public function logout() {
	       $this->redirect($this->Auth->logout());
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario invalido.'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id), 'recursive' => 3);
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('O usuario foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O usuario nao pode ser salvo. Tente novamente.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O usuario naoo pode ser salvo. Tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario invalido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuario deletado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usuario nao deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
