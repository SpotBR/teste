<?php if(AuthComponent::user()) {
?>

<div id="page-heading">
	<ol class="breadcrumb">
		<li class='active'>
			SMS Marketing / <a href="painel">SMS Simples</a>
		</li>
	</ol>
	<h1>SMS Simples</h1>
</div>

<div class="container">

	<?php
	echo $this -> Form -> create('SMS', array('inputDefaults' => array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'wrapInput' => false, 'class' => 'form-control', ), 'novalidate' => 'novalidate'));
	?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<p>
				Preencha as informações do formulário para enviar seu SMS:
			</p>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="col-md-6 col-xs-12 col-sm-6">
					<?php
					echo $this->Form->input('Agendar camapanha?', array(
					    'type' => 'radio',
					    'options' => array(1 => 'Não', 2 =>'Sim'),
					    'class' => 'form-control',
					    'hiddenField' => false,
					    'label' => 'Agendar campanha?',
						'default' => 1));
					echo $this -> Form -> input('tipo', array(
						'options' => array('sms.text' => 'SMS Comum', 'sms.text.flash' => 'SMS Alerta'), 
						'class' => 'form-control', 
						'type' => 'select', 
						'dafult' => 'sms.text', 
						'label' => 'Tipo da mensagem*'));
					
					echo $this -> Form -> input('pri', array(
						'options' => array(0 => 'Normal', 10 => 'Alta'), 
						'class' => 'form-control', 
						'type' => 'select', 
						'dafult' => 0, 
						'label' => 'Prioridade do envio*'));
						
					echo $this -> Form -> input('assunto');
					echo $this -> Form -> input('textosms', array(
						'type' => 'textarea', 
						'label' => 'Mensagem*',
						'placeholder' => 'Para inserir o nome do contato use o parâmetro #NOME# no corpo da mensagem.'));
					?>
					
				</div>
				
				<div class="col-md-6 col-xs-12 col-sm-6">
					
					<div class="panel">
						<div class="panel-body">
						<?php
						echo $this -> Form -> input('email', array(
								'label' => 'Inserir individual*',
								'class' => 'form-control phone', 
								'placeholder' => 'Telefone do destinatario'));
						
						echo $this -> Form -> input('nome', array(
								'label' => false, 
								'class' => 'form-control', 
								'placeholder' => 'Nome do destinatario'));
						?>
						
						<div style="text-align: center">OU</div>
						
						<?php
						echo $this -> Form -> input('Inserir grupo', array(
								'options' => array(), 
								'class' => 'form-control', 
								'type' => 'select', 
								'dafult' => 'sms.text', 
								'label' => 'Inserir grupo'));
						
						echo $this -> Form -> input('+ Adicionar indivíduo', array('label' => false, 'class' => 'btn btn-default pull-right', 'type'=>'button', 'id' => 'addNum', ''));	
						
						echo $this -> Form -> input('numbers', array(
								'type' => 'textarea', 
								'label' => 'Listagem de números',
								'disabled' => true));
						
						?>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="panel-footer">
			<div class="form-group">
				<?php echo $this -> Form -> submit('Enviar', array('div' => 'pull-right', 'class' => 'btn btn-primary', 'id' => 'btnSalvar')); ?>
			</div>
		</div>

		<?php echo $this -> Form -> end(); ?>
	</div>

</div>
<?php } ?>