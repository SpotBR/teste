<div class="usuarios form">
<?php 
	echo $this->Form->create('Usuario', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'control-label'),
			'wrapInput' => false,
			'class' => 'form-control'
		), 
		'class' => 'col-md-8')
	); 
?> 

	<h1><?php echo __('Cadastrar novo'), ' ', __('administrador'); ?></h1>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('email', array('label' => 'E-mail'));
		echo $this->Form->input('senha', array('type' => 'password'));
		echo $this->Form->input('admin', array('type' => 'hidden', 'value' => 1));
	?>
	<div class="form-group">
		<?php echo $this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right')); ?> 
	</div>

	<?php echo $this->Form->end(); ?>
</div>
