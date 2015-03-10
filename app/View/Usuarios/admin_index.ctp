<div class="row">
	<div class="span12 usuarios index">
		<?php echo $this->Html->link(__('Cadastrar novo ') . __('administrador'), array('action' => 'add'), array('class' => 'btn btn-primary pull-right')); ?>
		<h2><?php echo __('Usuários'); ?></h2>
		
		<?php echo $this->Session->flash() ?>
		<table class="table table-striped table-hover">
			<tr>
				<th><?php echo $this->Paginator->sort('#'); ?></th>
				<th><?php echo $this->Paginator->sort('nome'); ?></th>
				<th><?php echo $this->Paginator->sort('email', 'E-mail'); ?></th>
				<th><?php echo $this->Paginator->sort('cpf','CPF'); ?></th>
				<th><?php echo $this->Paginator->sort('ativo'); ?></th>
				<th><?php echo $this->Paginator->sort('pago'); ?></th>
				<th><?php echo $this->Paginator->sort('admin'); ?></th>
				<th class="actions">&nbsp;</th>
			</tr>   
			<?php foreach ($usuarios as $usuario){ ?>
				<tr>
					<td><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
					<td><?php echo h($usuario['Usuario']['nome']); ?>&nbsp;</td>
					<td><?php echo h($usuario['Usuario']['email']); ?>&nbsp;</td>
					<td><?php echo h($usuario['Usuario']['cpf']); ?>&nbsp;</td>
					<td><?php echo h($usuario['Usuario']['ativo']? 'Sim': 'Não'); ?>&nbsp;</td>
					<td><?php echo h($usuario['Usuario']['pago']? 'Sim': 'Não'); ?>&nbsp;</td>
					<td><?php echo h($usuario['Usuario']['admin']? 'Sim': 'Não'); ?>&nbsp;</td>
					<td class="actions text-right">
						<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span>', array('action' => 'view', $usuario['Usuario']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-primary', 'title' => __('Visualizar'))); ?>
						<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $usuario['Usuario']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-warning', 'title' => __('Editar'))); ?>
						<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $usuario['Usuario']['id']), array('escape' => false, 'class' => ' btn btn-sm btn-danger', 'title' => 'Excluir'), __('Deseja realmente deletar o registro # %s?', $usuario['Usuario']['id'])); ?>
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