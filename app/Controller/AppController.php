<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $helpers = array(
        'Session',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'AppForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
    );

	public $uses = array('Texto', 'Pagina');

	//Opções padrão para autenticação de administrador
    public $components = array(
        'Auth' => array(
			'authorize' => array('Controller'),
			'loginAction' => array(
				'controller' => 'usuarios',
				'action' => 'login',
				'admin' => true
			),
			'authError' => 'Acesso restrito.',
            'flash' => array(
                'element' => 'alert',
                'key' => 'auth',
                'params' => array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
           		)
            ),
            'authenticate' => array(
				'Form' => array(
					'userModel' => 'Usuario',
					'fields' => array(
						'username' => 'email',
						'password' => 'senha'
					),
					'scope' => array('Usuario.admin' => '1'),
					'contain' => array('Pai', 'Empresa')
				)
			),

        )
		, 'Session', 'Paginator'
    );

	public function beforeFilter(){
		$this->textos =  Hash::combine($this->Texto->find('all'), '{n}.Texto.slug', '{n}.Texto');
		$this->set('textos', $this->textos);

		if($this->request['prefix'] != 'admin'){
			//configura auth para usuários
			AuthComponent::$sessionKey = 'Usuario';
			$this->Auth->loginAction = array('controller' => 'home', 'action' => 'index', 'admin' => false);
			$this->Auth->loginRedirect = '/painel';
			$this->Auth->authenticate['Form']['scope'] = array('Usuario.admin' => '0', 'Usuario.ativo' => 1, 'Usuario.pago' => 1);
		} else {
			AuthComponent::$sessionKey = 'Admin';
		}
	}

	public function isAuthorized($user) {
		if($this->request['prefix'] == 'admin'){
			return $user['admin'] == 1;
		} else {
			return true;
		}
	}

	public function beforeRender() {
		//rota de usuário com usuário logado
		$user = AuthComponent::user();
		if($this->request['prefix'] != 'admin' && $user) {
			//páginas que interceptam o usuário logado caso esteja faltando algum dado
			$this->_restrictPages($user);

			//páginas avulsas do menu
			$paginas = $this->Pagina->find('all', array('conditions' => array('ativo' => 1)));
			$this->set('menuPaginas', $paginas);
		}
	}

	private function _restrictPages($user) {
		//conferir se o usuário escolheu empresa
		if(empty($user['Empresa']) &&
			$this->request->params['controller'] != 'usuarios' &&
			$this->request->params['action'] != 'escolherEmpresa'
		){
			$this->redirect('/usuarios/escolherEmpresa');
		}

		//conferir se o usuário escolheu pai
		if(empty($user['pai_id']) &&
			$this->request->params['controller'] != 'usuarios' &&
			$this->request->params['action'] != 'escolherRede'
		){
			$this->redirect('/usuarios/escolherRede');
		}
	}
}
