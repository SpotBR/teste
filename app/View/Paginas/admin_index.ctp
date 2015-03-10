<div class="row">
	<div class="span12 paginas index">
		<?php echo $this->Html->link(__('Cadastrar novo ') . __('Pagina'), array('action' => 'add'), array('class' => 'btn btn-primary pull-right')); ?>
		<h2><?php echo __('Páginas'); ?></h2>
		
		<?php echo $this->Session->flash() ?>
		<table class="table table-striped table-hover">
			<tr>
				<th><?php echo $this->Paginator->sort('#'); ?></th>
				<th><?php echo $this->Paginator->sort('slug'); ?></th>
				<th><?php echo $this->Paginator->sort('titulo'); ?></th>
				<th><?php echo $this->Paginator->sort('icone'); ?></th>
				<th><?php echo $this->Paginator->sort('ativo'); ?></th>
				<th class="actions">&nbsp;</th>
			</tr>   
			<?php foreach ($paginas as $pagina){ ?>
				<tr>
					<td><?php echo h($pagina['Pagina']['id']); ?>&nbsp;</td>
					<td><?php echo h($pagina['Pagina']['slug']); ?>&nbsp;</td>
					<td><?php echo h($pagina['Pagina']['titulo']); ?>&nbsp;</td>
					<td><i class="fa fa-<?php echo $pagina['Pagina']['icone']; ?>"></i>&nbsp;</td>
					<td><?php echo h($pagina['Pagina']['ativo']? 'Sim': 'Não'); ?>&nbsp;</td>
					<td class="actions text-right">
						<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span>', array('action' => 'view', $pagina['Pagina']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-primary', 'title' => __('Visualizar'))); ?>
						<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $pagina['Pagina']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-warning', 'title' => __('Editar'))); ?>
						<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $pagina['Pagina']['id']), array('escape' => false, 'class' => ' btn btn-sm btn-danger', 'title' => 'Excluir'), __('Deseja realmente deletar o registro # %s?', $pagina['Pagina']['id'])); ?>
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