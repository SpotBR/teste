<?php
App::uses('AppController', 'Controller');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsuariosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
		parent::beforeFilter();

		$allowedActions = array('cadastrar', 'cadastrarEmpresa', 'cadastrarRede', 'cadastrarPagamento', 'login', 'admin_login');

		if(in_array($this->request->params['action'], $allowedActions)) {
			$this->Auth->allow();
		}
	}

	public function login() {
		$this->layout = 'login';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Usuário inválido'), 'alert', array('plugin' =>'BoostCake', 'class' => 'alert-danger'),'auth');
				$this->redirect($this->referer());
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function admin_login() {
		$this->layout = 'login';
		if ($this->request->is('post')) {

			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Usuário inválido'), 'alert', array('plugin' =>'BoostCake', 'class' => 'alert-danger'),'auth');
				$this->redirect($this->referer());
			}
		}
	}

	public function admin_logout() {
		$this->redirect($this->Auth->logout());
	}

	public function index() {

	}

/**
 * add
 *
 * @return void
 */
	public function cadastrar() {



		if ($this->request->is('post')) {
			if(isset($this->request->query['indicacao'])) {
				$this->Usuario->recursive = -1;
				$indicador = $this->Usuario->findByEmail($this->request->query['indicacao']);
				$this->request->data['Usuario']['indicado_por'] = $indicador['Usuario']['id'];
			}

			$this->Usuario->create();
			$saved = $this->Usuario->save($this->request->data);
			if ($saved) {
				$this->Session->write('cadastro.Usuario', $saved['Usuario']);
				
				// Mini gambiarra para fazer o cadastro em outros sistemas
				// Será melhorado depois, de forma que evite problemas de segurança
				// e outros problemas com possíveis falhas 
				// Edição: Davi Salles 08/03/2015
				
				// Cadastro no SMS.programainovar
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "sms.programainovar.com.br/cadastro_exe.php");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, true);
				
				$data = array(
				    'nome' => $this->request->data['Usuario']['nome'],
				    'email' => $this->request->data['Usuario']['email'],
				    'senha' => $this->request->data['Usuario']['senha'],
				    'usuario' => $this->request->data['Usuario']['telefone']
				);
				
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				$output = curl_exec($ch);
				curl_close($ch);
				
				// Cadastro no AUTO.programainovar
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "http://auto.programainovar.com.br/index.php/login/create");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, true);
				
				$data = array(
				    'auth' => 'submit',
				    'name' => $this->request->data['Usuario']['nome'],
				    'email' => $this->request->data['Usuario']['email'],
				    'password' => $this->request->data['Usuario']['senha'],
				    'username' => $this->request->data['Usuario']['email'],
				    'repassword' => $this->request->data['Usuario']['senha']
				);
				
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				$output = curl_exec($ch);
				curl_close($ch);
				
				// Cadastro no EMKT.programainovar
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "http://emkt.programainovar.com.br/backend/index.php/guest/index");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, true);
				
				$data = array(
				    'UserLogin[email]' => $this->request->data['Usuario']['email'],
				    'UserLogin[password]' => $this->request->data['Usuario']['senha']
				);
				
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				$output = curl_exec($ch);

				curl_setopt($ch, CURLOPT_URL, "http://emkt.programainovar.com.br/backend/index.php/customers/create");
				$nomeArray = explode(' ',$this->request->data['Usuario']['nome']);
				$data = array(
				    'Customer[first_name]' => $nomeArray[0],
				    'Customer[last_name]' => sizeOf($nomeArray) >= 1 ? $nomeArray[1] : 'Cadastradosemsobrenome',
				    'Customer[email]' => $this->request->data['Usuario']['email'],
				    'Customer[confirm_email]' => $this->request->data['Usuario']['email'],
				    'Customer[fake_password]' => $this->request->data['Usuario']['senha'],
				    'Customer[confirm_password]' => $this->request->data['Usuario']['senha'],
				    'Customer[timezone]' => 'America/Sao_Paulo',
				    'Customer[status]' => 'active'
				);
					
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				$output = curl_exec($ch);
				curl_close($ch);
				
				return $this->redirect(array('action' => 'cadastrarEmpresa'));
			} else {
				$this->Session->setFlash(__('Seu cadastro não pode ser feito. Tente novamente mais tarde'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-error'));
			}
		}
	}


	/**
	 * add
	 *
	 * @return void
	 */
	public function cadastrarEmpresa() {
		if(!$this->Session->check('cadastro.Usuario')) {
			$this->redirect('cadastrar');
		}
		$usuario = $this->Session->read('cadastro.Usuario');

		if ($this->request->is('post')) {
			$save = array('Usuario' => array('id' => $usuario['id']), 'Empresa' => $this->request->data['Empresa']);

			if ($this->Usuario->save($save)) {
				return $this->redirect(array('action' => 'cadastrarPagamento'));
			} else {
				$this->Session->setFlash(__('Seu cadastro não pode ser feito. Tente novamente mais tarde.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-error'));
			}
		}
		$this->Usuario->Empresa->recursive = -1;
		$empresas = $this->Usuario->Empresa->find('all', array('conditions' => array('ativo' => 1)));
		$this->set(compact('empresas', 'usuario'));
	}

	public function cadastrarRede() {
		if(!$this->Session->check('cadastro.Usuario')) {
			$this->redirect('cadastrar');
		}
		$usuario = $this->Session->read('cadastro.Usuario');

		if ($this->request->is('post')) {
			$save = array('Usuario' => array('id' => $usuario['id']), 'Empresa' => $this->request->data['Empresa']);

			if ($this->Usuario->save($save)) {
				return $this->redirect(array('action' => 'cadastrarRede'));
			} else {
				$this->Session->setFlash(__('Seu cadastro não pode ser feito. Tente novamente mais tarde.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-error'));
			}
		}
		$this->Usuario->Empresa->recursive = -1;
		$empresas = $this->Usuario->Empresa->find('all', array('conditions' => array('ativo' => 1)));
		$this->set(compact('empresas', 'usuario'));
	}

	public function cadastrarPagamento() {
		if(!$this->Session->check('cadastro.Usuario')) {
			$this->redirect('cadastrar');
		}
		$usuario = $this->Session->read('cadastro.Usuario');

		$this->set(compact('usuario'));
	}


	public function escolherEmpresa() {
		$this->Usuario->Empresa->recursive = -1;
		$empresas = $this->Usuario->Empresa->find('all', array('conditions' => array('ativo' => 1)));
		if ($this->request->is('post')) {
			$save = array('Usuario' => array('id' => AuthComponent::user('id')), 'Empresa' => $this->request->data['Empresa']);

			if ($this->Usuario->save($save)) {

				//atualizar a sessão do usuário com as novas opçoes
				$this->Usuario->Empresa->recursive = -1;
				$empresasSelecionadas = $this->Usuario->Empresa->find('all', array('conditions' => array('id' => $this->request->data['Empresa']['Empresa'], 'ativo' => 1)));;


				$this->Session->write('Usuario.Empresa', $empresasSelecionadas);

				return $this->redirect(array('action' => 'escolherRede'));
			} else {
				$this->Session->setFlash(__('Seu cadastro não pode ser feito. Tente novamente mais tarde.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-error'));
			}
		}

		$this->set(compact('empresas'));
	}

	public function escolherRede() {
		$this->Usuario->recursive = -1;
		$empresas_ids = Hash::extract($this->Auth->user('Empresa'),'{n}.id');
		$arvore = $this->Usuario->Empresa->getArvore($empresas_ids);

		if ($this->request->is('post')) {
			$save = array('Usuario' => array('id' => AuthComponent::user('id'), 'pai_id' => $this->request->data['Usuario']['pai_id']));
			if ($this->Usuario->save($save)) {

				//atualizar a sessão do usuário com as novas opçoes
				$this->Usuario->recursive = -1;
				$pai = $this->Usuario->find('first', array('conditions' => array('id' => $this->request->data['Usuario']['pai_id'], 'ativo' => 1)));
				$this->Session->write('Usuario.Pai', $pai['Usuario']);
				$this->Session->write('Usuario.pai_id', $pai['Usuario']['id']);

				return $this->redirect('/');
			} else {
				debug($this->Usuario->validationErrors);
				$this->Session->setFlash(__('Seu cadastro não pode ser feito. Tente novamente mais tarde.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-error'));
			}
		}

		$this->set(compact('arvore'));
	}

	public function rede() {
		$this->Usuario->recursive = -1;
		$empresas_ids = Hash::extract($this->Auth->user('Empresa'),'{n}.id');
		$arvore = $this->Usuario->Empresa->getArvore($empresas_ids);

		$this->set(compact('arvore'));
	}


/**
 * admin_index 
 *
 * @return void
 */
	public function admin_index() {
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->Paginator->paginate());
	}

/**
 * admin_view
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Usuario inválido.'));
		}
		$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		$this->set('usuario', $this->Usuario->find('first', $options));
	}

/**
 * admin_add
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) usuario foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) usuario não pode ser salvo.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-error'));
			}
		}
		$pais = $this->Usuario->Pai->find('list');
		$empresas = $this->Usuario->Empresa->find('list');
		$this->set(compact('pais', 'empresas'));
	}

/**
 * admin_edit
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['Usuario']['senha'] == '') {
				unset($this->request->data['Usuario']['senha']);
			}
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('O(a) usuario foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
				return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('O(a) usuario foi salvo com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
			}
		} else {
			$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			$this->request->data = $this->Usuario->find('first', $options);
		}
		$pais = $this->Usuario->Pai->find('list');
		$empresas = $this->Usuario->Empresa->find('list');
		$this->set(compact('pais', 'empresas'));
	}

/**
 * admin_delete 
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('O(a) usuario foi excluído com sucesso.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		} else {
			$this->Session->setFlash(__('O(a) usuario não pode ser excluído'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
		}
		return $this->redirect(array('language' => $this->params['language'], 'action' => 'index'));
	}}
