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
		$options = array('conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id));
		$this->set('pessoa', $this->Pessoa->find('first', $options));
		$this->set('user', $this->Pessoa->Pendencia->User->find('list'));
		$this->set('grupo', $this->Pessoa->Pendencia->Grupo->find('list'));
		$this->set('situacao', $this->Pessoa->Pendencia->Situacao->find('list'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pessoa->create();
			if ($this->Pessoa->save($this->request->data)) {
				$this->Session->setFlash(__('Pessoa salva.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Pessoa nao pode ser salva. Tente novamente.'));
			}
		}
		$cidades = $this->Pessoa->Cidade->find('list');
		$bairros = $this->Pessoa->Bairro->find('list');
		$this->set(compact('cidades', 'bairros'));
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
		$this->set(compact('cidades', 'bairros'));
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
