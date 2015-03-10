<?php
App::uses('AppController', 'Controller');
class SmsMktController extends AppController {

	var $uses = array('Usuario');

	public function beforeFilter() {
		parent::beforeFilter();

		$allowedActions = array('arquivo', 'simples');

		if(in_array($this->request->params['action'], $allowedActions)) {
			$this->Auth->allow();
		}
	}

	public function simples() {
		
		
	}
	
	public function arquivo() {
		
	}
}
