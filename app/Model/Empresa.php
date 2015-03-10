<?php
App::uses('AppModel', 'Model');
/**
 * Empresa Model
 *
 * @property Usuario $Usuario
 */
class Empresa extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';

	public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nome' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'site' => array(
			'url' => array(
				'rule' => array('url'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'telefone' => array(
			'phone' => array(
				'rule' => array('phone'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'joinTable' => 'empresas_usuarios',
			'foreignKey' => 'empresa_id',
			'associationForeignKey' => 'usuario_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);


	public function getArvore($id = null) {
		$conditionsEmpresa = array('ativo' => 1);
		if(!empty($id)){
			$conditionsEmpresa['id'] = $id;
		}

		$empresas = $this->find('all', array('contain' => array(
			'Usuario' => array('conditions' => array(
				'pago' => 1,
				'ativo' => 1,
				'admin' => 0
			))
		), 'conditions' => $conditionsEmpresa));


		$arvore = array();
		foreach($empresas as $empresa) {
			$usuarios = $empresa['Usuario'];
			unset($empresa['Usuario']);

			$ramo = $empresa;

			$ramo['Arvore'] = array();

			if(!empty($usuarios)) {
				//procurar pelo pai de todos
				$pai = $this->_findUsuarioPaiEmpresa($usuarios);
				if ($pai) {
					$this->_preencheFilhosRecursivamente($pai, $usuarios);
					$ramo['Arvore'] = $pai;
				}

			};

			$arvore[] = $ramo;
		}
		return $arvore;
	}


	private function _findUsuarioPaiEmpresa($usuarios) {
		foreach($usuarios as $usuario) {
			if($usuario['pai_empresa'] == 1){
				return $usuario;
			}
		}
		return false;
	}

	private function _preencheFilhosRecursivamente(&$pai, $usuarios) {
		$pai['Filho'] = array();
		if(empty($usuarios)){
			return;
		}
		foreach($usuarios as $key => $usuario) {
			if(isset($usuario['pai_id']) && $usuario['pai_id'] == $pai['id']) {
				unset($usuario[$key]);
				if(!empty($usuarios)) {
					$this->_preencheFilhosRecursivamente($usuario, $usuarios);
				}
				$pai['Filho'][] = $usuario;
			}
		}
	}

}
