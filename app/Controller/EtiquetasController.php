<?php
App::uses('AppController', 'Controller');
App::import('Model', 'Pessoa');

class EtiquetasController extends AppController {

	public $uses = array();
	
	public function index() {
            
	}
	
	public function viewPdf() {
		$this->Layout = 'pdf';
		$filtro = "%". $_POST['data']['filtro'] . "%";
		$model = new Pessoa();
		          
		$this->set('pessoa', (
                        $model->find('all', array('recursive' => 0, 'order' => 'Pessoa.nome', 'conditions' => array("OR" => 
                            array(
                                    "Pessoa.nome LIKE" => $filtro,
                                    "Pessoa.endereco LIKE" => $filtro,
                                    "Pessoa.numero LIKE" => $filtro,
                                    "Bairro.nome LIKE" => $filtro,
                                    "Cidade.nome LIKE" => $filtro,
                                    "Pessoa.cep LIKE" => $filtro,
                                    "Pessoa.fone LIKE" => $filtro,
                                    "Pessoa.email LIKE" => $filtro,
                                    "Pessoa.celular LIKE" => $filtro,   
                                    "Pessoa.Documento LIKE" => $filtro,   
                                    "Pessoa.titulo LIKE" => $filtro,   
                                    "Pessoa.zona LIKE" => $filtro,   
                                    "Pessoa.secao LIKE" => $filtro
                            )
                        )
                ))));
		$this->render();
		$this->redirect("Etiqueta/");
	}

	public function Etiqueta() {
            
		$this->Layout = 'pdf';
		$this->viewClass = 'Media';
		$params = array( 
			'id' => 'Etiqueta.pdf',
			'name' => 'Etiqueta' ,
			'download' => false,
			'extension' => 'pdf',
			'path' => APP . 'files' . DS
		); 
		$this->set($params);
	}
}