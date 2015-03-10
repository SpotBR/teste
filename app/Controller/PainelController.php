<?php
App::uses('AppController', 'Controller');

/**
 * Class PainelController
 *
 * @property Usuario $Usuario
 * @property CapturaMensagem $CapturaMensagem
 */
class PainelController extends AppController {

	var $uses = array('Usuario', 'CapturaMensagem');

	public function index() {

		$this->Usuario->recursive = -1;
		$user = $this->Usuario->find('first', array('conditions' => array('Usuario.id' => AuthComponent::user('id'))));
		$ncreditos = $user['Usuario']['creditos'];

		$cmensagens = $this->CapturaMensagem->find('count', array('conditions' => array('CapturaPagina.usuario_id' => $user['Usuario']['id'])));
		$npessoas = 0;

		$myemail = $user['Usuario']['email'];

		$this->set(compact('ncreditos', 'cmensagens', 'npessoas', 'myemail'));
	}

}
