<?php
App::uses('AppController', 'Controller');
/**
 * Paginas Controller
 *
 * @property Pagina $Pagina
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PaginasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function ver($slug = null) {
		$options = array('conditions' => array('Pagina.slug' => $slug));
		$pagina = $this->Pagina->find('first', $options);

		if(empty($pagina)) {
			throw new NotFoundException();
		}

		$this->set('pagina', $pagina);
	}

/**
 * admin_index 
 *
 * @return void
 */
	public function admin_index() {
		$this->Pagina->recursive = 0;
		$this->set('paginas', $this->Paginator->paginate());
	}

/**
 * admin_view
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Pagina->exists($id)) {
			throw new NotFoundException(__('Pagina inválido.'));
		}
		$options = array('conditions' => array('Pagina.' . $this->Pagina->primaryKey => $id));
		$this->set('pagina', $this->Pagina->find('first', $options));
	}

/**
 * admin_add
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Pagina->create();
			if ($this->Pagina->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) pagina foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) pagina não pode ser salvo.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-error'));
			}
		}
	}

/**
 * admin_edit
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Pagina->exists($id)) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pagina->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) pagina foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) pagina foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
			}
		} else {
			$options = array('conditions' => array('Pagina.' . $this->Pagina->primaryKey => $id));
			$this->request->data = $this->Pagina->find('first', $options);
		}
	}

/**
 * admin_delete 
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Pagina->id = $id;
		if (!$this->Pagina->exists()) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pagina->delete()) {
			$this->Session->setFlash(__('O(a) pagina foi excluído com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('O(a) pagina não pode ser excluído'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		}
		return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
	}}
