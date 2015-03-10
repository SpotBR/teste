<div id="page-heading">
	<ol class="breadcrumb">
        <li class='active'><a href="painel">Painel de Controle</a></li>
    </ol>
    <?php echo $textos['painel']['titulo'] ?>
    <div class="options">
        <div class="btn-toolbar">
            <button class="btn btn-default" id="daterangepicker2">
                <i class="fa fa-calendar-o"></i> 
                <span class="hidden-xs hidden-sm">February 5, 2015 - March 7, 2015</span>
            </button>
            <div class="btn-group hidden-xs">
                <a href='#' class="btn btn-default dropdown-toggle" data-toggle='dropdown'><i class="fa fa-cloud-download"></i><span class="hidden-xs hidden-sm hidden-md"> Exportar como</span> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Arquivo de texto (*.txt)</a></li>
                    <li><a href="#">Arquivo excel (*.xlsx)</a></li>
                    <li><a href="#">Arquivo PDF (*.pdf)</a></li>
                </ul>
            </div>
            <a href="#" class="btn btn-default hidden-xs"><i class="fa fa-cog"></i></a>
        </div>
    </div>
</div>

<div class="container" style="padding-bottom: 0px;">
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
		    	<div class="panel-body"><?php echo $textos['painel']['texto'] ?></div>	    
			</div>
		</div>
	</div>
</div>

<div class="container">

	    <?php if(AuthComponent::user()) { ?>
	
			<?php echo $this->element('Status/tiles');?>
			<div class="row">
				<div class="col-md-6"><?php echo $this->element('Status/reportUser');?></div>
				<div class="col-md-6"><?php echo $this->element('Status/reportSales');?></div>
			</div>
			<?php echo $this->element('Status/reportSite');?>
			<?php echo $this->element('Status/reportTiles');?>
			<?php echo $this->element('Status/estatisticas');?>
			
			<div class="row">
				<div class="col-md-6"><?php echo $this->element('Status/accounts');?></div>
				<div class="col-md-6"><?php echo $this->element('Status/todo');?></div>
			</div>
			<div class="row">
				<div class="col-md-6"><?php echo $this->element('Status/calendar');?></div>
				<div class="col-md-6"><?php echo $this->element('Status/threads');?></div>
			</div>
			
		<?php } ?>
	
	<div class="panel">
		<div class="panel-body">
			<h2>Indique seus amigos!</h2>
			<p>Utilize a url abaixo e ganhe R$40,00 em credito quando a pessoa se cadastrar na rede.</p>
			
			<div class="well">
				<input type="text" class="form-control" value="http://escritorio.programainovar.com.br/usuarios/cadastrar?indicacao=<?php echo $myemail ?>" />
			</div>
		</div>
	</div>
</div>
