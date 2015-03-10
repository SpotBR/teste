<?php
	echo $this->Form->create('CapturaMensagem', array('url' => array('controller' => 'captura_paginas', 'action' => 'mensagem',  $pagina['CapturaPagina']['slug'])));

	echo $this->Session->flash();

	echo $this->Form->input('nome');
	echo $this->Form->input('telefone');
	echo $this->Form->input('email', array('label' => 'E-mail'));
	echo $this->Form->input('mensagem');
	echo $this->Form->end('Enviar');