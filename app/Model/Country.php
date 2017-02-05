<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 * @property State $State
 */
class Country extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'country_iso';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'country_iso';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state_iso',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
