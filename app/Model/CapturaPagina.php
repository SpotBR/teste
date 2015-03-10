<?php
App::uses('AppModel', 'Model');
/**
 * CapturaPagina Model
 *
 * @property Usuario $Usuario
 * @property CapturaMensagem $CapturaMensagem
 */
class CapturaPagina extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'slug';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'usuario_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'titulo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Título é obrigatório',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'layout' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'É obrigatório escolher um modelo.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Digite um endereço',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'duplicated' => array(
				'rule' => array('duplicated'),
				'message' => 'Já existe uma página na com esse endereço. Escolha outro.',
			)
		),
		'ativo' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'CapturaMensagem' => array(
			'className' => 'CapturaMensagem',
			'foreignKey' => 'captura_pagina_id',
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

	public function duplicated($field) {
<<<<<<< HEAD
		$count = $this->find('count', array('conditions' => array('slug' => $field['slug'], 'id !=' => $this->id)));
=======
		$count = $this->find('count', array('conditions' => array('CapturaPagina.slug' => $field['slug'], 'CapturaPagina.id !=' => $this->id)));
>>>>>>> bcc68f043a4d7a3d010da4152340245418c42e5f
		return $count == 0;
	}
}
