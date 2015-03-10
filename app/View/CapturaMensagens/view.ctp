<div class="capturaMensagens view">
<h2><?php echo __('Mensagem recebida'); ?></h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($capturaMensagem['CapturaMensagem']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Nome'); ?></td>
			<td><?php echo h($capturaMensagem['CapturaMensagem']['nome']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Telefone'); ?></td>
			<td><?php echo h($capturaMensagem['CapturaMensagem']['telefone']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('E-mail'); ?></td>
			<td><?php echo h($capturaMensagem['CapturaMensagem']['email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Mensagem'); ?></td>
			<td><?php echo h($capturaMensagem['CapturaMensagem']['mensagem']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Data'); ?></td>
			<td><?php echo h($capturaMensagem['CapturaMensagem']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Página'); ?></td>
			<td><?php echo h($capturaMensagem['CapturaPagina']['slug']) ?></tr>
	</table>
</div>