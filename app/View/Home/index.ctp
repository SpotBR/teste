<div class="login-panel panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $this->Html->image('2logo.png'); ?></h3>
	</div>
	<div class="panel-body">
		<p>
			<?php echo $textos['home']['texto'] ?>
		</p>
		<?php echo $this->Session->flash('cadastro'); ?>
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('Usuario', array('action' => '/login', 'class' => ''));?>
		<fieldset>
			<?php
				echo $this->Form->input('email', array('placeholder' => 'E-mail', 'label' => false, 'wrapInput' => false));
				echo $this->Form->input('senha', array('type' => 'password', 'placeholder' => 'Senha', 'label' => false, 'wrapInput' => false));
			?>
			<input type="submit" class="btn btn-lg btn-success btn-block" value="Enviar" >
		</fieldset>
		<?php echo $this->Form->end();?>
		<br />
		<?php echo $this->Html->link($textos['link-cadastro']['texto'], '/usuarios/cadastrar') ?>
	</div>
</div>
