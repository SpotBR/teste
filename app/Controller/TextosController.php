<?php
App::uses('AppController', 'Controller');
/**
 * Textos Controller
 *
 * @property Texto $Texto
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TextosController extends AppController
{

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	/**
	 * admin_index
	 *
	 * @return void
	 */
	public function admin_index()
	{
		$this->Texto->recursive = 0;
		$this->set('textos', $this->Paginator->paginate());
	}

	/**
	 * admin_view
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null)
	{
		if (!$this->Texto->exists($id)) {
			throw new NotFoundException(__('Texto inválido.'));
		}
		$options = array('conditions' => array('Texto.' . $this->Texto->primaryKey => $id));
		$this->set('texto', $this->Texto->find('first', $options));
	}

	/**
	 * admin_edit
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null)
	{
		if (!$this->Texto->exists($id)) {
			throw new NotFoundException(__('Invalid texto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Texto->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) texto foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) texto foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
			}
		} else {
			$options = array('conditions' => array('Texto.' . $this->Texto->primaryKey => $id));
			$this->request->data = $this->Texto->find('first', $options);
		}
	}

}
