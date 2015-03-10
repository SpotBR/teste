<<<<<<< HEAD
<div class="container">
	<div class="row">
		<div class="span12 capturaMensagens index">
			<h2><?php echo __('Mensagens Recebidas'); ?></h2>
			
			<?php echo $this->Session->flash() ?>
			<table class="table table-striped table-hover">
				<tr>
					<th><?php echo $this->Paginator->sort('#'); ?></th>
					<th><?php echo $this->Paginator->sort('nome'); ?></th>
					<th><?php echo $this->Paginator->sort('email'); ?></th>
					<th><?php echo $this->Paginator->sort('created', 'Data'); ?></th>
					<th><?php echo $this->Paginator->sort('captura_pagina_id'); ?></th>
					<th class="actions">&nbsp;</th>
				</tr>   
				<?php foreach ($capturaMensagens as $capturaMensagem){ ?>
					<tr>
						<td><?php echo h($capturaMensagem['CapturaMensagem']['id']); ?>&nbsp;</td>
						<td><?php echo h($capturaMensagem['CapturaMensagem']['nome']); ?>&nbsp;</td>
						<td><?php echo h($capturaMensagem['CapturaMensagem']['email']); ?>&nbsp;</td>
						<td><?php echo $this->Time->format($capturaMensagem['CapturaMensagem']['created'], '%d/%m/%Y %H:%I'); ?>&nbsp;</td>
						<td>
							<?php echo h($capturaMensagem['CapturaPagina']['slug']); ?>
						</td>
						<td class="actions text-right">
							<?php echo $this->Html->link('<span class="fa fa-eye"></span>', array('action' => 'view', $capturaMensagem['CapturaMensagem']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-primary', 'title' => __('Visualizar'))); ?>
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
=======
<div class="row">
	<div class="span12 capturaMensagens index">
		<h2><?php echo __('Mensagens Recebidas'); ?></h2>
		
		<?php echo $this->Session->flash() ?>
		<table class="table table-striped table-hover">
			<tr>
				<th><?php echo $this->Paginator->sort('#'); ?></th>
				<th><?php echo $this->Paginator->sort('nome'); ?></th>
				<th><?php echo $this->Paginator->sort('email'); ?></th>
				<th><?php echo $this->Paginator->sort('created', 'Data'); ?></th>
				<th><?php echo $this->Paginator->sort('captura_pagina_id'); ?></th>
				<th class="actions">&nbsp;</th>
			</tr>   
			<?php foreach ($capturaMensagens as $capturaMensagem){ ?>
				<tr>
					<td><?php echo h($capturaMensagem['CapturaMensagem']['id']); ?>&nbsp;</td>
					<td><?php echo h($capturaMensagem['CapturaMensagem']['nome']); ?>&nbsp;</td>
					<td><?php echo h($capturaMensagem['CapturaMensagem']['email']); ?>&nbsp;</td>
					<td><?php echo $this->Time->format($capturaMensagem['CapturaMensagem']['created'], '%d/%m/%Y %H:%I'); ?>&nbsp;</td>
					<td>
						<?php echo h($capturaMensagem['CapturaPagina']['slug']); ?>
					</td>
					<td class="actions text-right">
						<?php echo $this->Html->link('<span class="fa fa-eye"></span>', array('action' => 'view', $capturaMensagem['CapturaMensagem']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-primary', 'title' => __('Visualizar'))); ?>
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
>>>>>>> bcc68f043a4d7a3d010da4152340245418c42e5f
	</div>
</div>