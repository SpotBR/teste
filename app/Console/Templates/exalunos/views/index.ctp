<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright	 Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link		  http://cakephp.org CakePHP(tm) Project
 * @package	   Cake.Console.Templates.default.views
 * @since		 CakePHP(tm) v 1.2.0.5234
 * @license	   MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="row">
	<div class="span12 <?php echo $pluralVar; ?> index">
		<?php echo "<?php echo \$this->Html->link(__('Cadastrar novo ') . __('" .$singularHumanName . "'), array('action' => 'add'), array('class' => 'btn btn-primary pull-right')); ?>"; ?>

		<h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
		
		<?php echo "<?php echo \$this->Session->flash() ?>" ?>

		<table class="table table-striped table-hover">
			<tr>
<?php  
	foreach ($fields as $field): 
		if($field == 'id') $field = "#";
?>
				<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
<?php endforeach; ?>
				<th class="actions">&nbsp;</th>
			</tr>   
		<?php
		echo "\t<?php foreach (\${$pluralVar} as \${$singularVar}){ ?>\n";
		echo "\t\t\t\t<tr>\n";
		  foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
			  foreach ($associations['belongsTo'] as $alias => $details) {
				if ($field === $details['foreignKey']) {
				  $isKey = true;
				  echo "\t\t\t\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
				  break;
				}
			  }
			}
			if ($isKey !== true) {
			  echo "\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
			}
		  }

		  echo "\t\t\t\t\t<td class=\"actions text-right\">\n";
		  echo "\t\t\t\t\t\t<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-file\"></span>', array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false, 'class' => 'btn btn-sm btn-primary', 'title' => __('Visualizar'))); ?>\n";
		  echo "\t\t\t\t\t\t<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-pencil\"></span>', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false, 'class' => 'btn btn-sm btn-warning', 'title' => __('Editar'))); ?>\n";
		  echo "\t\t\t\t\t\t<?php echo \$this->Form->postLink('<span class=\"glyphicon glyphicon-trash\"></span>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false, 'class' => ' btn btn-sm btn-danger', 'title' => 'Excluir'), __('Deseja realmente deletar o registro # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
		  echo "\t\t\t\t\t</td>\n";
		echo "\t\t\t\t</tr>\n";

		echo "\t\t\t<?php } ?>\n";
		?>
		</table>

		<p class="pull-left">
			<?php echo "<?php
			echo \$this->Paginator->counter(array(
				'format' => __('Página {:page} de {:pages}. Mostrando registros de {:start} a {:end} de {:count}.')
			));
			?>"; ?> 
		</p>
		<?php
		  echo "<?php echo \$this->Paginator->pagination(array('div' => 'pagination pagination-right')) ?>\n"
		?>
	</div>
</div>