<div class="empresas form">
<?php 
	echo $this->Form->create('Empresa', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'control-label'),
			'wrapInput' => false,
			'class' => 'form-control'
		), 
		'class' => 'col-md-8')
	); 
?> 

	<h1><?php echo __('Editar'), ' ', __('Empresa'); ?></h1>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('site');
		echo $this->Form->input('telefone');
		echo $this->Form->input('email');
		echo $this->Form->input('logo');
		echo $this->Form->input('ativo');
	?>
	<div class="form-group">
		<?php echo $this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right')); ?> 
	</div>

	<?php echo $this->Form->end(); ?>
</div>
