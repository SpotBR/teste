<div class="empresas view">
<h2><?php echo __('Empresa'); ?></h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($empresa['Empresa']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Nome'); ?></td>
			<td><?php echo h($empresa['Empresa']['nome']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Site'); ?></td>
			<td><?php echo h($empresa['Empresa']['site']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Telefone'); ?></td>
			<td><?php echo h($empresa['Empresa']['telefone']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('E-mail'); ?></td>
			<td><?php echo h($empresa['Empresa']['email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Logo'); ?></td>
			<td><?php echo h($empresa['Empresa']['logo']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Ativo'); ?></td>
			<td><?php echo h($empresa['Empresa']['ativo']? 'Sim': 'Não'); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Criado em'); ?></td>
			<td><?php echo h($empresa['Empresa']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modificado em'); ?></td>
			<td><?php echo h($empresa['Empresa']['modified']); ?></td>
		</tr>
	</table>
</div>