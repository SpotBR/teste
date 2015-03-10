<?php
App::uses('FormHelper', 'View/Helper');
App::uses('BoostCakeFormHelper', 'BoostCake.View/Helper');

class AppFormHelper extends BoostCakeFormHelper {
	public function create($model = null, $options = array()) {
		$default = array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array(
					'class' => 'col col-md-3 control-label'
				),
				'wrapInput' => 'col col-md-9',
				'class' => 'form-control'
			),
			'class' => 'form-horizontal'
		);
		$options = Hash::merge($default, $options);
		return parent::create($model, $options);
	}

}