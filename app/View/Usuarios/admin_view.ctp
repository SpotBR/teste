<div class="usuarios view">
<h2><?php echo __('Usuário'); ?></h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($usuario['Usuario']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Nome'); ?></td>
			<td><?php echo h($usuario['Usuario']['nome']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('E-mail'); ?></td>
			<td><?php echo h($usuario['Usuario']['email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('CPF'); ?></td>
			<td><?php echo h($usuario['Usuario']['cpf']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Data de Nascimento'); ?></td>
			<td><?php echo h($usuario['Usuario']['data_nascimento']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Telefone'); ?></td>
			<td><?php echo h($usuario['Usuario']['telefone']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Endereço'); ?></td>
			<td><?php echo h($usuario['Usuario']['endereco']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Bairro'); ?></td>
			<td><?php echo h($usuario['Usuario']['bairro']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Cidade'); ?></td>
			<td><?php echo h($usuario['Usuario']['cidade']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Ativo'); ?></td>
			<td><?php echo h($usuario['Usuario']['ativo']? 'Sim': 'Não'); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Pago'); ?></td>
			<td><?php echo h($usuario['Usuario']['pago']? 'Sim': 'Não'); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Admin'); ?></td>
			<td><?php echo h($usuario['Usuario']['admin']? 'Sim': 'Não'); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Criado em'); ?></td>
			<td><?php echo h($usuario['Usuario']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modificado em'); ?></td>
			<td><?php echo h($usuario['Usuario']['modified']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Usuário Pai'); ?></td>
			<td><?php echo $this->Html->link($usuario['Pai']['nome'], array('controller' => 'usuarios', 'action' => 'view', $usuario['Pai']['id'])); ?></td>
		</tr>
	</table>
</div>