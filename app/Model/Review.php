<?php
App::uses('AppModel', 'Model');
/**
 * Review Model
 *
 * @property Business $Business
 */
class Review extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $actsAs = array(
		'Containable',
		'Captcha' => array(
            'field' => array('security_code'),
            'error' => 'Incorrect captcha code value'
        ),
		'Search.Searchable'
    );


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Business' => array(
			'className' => 'Business',
			'foreignKey' => 'business_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public $filterArgs = array(
        'business_id' => array(
			'type'  => 'value',
			'field' => 'business_id'
        ),
        'status' => array(
			'type'  => 'value',
			'field' => 'status'
        )

    );
}
