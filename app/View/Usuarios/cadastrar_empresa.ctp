<<<<<<< HEAD
<div class="container">
	<div class="usuarios form">
		<h1><?php echo sprintf($textos['cadastrar-empresa']['titulo'], $usuario['nome']) ?></h1>
	
	
		<?php
			echo $this->Form->create('Usuario', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'label' => array('class' => 'control-label'),
					'wrapInput' => false,
					'class' => 'form-control',
				),
				'class' => 'col-md-8 validate', 'novalidate' => 'novalidate')
			);
		?>
	
		<p><?php echo $textos['cadastrar-empresa']['texto'] ?></p>
	
		<?php echo $this->Session->flash(); ?>
	
		<ul class="list-group">
		<?php foreach($empresas as $empresa) { ?>
			<li class="list-group-item">
				<input type="checkbox" value="<?php echo $empresa['Empresa']['id'] ?>"
					   name="data[Empresa][Empresa][]" id="Empresa<?php echo $empresa['Empresa']['id'] ?>" />
				<?php echo $empresa['Empresa']['nome']; ?>
			</li>
			<?php } ?>
		</ul>
	
	
	
		<div class="form-group">
			<?php echo $this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right')); ?> 
		</div>
	
		<?php echo $this->Form->end(); ?>
	</div>
	
	<div class="clearfix"></div>
	<?php echo $this->Html->link($textos['link-pular-empresa']['texto'], '/usuarios/cadastrarPagamento') ?>
	
</div>
=======
<div class="usuarios form">
	<h1><?php echo sprintf($textos['cadastrar-empresa']['titulo'], $usuario['nome']) ?></h1>


	<?php
		echo $this->Form->create('Usuario', array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array('class' => 'control-label'),
				'wrapInput' => false,
				'class' => 'form-control',
			),
			'class' => 'col-md-8 validate', 'novalidate' => 'novalidate')
		);
	?>

	<p><?php echo $textos['cadastrar-empresa']['texto'] ?></p>

	<?php echo $this->Session->flash(); ?>

	<ul class="list-group">
	<?php foreach($empresas as $empresa) { ?>
		<li class="list-group-item">
			<input type="checkbox" value="<?php echo $empresa['Empresa']['id'] ?>"
				   name="data[Empresa][Empresa][]" id="Empresa<?php echo $empresa['Empresa']['id'] ?>" />
			<?php echo $empresa['Empresa']['nome']; ?>
		</li>
		<?php } ?>
	</ul>



	<div class="form-group">
		<?php echo $this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right')); ?> 
	</div>

	<?php echo $this->Form->end(); ?>
</div>
<div class="clearfix"></div>
<?php echo $this->Html->link($textos['link-pular-empresa']['texto'], '/usuarios/cadastrarPagamento') ?>
>>>>>>> bcc68f043a4d7a3d010da4152340245418c42e5f
