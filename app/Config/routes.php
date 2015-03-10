<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

	if($_SERVER['HTTP_HOST'] == 'paginas.programainovar.com.br') {
		Router::Connect('/captura_paginas/:action/*', array('controller' => 'captura_paginas'));
		Router::Connect('/:slug', array('controller' => 'captura_paginas', 'action' => 'ver'), array('pass' => array('slug')));	
	} else {	
		Router::connect('/', array('controller' => 'home', 'action' => 'index'));
		Router::connect('/admin', array('controller' => 'home', 'action' => 'index', 'prefix' => 'admin'));
		Router::connect('/fale-conosco', array('controller' => 'contato', 'action' => 'index'));


		CakePlugin::routes();

		require CAKE . 'Config' . DS . 'routes.php';
	}
