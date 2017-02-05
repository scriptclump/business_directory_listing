<?php
App::uses('AppModel', 'Model');
/**
 * ListingType Model
 *
 * @property Business $Business
 */
class ListingType extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	public $actsAs = array(
			'Search.Searchable'
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	// public $hasMany = array(
	// 	'Business' => array(
	// 		'className'    => 'Business',
	// 		'foreignKey'   => 'listing_type_id',
	// 		'dependent'    => false,
	// 		'conditions'   => '',
	// 		'fields'       => '',
	// 		'order'        => '',
	// 		'limit'        => '',
	// 		'offset'       => '',
	// 		'exclusive'    => '',
	// 		'finderQuery'  => '',
	// 		'counterQuery' => ''
	// 	)
	// );

/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
    public $hasAndBelongsToMany = array(
        'Category' => array(
			'className' => 'Category',
			'joinTable' => 'categories_listing_types',
			'foreignKey' => 'listing_type_id',
			'associationForeignKey' => 'category_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '*',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => ''
		)
    );


	public $filterArgs = array(
        'title' => array(
			'type'  => 'like',
			'field' => 'title'
        ),
        'status' => array(
			'type'  => 'value',
			'field' => 'status'
        )
    );

}
