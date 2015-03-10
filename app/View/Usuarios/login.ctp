<div class="users form">
	<h1>Login</h1>
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('Usuario');?>
		<?php
			echo $this->Form->input('email', array('label' => 'E-mail'));
			echo $this->Form->input('senha', array('type' => 'password'));
		?>
		<input type="submit" class="btn btn-primary pull-right" value="Enviar" >
	<?php echo $this->Form->end();?>
</div>