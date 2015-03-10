<li id="search">
	<a href="javascript:;"><i class="fa fa-search opacity-control"></i></a>
	<form>
		<input type="text" class="search-query" placeholder="Buscar...">
		<button type="submit">
			<i class="fa fa-search"></i>
		</button>
	</form>
</li>

<li class="divider"></li>

<li><?php echo $this -> Html -> link('<i class="fa fa-home"></i> <span>Home</span>', '/painel', array('escape' => false)); ?></li>
<li><?php echo $this -> Html -> link('<i class="fa fa-fw fa-group"></i> <span>Minha Rede', '/usuarios/rede', array('escape' => false)); ?></li>

<?php
	foreach($menuPaginas as $menuPagina) {
?>

	<li>
		<?php
		echo $this -> Html -> link("<i class=\"fa fa-fw fa-{$menuPagina['Pagina']['icone']}\"></i> <span>{$menuPagina['Pagina']['titulo_menu']}</span>", '/paginas/ver/' . $menuPagina['Pagina']['slug'], array('escape' => false));
		?>
	</li>
	
<?php
	}
?>

<li><?php echo $this -> Html -> link('<i class="fa fa-fw fa-envelope-o"></i> <span>E-mail Marketing</span> <span class="badge badge-indigo">5</span>', '/emkt', array('escape' => false)); ?></li>
<li><?php echo $this -> Html -> link('<i class="fa fa-fw fa-mobile-phone"></i> <span>SMS Marketing</span>', 'javascript:;', array('escape' => false)); ?>
    <ul class="acc-menu">
        <li><a href="/smsmkt/arquivo"><span>SMS Arquivo</span></a></li>
        <li><a href="/smsmkt/simples"><span>SMS Simples</span></a></li>
    </ul>
</li>
<li><?php echo $this -> Html -> link('<i class="fa fa-fw fa-file"></i> <span>Páginas de Captura</span>', '/capturaPaginas', array('escape' => false)); ?></li>
<li><?php echo $this -> Html -> link('<i class="fa fa-fw fa-envelope"></i> <span>Mensagens Recebidas</span> <span class="badge badge-primary">3</span>', '/capturaMensagens', array('escape' => false)); ?></li>