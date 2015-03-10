<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="<?php echo $pluralVar; ?> form">
<?php echo "<?php 
	echo \$this->Form->create('{$modelClass}', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'control-label'),
			'wrapInput' => false,
			'class' => 'form-control'
		), 
		'class' => 'col-md-8')
	); 
?>"; ?> 

	<h1><?php printf("<?php echo __('%s'), ' ', __('%s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h1>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->Form->input('{$field}');\n";
			}
		}
		/*if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}*/
		echo "\t?>\n";
?>
	<div class="form-group">
		<?php echo "<?php echo \$this->Form->submit('Salvar', array('div' => 'pull-right', 'class' => 'btn btn-primary pull-right')); ?>" ?> 
	</div>

<?php
	echo "	<?php echo \$this->Form->end(); ?>\n";
?>
</div>
