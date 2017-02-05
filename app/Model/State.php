<?php
App::uses('AppModel', 'Model');
/**
 * State Model
 *
 * @property Country $Country
 * @property City $City
 */
class State extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'state_iso';


	//The Associations below have been created with all possible keys, those that are not needed can be removed


	public $actsAs = array(
			'Search.Searchable'
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_iso',
			'conditions'  => array(
				'State.country_iso' => 'US'
			),
			'fields' => '',
			'order' => 'State.state_name',
			'group' => 'State.state_name'
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'City' => array(
			'className' => 'City',
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

	public $filterArgs = array(
        'state_name' => array(
            'type' => 'like',
            'field' => 'state_name'
        ),
        'status' => array(
            'type' => 'value',
            'field' => 'status'
        )
    );

}
