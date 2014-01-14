<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Pendencia $Pendencia
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';
	public $name = 'User';
	
	public $validate = array(
	    'username' => array(
		'required' => array(
		    'rule' => array('notEmpty'),
		    'message' => 'Campo login obrigatorio!'
		)
	    ),
	    'password' => array(
		'required' => array(
		    'rule' => array('notEmpty'),
		    'message' => 'Campo senha obrigatorio!'
		)
	    )/*,
	    'role' => array(
		'valid' => array(
		    'rule' => array('inList', array('admin', 'author')),
		    'message' => 'Please enter a valid role',
		    'allowEmpty' => false
		)
	    )*/
	);

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
		$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}

//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Pendencia' => array(
			'className' => 'Pendencia',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
