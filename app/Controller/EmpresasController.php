<?php
App::uses('AppController', 'Controller');
/**
 * Empresas Controller
 *
 * @property Empresa $Empresa
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EmpresasController extends AppController {

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
		$this->Empresa->recursive = 0;
		$this->set('empresas', $this->Paginator->paginate());
	}

/**
 * view
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Empresa->exists($id)) {
			throw new NotFoundException(__('Empresa inválido.'));
		}
		$options = array('conditions' => array('Empresa.' . $this->Empresa->primaryKey => $id));
		$this->set('empresa', $this->Empresa->find('first', $options));
	}

/**
 * add
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Empresa->create();
			if ($this->Empresa->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) empresa foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) empresa não pode ser salvo.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-error'));
			}
		}
		$usuarios = $this->Empresa->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * edit
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Empresa->exists($id)) {
			throw new NotFoundException(__('Invalid empresa'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Empresa->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) empresa foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) empresa foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
			}
		} else {
			$options = array('conditions' => array('Empresa.' . $this->Empresa->primaryKey => $id));
			$this->request->data = $this->Empresa->find('first', $options);
		}
		$usuarios = $this->Empresa->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * delete 
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Empresa->id = $id;
		if (!$this->Empresa->exists()) {
			throw new NotFoundException(__('Invalid empresa'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Empresa->delete()) {
			$this->Session->setFlash(__('O(a) empresa foi excluído com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('O(a) empresa não pode ser excluído'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		}
		return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
	}

/**
 * admin_index 
 *
 * @return void
 */
	public function admin_index() {
		$this->Empresa->recursive = 0;
		$this->set('empresas', $this->Paginator->paginate());
	}

/**
 * admin_view
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Empresa->exists($id)) {
			throw new NotFoundException(__('Empresa inválido.'));
		}
		$options = array('conditions' => array('Empresa.' . $this->Empresa->primaryKey => $id));
		$this->set('empresa', $this->Empresa->find('first', $options));
	}

/**
 * admin_add
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Empresa->create();
			if ($this->Empresa->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) empresa foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) empresa não pode ser salvo.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-error'));
			}
		}
		$usuarios = $this->Empresa->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * admin_edit
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Empresa->exists($id)) {
			throw new NotFoundException(__('Invalid empresa'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Empresa->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) empresa foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) empresa foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
			}
		} else {
			$options = array('conditions' => array('Empresa.' . $this->Empresa->primaryKey => $id));
			$this->request->data = $this->Empresa->find('first', $options);
		}
		$usuarios = $this->Empresa->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * admin_delete 
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Empresa->id = $id;
		if (!$this->Empresa->exists()) {
			throw new NotFoundException(__('Invalid empresa'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Empresa->delete()) {
			$this->Session->setFlash(__('O(a) empresa foi excluído com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('O(a) empresa não pode ser excluído'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		}
		return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
	}}
