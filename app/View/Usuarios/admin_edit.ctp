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

	<h1><?php echo __('Editar'), ' ', __('Usuário'); ?></h1>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('email', array('label' => 'E-mail'));
		echo $this->Form->input('senha', array('value' => '', 'required' => ''));
		echo $this->Form->input('cpf', array('label' => 'CPF', 'class' => 'cpfBr form-control'));
		echo $this->Form->input('data_nascimento', array('label' => 'Data de Nascimento', 'type' => 'text', 'class' => 'form-control'));
		echo $this->Form->input('telefone', array('class' => 'phone form-control'));
		echo $this->Form->input('endereco');
		echo $this->Form->input('bairro');
		echo $this->Form->input('cidade');
		echo $this->Form->input('ativo');
		echo $this->Form->input('pago');
		echo $this->Form->input('admin');
		echo $this->Form->input('pai_id', array('empty' => 'Nenhum'));
	?>
	<div class="form-group">
		<?php echo $this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right')); ?> 
	</div>

	<?php echo $this->Form->end(); ?>
</div>
