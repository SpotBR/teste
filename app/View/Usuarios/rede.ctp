<<<<<<< HEAD
<?php

echo $this->Element('arvore');
foreach($arvore as $empresa) {
	if(empty($empresa['Arvore'])) {
		continue;
	}

?>

<div id="page-heading">
	<ol class="breadcrumb">
        <li class='active'><a href="usuarios/rede">Minha Rede</a></li>
    </ol>
    <h1>Rede de <?php echo $empresa['Empresa']['nome'] ?></h1>
</div>


<div class="container">	
	<div class="row">
		<div class="col-md-offset-3 col-md-4 col-lg-12">
			<?php
				$disponiveis = array();
				$i = 0;
				expandirArvore(array($empresa['Arvore']), 0, $disponiveis, $i);
			?>
			
			<div id="arvore-wrapper">
				<div id="arvore"></div>
			</div>
			
			<div class="clearfix"></div>
			<?php
			}
			?>
		</div>
	</div>	
</div>
=======
<h1>Minha rede</h1>

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
<?php
	}

?>
>>>>>>> bcc68f043a4d7a3d010da4152340245418c42e5f
