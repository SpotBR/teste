<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * CapturaPaginas Controller
 *
 * @property CapturaPagina $CapturaPagina
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CapturaPaginasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');


	public function beforeFilter() {
		parent::beforeFilter();

		if($this->request->params['action']  == 'ver') {
			$this->Auth->allow();
		}
	}

	public function ver($slug) {
		$this->layout = false;
		$pagina = $this->CapturaPagina->find('first', array('conditions' => array(
			'slug' => $slug, 'CapturaPagina.ativo' => 1, 'Usuario.ativo' => 1, 'Usuario.pago' => 1
		)));

		if(!$pagina) {
			throw new NotFoundException();
		}

		$this->set('pagina', $pagina);
	}

	public function mensagem($slug) {
		$pagina = $this->CapturaPagina->find('first', array('conditions' => array(
			'slug' => $slug, 'CapturaPagina.ativo' => 1, 'Usuario.ativo' => 1, 'Usuario.pago' => 1
		)));
		if(!$pagina) {
			throw new NotFoundException();
		}

		if ($this->request->is('post')) {
			$this->CapturaPagina->CapturaMensagem->create();
			$this->request->data['CapturaMensagem']['captura_pagina_id'] = $pagina['CapturaPagina']['id'];
			if ($this->CapturaPagina->CapturaMensagem->save($this->request->data)) {
				$this->Session->setFlash(__('Sua mensagem foi salva com sucesso'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('A mensagem não pode ser salva. Verifique os erros abaixo.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-danger'));
				return $this->redirect($this->referer());
			}
		} else {
			throw new MethodNotAllowedException();
		}
	}

/**
 * index 
 *
 * @return void
 */
	public function index() {
		$this->CapturaPagina->recursive = -1;
		$paginas =  $this->Paginator->paginate(null, array('usuario_id' => AuthComponent::user('id')));
		$this->set('capturaPaginas', $paginas);
	}

/**
 * add
 *
 * @return void
 */
	public function add() {

		$layouts = array();
		$dir = new Folder(WWW_ROOT . 'files' . DS . 'layouts');
		foreach($dir->read()[0] as $layoutDir) {
			$file = new File(WWW_ROOT . 'files' . DS . 'layouts' . DS . $layoutDir . DS . 'titulo.txt');

			$layouts[$layoutDir] = array(
				'titulo' => $file->read()
			);

			$file->close();
		}

		if ($this->request->is('post')) {
			$this->CapturaPagina->create();
			$this->request->data['CapturaPagina']['usuario_id'] = AuthComponent::user('id');
			if ($this->CapturaPagina->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) captura pagina foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('A página não pode ser salva. Verifique os erros abaixo.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-danger'));
			}
		}
		$this->set(compact('layouts'));
	}

/**
 * edit
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CapturaPagina->exists($id)) {
			throw new NotFoundException(__('Invalid captura pagina'));
		}

		$layouts = array();
		$dir = new Folder(WWW_ROOT . 'files' . DS . 'layouts');
		foreach($dir->read()[0] as $layoutDir) {
			$file = new File(WWW_ROOT . 'files' . DS . 'layouts' . DS . $layoutDir . DS . 'titulo.txt');

			$layouts[$layoutDir] = array(
				'titulo' => $file->read()
			);

			$file->close();
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['CapturaPagina']['usuario_id'] = AuthComponent::user('id');
			if ($this->CapturaPagina->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) captura pagina foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) captura pagina foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
			}
		} else {
			$options = array('conditions' => array('CapturaPagina.' . $this->CapturaPagina->primaryKey => $id));
			$this->request->data = $this->CapturaPagina->find('first', $options);
		}
		$this->set(compact('layouts'));
	}

/**
 * delete 
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CapturaPagina->id = $id;
		if (!$this->CapturaPagina->exists()) {
			throw new NotFoundException(__('Invalid captura pagina'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CapturaPagina->delete()) {
			$this->Session->setFlash(__('O(a) captura pagina foi excluído com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('O(a) captura pagina não pode ser excluído'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		}
		return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
	}

/**
 * admin_index 
 *
 * @return void
 */
	public function admin_index() {
		$this->CapturaPagina->recursive = 0;
		$this->set('capturaPaginas', $this->Paginator->paginate());
	}

/**
 * admin_view
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CapturaPagina->exists($id)) {
			throw new NotFoundException(__('Captura Pagina inválido.'));
		}
		$options = array('conditions' => array('CapturaPagina.' . $this->CapturaPagina->primaryKey => $id));
		$this->set('capturaPagina', $this->CapturaPagina->find('first', $options));
	}

/**
 * admin_add
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CapturaPagina->create();
			if ($this->CapturaPagina->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) captura pagina foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) captura pagina não pode ser salvo.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-error'));
			}
		}
		$usuarios = $this->CapturaPagina->Usuario->find('list');
		$layouts = $this->CapturaPagina->Layout->find('list');
		$this->set(compact('usuarios', 'layouts'));
	}

/**
 * admin_edit
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CapturaPagina->exists($id)) {
			throw new NotFoundException(__('Invalid captura pagina'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CapturaPagina->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) captura pagina foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) captura pagina foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
			}
		} else {
			$options = array('conditions' => array('CapturaPagina.' . $this->CapturaPagina->primaryKey => $id));
			$this->request->data = $this->CapturaPagina->find('first', $options);
		}
		$usuarios = $this->CapturaPagina->Usuario->find('list');
		$layouts = $this->CapturaPagina->Layout->find('list');
		$this->set(compact('usuarios', 'layouts'));
	}

/**
 * admin_delete 
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->CapturaPagina->id = $id;
		if (!$this->CapturaPagina->exists()) {
			throw new NotFoundException(__('Invalid captura pagina'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CapturaPagina->delete()) {
			$this->Session->setFlash(__('O(a) captura pagina foi excluído com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('O(a) captura pagina não pode ser excluído'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		}
		return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
	}}
