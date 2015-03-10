<?php
App::uses('AppController', 'Controller');
/**
 * CapturaMensagens Controller
 *
 * @property CapturaMensagen $CapturaMensagen
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CapturaMensagensController extends AppController {

	var $uses = array('CapturaMensagem');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index 
 *
 * @return void
 */
	public function index() {
		$this->CapturaMensagem->recursive = 0;
		$mensagens = $this->Paginator->paginate(null, array('CapturaPagina.usuario_id' => AuthComponent::user('id')));
		$this->set('capturaMensagens', $mensagens);
	}

/**
 * view
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CapturaMensagem->exists($id)) {
			throw new NotFoundException(__('Captura Mensagen inválido.'));
		}
		$options = array('conditions' => array(
			'CapturaMensagem.' . $this->CapturaMensagem->primaryKey => $id,
			'CapturaPagina.usuario_id' => AuthComponent::user('id')
		));
		$this->set('capturaMensagem', $this->CapturaMensagem->find('first', $options));
	}

}
