<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ContatoController extends AppController {

	public function beforeFilter() {
		if($this->request['prefix']  != 'admin') {
			$this->Auth->allow();
		}
	}

	public function index() {
		if ($this->request->is('post')) {
			$email = new CakeEmail();
			$email->config('default')
				->template('contato', 'default')
				->emailFormat('html')
				->subject('Contato recebido do site Ex-Alunos')
				->viewVars(array('contato' => $this->request->data['Contato']));
			if($email->send()){
				$this->request->data = array();
				$this->Session->setFlash('Seu contato foi enviado com sucesso! Obrigado!', 'alert', array('plugin' =>'BoostCake', 'class' => 'alert-success'), 'contato');
			} else {
				$this->Session->setFlash('Seu contato não pode ser enviado. Tente novamente mais tarde.', 'alert', array('plugin' =>'BoostCake', 'class' => 'alert-danger'), 'contato');
			}

		}
	}
}
