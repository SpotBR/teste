<?php if(AuthComponent::user()) {
?>

<div id="page-heading">
	<ol class="breadcrumb">
		<li class='active'>
			SMS Marketing / <a href="painel">SMS Arquivo</a>
		</li>
	</ol>
	<h1>SMS Arquivo</h1>
</div>

<div class="container">

	<?php
	echo $this -> Form -> create('SMS', array('inputDefaults' => array('div' => 'form-group', 'label' => array('class' => 'control-label'), 'wrapInput' => false, 'class' => 'form-control', ), 'novalidate' => 'novalidate'));
	?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<p>
				Preencha as informações do formulário para enviar o SMS:
			</p>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="col-md-5 col-xs-12 col-sm-6">
					<?php
					echo $this -> Form -> input('tipo', array(
						'options' => array('sms.text' => 'SMS Comum', 'sms.text.flash' => 'SMS Alerta'), 
						'class' => 'form-control', 
						'type' => 'select', 
						'dafult' => 'sms.text', 
						'label' => 'Mensagem - Máx 320 caracteres*'));
					
					echo $this -> Form -> input('assunto');
					echo $this -> Form -> input('textosms', array(
						'type' => 'textarea', 
						'label' => 'Mensagem*',
						'placeholder' => 'Para inserir o nome do contato use o parâmetro #NOME# no corpo da mensagem.'));
					?>
				</div>
					
				<div class="col-md-offset-1 col-md-5 col-xs-12 col-sm-5">
					<?php
					echo $this -> Form -> input('txt', array(
						'type' => 'file', 
						'label' => 'Importar lista de números - Máx 2MB por arquivo:*',
						'placeholder' => 'Para inserir o nome do contato use o parâmetro #NOME# no corpo da mensagem.',
						'class' => 'mws-textinput customfile-input'));
					?>	
					
					<label>Clique <a href="modelo.txt" target="_blank">aqui</a> para baixar um modelo de lista para o envio em grande quantidade de seu sms marketing.<br></label>
                    <label>Parametros adicionais: #CAMPO1# , #CAMPO2# , #CAMPO3# , #CAMPO4#<br></label>
					
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