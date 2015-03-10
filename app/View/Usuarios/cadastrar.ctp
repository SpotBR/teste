<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-12 usuarios form">
			<h1><?php echo $textos['cadastrar']['titulo'] ?></h1>
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
		
			<p><?php echo $textos['cadastrar']['texto'] ?></p>
		
			<?php echo $this->Session->flash(); ?>
			<?php
				echo $this->Form->input('nome');
				echo $this->Form->input('email', array('label' => 'E-mail', 'class' => 'form-control email'));
				echo $this->Form->input('senha', array('type' => 'password'));
				echo $this->Form->input('cpf', array('label' => 'CPF', 'class' => 'form-control cpfBR'));
				echo $this->Form->input('data_nascimento', array('label' => 'Data de Nascimento', 'class' => 'date form-control', 'type' => 'text'));
				echo $this->Form->input('telefone', array('class' => 'form-control phone'));
				echo $this->Form->input('endereco', array('label' => 'Endereço'));
				echo $this->Form->input('bairro');
				echo $this->Form->input('cidade');
			?>
			<div class="form-group">
				<?php echo $this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right', 'id' => 'btnSalvar')); ?> 
			</div>
		
			<?php echo $this->Form->end(); ?>
			
		</div>
	</div>
</div>
