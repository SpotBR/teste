<div class="row">
	<div class="span12 empresas index">
		<?php echo $this->Html->link(__('Cadastrar nova ') . __('Empresa'), array('action' => 'add'), array('class' => 'btn btn-primary pull-right')); ?>
		<h2><?php echo __('Empresas'); ?></h2>
		
		<?php echo $this->Session->flash() ?>
		<table class="table table-striped table-hover">
			<tr>
				<th><?php echo $this->Paginator->sort('#'); ?></th>
				<th><?php echo $this->Paginator->sort('nome'); ?></th>
				<th><?php echo $this->Paginator->sort('ativo'); ?></th>
				<th class="actions">&nbsp;</th>
			</tr>   
			<?php foreach ($empresas as $empresa){ ?>
				<tr>
					<td><?php echo h($empresa['Empresa']['id']); ?>&nbsp;</td>
					<td><?php echo h($empresa['Empresa']['nome']); ?>&nbsp;</td>
					<td><?php echo h($empresa['Empresa']['ativo']?"Sim": "Não"); ?>&nbsp;</td>
					<td class="actions text-right">
						<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span>', array('action' => 'view', $empresa['Empresa']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-primary', 'title' => __('Visualizar'))); ?>
						<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $empresa['Empresa']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-warning', 'title' => __('Editar'))); ?>
						<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $empresa['Empresa']['id']), array('escape' => false, 'class' => ' btn btn-sm btn-danger', 'title' => 'Excluir'), __('Deseja realmente deletar o registro # %s?', $empresa['Empresa']['id'])); ?>
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