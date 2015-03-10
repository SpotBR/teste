<?php if(AuthComponent::user()) {

	echo $this -> element('menu_header_bar');

}?>

<header class="navbar navbar-inverse navbar-fixed-top" role="banner">

	<?php if(AuthComponent::user()) {?>
		<a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right"></a>
		<a id="rightmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="left"></a>
	<?php }?>

	<div class="navbar-header">

		<div class="navbar-header pull-left">
			<a class="navbar-brand" style="width: 170px;" href="/painel">Inovar</a>
		</div>

	</div>

	<?php if(AuthComponent::user()) {
	?>
	<ul class="nav navbar-nav pull-right toolbar">
	
		<li class="dropdown">
			<?php
			if ($this -> request['prefix'] == 'admin' && AuthComponent::user('admin')) {
				echo $this -> element('menu_top_admin');
			} else {
				echo $this -> element('menu_top_user');
			}
			?>
		</li>
		
		<li class="dropdown">
			<?php echo $this -> element('menu_messages_notify');?>
		</li>
		<li class="dropdown">
			<?php echo $this -> element('menu_notification');?>
		</li>
		
		<li>
			<a href="#" id="headerbardropdown"><span><i class="fa fa-level-down"></i></span></a>
		</li>
		
	</ul>
	<?php } ?>
</header>


	

<?php if(AuthComponent::user()) {?>
	<!-- BEGIN SIDEBAR -->
	<nav id="page-leftbar" role="navigation">
		<!-- BEGIN SIDEBAR MENU -->
		<ul class="acc-menu" id="sidebar">
			<?php
			
			if($this->request['prefix'] == 'admin' && AuthComponent::user('admin')) {
				echo $this->element('menu_lat_admin');
			} else {
				echo $this->element('menu_lat_user');
			}
			
			?>
		</ul>
		<!-- END SIDEBAR MENU -->
	</nav>
<?php } ?>
