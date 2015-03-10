<div class="textos form">
<?php 
	echo $this->Form->create('Texto', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'control-label'),
			'wrapInput' => false,
			'class' => 'form-control'
		), 
		'class' => 'col-md-8')
	); 
?> 

	<h1><?php echo __('Editar'), ' ', __('Texto'), ' ', $this->request->data['Texto']['slug']; ?></h1>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titulo', array('label' => 'Título'));
		echo $this->Form->input('texto');
	?>
	<div class="form-group">
		<?php echo $this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right')); ?> 
	</div>

	<?php echo $this->Form->end(); ?>
</div>
