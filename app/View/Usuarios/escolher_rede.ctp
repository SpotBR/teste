<div class="usuarios form">
	<h1><?php echo $textos['escolher-rede']['titulo'] ?></h1>


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

	<p><?php echo $textos['escolher-rede']['texto'] ?></p>



	<?php echo $this->Session->flash(); ?>


	<?php

		echo $this->Element('arvore');
		foreach($arvore as $empresa) {
			if(empty($empresa['Arvore'])) {
				continue;
			}

	?>
			<h3>Rede de <?php echo $empresa['Empresa']['nome'] ?></h3>
			<?php
				$disponiveis = array();
				$i = 0;
				expandirArvore(array($empresa['Arvore']), 0, $disponiveis, $i);

			?>
			<div id="arvore-wrapper">
				<div id="arvore"></div>
			</div>
			<div class="clearfix"></div>
			Selecione uma das vagas abaixo
			<ul class="list-group">
			<?php
				foreach($disponiveis as $disponivel) {
			?>
				<li class="list-group-item">
					<input type="radio" value="<?php echo $disponivel['id'] ?>"
						   name="data[Usuario][pai_id]" id="pai<?php echo $disponivel['id'] ?>" />
					Abaixo de <?php echo $disponivel['nome']; ?>
				</li>
			<?php
				}
			?>
			</ul>
	<?php
		}

	?>


	<div class="form-group">
		<?php echo $this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right')); ?> 
	</div>

	<?php echo $this->Form->end(); ?>
</div>
<div class="clearfix"></div>
