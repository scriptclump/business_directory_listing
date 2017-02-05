<?php
App::uses('AppModel', 'Model');
/**
 * Membership Model
 *
 */
class Membership extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	public $actsAs = array(
			'Search.Searchable'
	);

	public $filterArgs = array(
        'title' => array(
            'type' => 'like',
            'field' => 'title'
        ),
        'status' => array(
            'type' => 'value',
            'field' => 'status'
        )
    );

}
