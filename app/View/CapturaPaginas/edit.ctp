<div class="capturaPaginas form">
	<?php
	echo $this->Form->create('CapturaPagina', array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array('class' => 'control-label'),
				'wrapInput' => false,
				'class' => 'form-control'
			),
			'class' => 'col-md-8')
	);
	?>

	<h1><?php echo __('Páginas de captura'); ?> <small>Nova página</small></h1>

	<?php
		echo $this->Session->flash();
		echo $this->Form->input('id');
		echo $this->Form->input('titulo', array('label' => 'Título'));
		echo $this->Form->input('texto');
	?>

	<p>Escolha um modelo abaixo: </p>
	<?php echo $this->Form->hidden('layout') ?>
	<ul class="list-group">
		<?php foreach($layouts as $layout => $dados) { ?>
			<li class="list-group-item">
				<?php echo $this->Html->image('/files/layouts/' . $layout . '/miniatura.jpg', array('style'=> 'width:200px;height:100px')); ?>
				<p><input type="radio" name="data[CapturaPagina][layout]" value="<?php echo $layout ?>" /> <?php echo $dados['titulo'] ?></p>
			</li>
		<?php } ?>
	</ul>
	<?php echo $this->Form->error('layout') ?>

	<?php
	echo $this->Form->input('slug', array(
		'beforeInput' => '<div class="input-group"><span class="input-group-addon">http://paginas.programainovar.com.br/</span>',
		'afterInput' => '</div>',
		'label' => 'Endereço'
	));
	?>

	<div class="form-group">
		<?php echo $this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right')); ?>
	</div>

	<?php echo $this->Form->end(); ?>
</div>
