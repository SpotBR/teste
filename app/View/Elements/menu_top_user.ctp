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
