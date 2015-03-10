<div class="row">
	<div class="span12 textos index">
		<h2><?php echo __('Textos'); ?></h2>
		
		<?php echo $this->Session->flash() ?>
		<table class="table table-striped table-hover">
			<tr>
				<th><?php echo $this->Paginator->sort('#'); ?></th>
				<th><?php echo $this->Paginator->sort('slug'); ?></th>
				<th><?php echo $this->Paginator->sort('titulo'); ?></th>
				<th class="actions">&nbsp;</th>
			</tr>   
			<?php foreach ($textos as $texto){ ?>
				<tr>
					<td><?php echo h($texto['Texto']['id']); ?>&nbsp;</td>
					<td><?php echo h($texto['Texto']['slug']); ?>&nbsp;</td>
					<td><?php echo h($texto['Texto']['titulo']); ?>&nbsp;</td>
					<td class="actions text-right">
						<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $texto['Texto']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-warning', 'title' => __('Editar'))); ?>
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
	</div>
</div>