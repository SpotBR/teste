<<<<<<< HEAD
<div class="container">
	<div class="row">
		<div class="span12 capturaPaginas index">
			<h1>Páginas de captura</h1>
			
			<?php echo $this->Session->flash() ?>
	
	
			<?php
				if(!empty($capturaPaginas)) {
					?>
					<table class="table table-striped table-hover">
						<tr>
							<th><?php echo $this->Paginator->sort('slug', 'Página'); ?></th>
							<th>Endereço</th>
							<th class="actions">&nbsp;</th>
						</tr>
						<?php foreach ($capturaPaginas as $capturaPagina) { ?>
							<tr>
								<td><?php echo h($capturaPagina['CapturaPagina']['slug']); ?>&nbsp;</td>
								<td><?php echo $this->Html->link(
										'http://paginas.programainovar.com.br/' . $capturaPagina['CapturaPagina']['slug'],
										'http://paginas.programainovar.com.br/' . $capturaPagina['CapturaPagina']['slug'],
										array('target' => '_blank'));
									?>
								</td>
	
								<td class="actions text-right">
									<?php echo $this->Html->link('<span class="fa fa-eye"></span>', array('action' => 'ver', $capturaPagina['CapturaPagina']['slug']), array('escape' => false, 'class' => 'btn btn-sm btn-info', 'title' => __('Ver'), 'target' => '_blank')); ?>
	
									<?php echo $this->Html->link('<span class="fa fa-pencil"></span>', array('action' => 'edit', $capturaPagina['CapturaPagina']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-warning', 'title' => __('Editar'))); ?>
	
									<?php echo $this->Form->postLink('<span class="fa fa-trash"></span>', array('action' => 'delete', $capturaPagina['CapturaPagina']['id']), array('escape' => false, 'class' => ' btn btn-sm btn-danger', 'title' => 'Excluir'), __('Deseja realmente deletar o registro # %s?', $capturaPagina['CapturaPagina']['id'])); ?>
								</td>
							</tr>
						<?php } ?>
					</table>
	
					<p class="pull-left">
						<?php
						echo $this->Paginator->counter(array(
							'format' => __('Página {:page} de {:pages}. Mostrando registros de {:start} a {:end} de {:count}.')
						));
						?>
					</p>
					<?php echo $this->Paginator->pagination(array('div' => 'pagination pagination-right')) ?>
					<?php echo $this->Html->link(__('Criar nova página'), array('action' => 'add'), array('class' => 'btn btn-primary pull-right')); ?>
				<?php
				} else {
			?>
					<p><?php echo $this->Html->link('Você ainda não possui página de captura, deseja cadastrar?', 'add') ?></p>
			<?php
				}
			?>
		</div>
=======
<div class="row">
	<div class="span12 capturaPaginas index">
		<h1>Páginas de captura</h1>
		
		<?php echo $this->Session->flash() ?>


		<?php
			if(!empty($capturaPaginas)) {
				?>
				<table class="table table-striped table-hover">
					<tr>
						<th><?php echo $this->Paginator->sort('slug', 'Página'); ?></th>
						<th>Endereço</th>
						<th class="actions">&nbsp;</th>
					</tr>
					<?php foreach ($capturaPaginas as $capturaPagina) { ?>
						<tr>
							<td><?php echo h($capturaPagina['CapturaPagina']['slug']); ?>&nbsp;</td>
							<td><?php echo $this->Html->link(
									'http://paginas.programainovar.com.br/' . $capturaPagina['CapturaPagina']['slug'],
									'http://paginas.programainovar.com.br/' . $capturaPagina['CapturaPagina']['slug'],
									array('target' => '_blank'));
								?>
							</td>

							<td class="actions text-right">
								<?php echo $this->Html->link('<span class="fa fa-eye"></span>', array('action' => 'ver', $capturaPagina['CapturaPagina']['slug']), array('escape' => false, 'class' => 'btn btn-sm btn-info', 'title' => __('Ver'), 'target' => '_blank')); ?>

								<?php echo $this->Html->link('<span class="fa fa-pencil"></span>', array('action' => 'edit', $capturaPagina['CapturaPagina']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-warning', 'title' => __('Editar'))); ?>

								<?php echo $this->Form->postLink('<span class="fa fa-trash"></span>', array('action' => 'delete', $capturaPagina['CapturaPagina']['id']), array('escape' => false, 'class' => ' btn btn-sm btn-danger', 'title' => 'Excluir'), __('Deseja realmente deletar o registro # %s?', $capturaPagina['CapturaPagina']['id'])); ?>
							</td>
						</tr>
					<?php } ?>
				</table>

				<p class="pull-left">
					<?php
					echo $this->Paginator->counter(array(
						'format' => __('Página {:page} de {:pages}. Mostrando registros de {:start} a {:end} de {:count}.')
					));
					?>
				</p>
				<?php echo $this->Paginator->pagination(array('div' => 'pagination pagination-right')) ?>
				<?php echo $this->Html->link(__('Criar nova página'), array('action' => 'add'), array('class' => 'btn btn-primary pull-right')); ?>
			<?php
			} else {
		?>
				<p><?php echo $this->Html->link('Você ainda não possui página de captura, deseja cadastrar?', 'add') ?></p>
		<?php
			}
		?>
>>>>>>> bcc68f043a4d7a3d010da4152340245418c42e5f
	</div>
</div>
