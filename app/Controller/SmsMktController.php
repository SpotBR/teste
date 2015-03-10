<?php
App::uses('AppController', 'Controller');
class SmsMktController extends AppController {

<<<<<<< HEAD
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
		
		
=======
	public function index() {

>>>>>>> bcc68f043a4d7a3d010da4152340245418c42e5f
	}
}
