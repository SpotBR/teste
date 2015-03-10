<<<<<<< HEAD
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
			
			echo $this -> element('menu_lat_user');
			
			?>
		</ul>
		<!-- END SIDEBAR MENU -->
	</nav>
<?php } ?>

=======
<nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php
			echo $this->Html->link(
					$this->Html->image('1logo.png', array('style' => 'width:20px; float: left;')) . 'Painel Inovar',
					"#", array('class' => 'navbar-brand', 'escape' => false)
			);
		?>
	</div>

	<?php if(AuthComponent::user()) { ?>
		<ul class="nav navbar-right navbar-top-links">
			<?php
				if($this->request['prefix'] == 'admin' && AuthComponent::user('admin')) {
					echo $this->element('menu_top_admin');
				} else {
					echo $this->element('menu_top_user');
				}
			?>
		</ul>

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id=side-menu"">
					<?php
						if($this->request['prefix'] == 'admin' && AuthComponent::user('admin')) {
							echo $this->element('menu_lat_admin');
						} else {
							echo $this->element('menu_lat_user');
						}
					?>
				</ul>
			</div>
		</div>
	<?php } ?>
</nav>
>>>>>>> bcc68f043a4d7a3d010da4152340245418c42e5f
