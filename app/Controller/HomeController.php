<?php
App::uses('AppController', 'Controller');
class HomeController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		if($this->request['prefix']  != 'admin') {
			$this->Auth->allow();
		}
	}

	public function index() {
		$this->layout = 'login';
		if($this->Auth->user()) {
			$this->redirect('/painel');
		}
	}

	public function admin_index() {

	}
}
