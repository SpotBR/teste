<div class="paginas view">
<h2><?php echo __('Página'); ?></h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($pagina['Pagina']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Slug'); ?></td>
			<td><?php echo h($pagina['Pagina']['slug']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Título'); ?></td>
			<td><?php echo h($pagina['Pagina']['titulo']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Título do Menu'); ?></td>
			<td><?php echo h($pagina['Pagina']['titulo_menu']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Texto'); ?></td>
			<td><?php echo h($pagina['Pagina']['texto']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Ativo'); ?></td>
			<td><?php echo h($pagina['Pagina']['ativo']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Criado em'); ?></td>
			<td><?php echo h($pagina['Pagina']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modificado em'); ?></td>
			<td><?php echo h($pagina['Pagina']['modified']); ?></td>
		</tr>
	</table>
</div>