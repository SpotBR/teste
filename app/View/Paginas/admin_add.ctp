<div class="paginas form">
<?php 
	echo $this->Form->create('Pagina', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'control-label'),
			'wrapInput' => false,
			'class' => 'form-control'
		), 
		'class' => 'col-md-8')
	); 
?> 

	<h1><?php echo __('Adicionar'), ' ', __('Página'); ?></h1>
	<?php
		echo $this->Form->input('slug');
		echo $this->Form->input('titulo', array('label' => 'Título'));
		echo $this->Form->input('titulo_menu', array('label' => 'Título do menu'));
		echo $this->Form->input('icone', array('label' => 'Ícone'));
		echo $this->Form->input('texto');
		echo $this->Form->input('ativo');
	?>
	<div class="form-group">
		<?php echo $this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right')); ?> 
	</div>

	<?php echo $this->Form->end(); ?>
</div>
