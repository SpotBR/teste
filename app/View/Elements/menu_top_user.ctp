<<<<<<< HEAD
<a href="#" class="dropdown-toggle username" data-toggle="dropdown">
	<span class="hidden-xs"><?php echo AuthComponent::user('nome') ?> <i class="fa fa-caret-down"></i></span>
	<!--<img src="assets/demo/avatar/dangerfield.png" alt="Dangerfield" />-->
</a>

<ul class="dropdown-menu userinfo arrow">
	<li class="username">
		<a href="#">
		<div class="pull-left"><!--<img src="demo/avatar/dangerfield.png" alt="<?php echo AuthComponent::user('nome') ?>"/>-->
		</div>
		<div class="pull-right">
			<h5>Bem-vindo, <?php echo AuthComponent::user('nome') ?>!</h5><small>Logado com <span><?php echo AuthComponent::user('email') ?></span></small>
		</div> </a>
	</li>
	<li class="userlinks">
		<ul class="dropdown-menu">
			<li>
				<a href="#">Meus dados <i class="pull-right fa fa-pencil"></i></a>
			</li>
			<li>
				<a href="#">Minha Rede <i class="pull-right fa fa-cog"></i></a>
			</li>
			<li class="divider"></li>
			<li>
				<?php echo $this->Html->link('Sair', '/usuarios/logout', array('escape' => false)); ?>
			</li>
		</ul>
	</li>
</ul>
=======
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-user"></i> <?php echo AuthComponent::user('nome') ?><b class="caret"></b>
	</a>
	<ul class="dropdown-menu">
		<li>
			<a href="#"><i class="fa fa-fw fa-user"></i> Meus dados</a>
		</li>
		<li>
			<a href="#"><i class="fa fa-fw fa-users"></i> Minha Rede</a>
		</li>
		<li class="divider"></li>
		<li>
			<?php echo $this->Html->link('<i class="fa fa-fw fa-power-off"></i> Sair', '/usuarios/logout', array('escape' => false)); ?>
		</li>
	</ul>
</li>
>>>>>>> bcc68f043a4d7a3d010da4152340245418c42e5f
