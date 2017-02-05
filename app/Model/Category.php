<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Category extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	//public $useTable = 'categories';

	public $actsAs = array(
				'Tree',
				'Containable',
				'Sluggable.Sluggable' => array(
					'field'       => 'title',
					'saveField'   => 'slug',
					'override'    => false,
					'separator'   => '-',
					'length'      => 100,
					'translation' => 'utf-8'
				),
				'Search.Searchable'
	);

	public $belongsTo = array(
		'ParentCategory' => array(
			'className'  => 'Category',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		)//,
		// 'ListingType' => array(
  //           'className'  => 'ListingType',
  //           'foreignKey' => 'listing_type_id',
  //           'conditions' => '',
  //           'fields'     => '',
  //           'order'      => ''
  //       )
	);

	public $hasMany = array(
		'ChildCategory' => array(
			'className'  => 'Category',
			'foreignKey' => 'parent_id',
			'dependent'  => false
		)//,
		// 'CategoriesBusiness' => array(
		// 	'className' => 'CategoriesBusiness',
		// 	'foreignKey' => 'business_id',
		// 	'dependent' => false,
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => '',
		// 	'limit' => '',
		// 	'offset' => '',
		// 	'exclusive' => '',
		// 	'finderQuery' => '',
		// 	'counterQuery' => ''
		// )
	);

	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
    public $hasAndBelongsToMany = array(
        'ListingType' => array(
			'className' => 'ListingType',
			'joinTable' => 'categories_listing_types',
			'foreignKey' => 'category_id',
			'associationForeignKey' => 'listing_type_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '*',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'group' => 'ListingType.id'
		),
		'Business' => array(
			'className' => 'Business',
			'joinTable' => 'businesses_categories',
			'foreignKey' => 'category_id',
			'associationForeignKey' => 'business_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => 'Business.name',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
    );


    /**
	 * Returns an array of businesses based on a category id
	 * @return array of businesses
	 */
    public function listAllListingTypeCategories( ){
	    $categories = $this->find('all', array(
	        'joins' => array(
	             array('table' => 'categories_businesses',
	                'alias' => 'CategoriesBusiness',
	                'type' => 'INNER',
	                'conditions' => array(
	                    'CategoriesBusiness.business_id = Category.id'
	                )
	            )
	        ),
	        'group' => 'Category.id'
	    ));
	    return $categories;
	    // $businesses = $this->find('all', array( 'conditions' => array( ) ));
	    // return $businesses;
    }


////////////////////////////////////////////////////////////
	public $filterArgs = array(
        'title' => array(
			'type'  => 'like',
			'field' => 'title'
        ),
        'listing_type_id' => array(
			'type'  => 'like',
			'field' => 'listing_type_id'
        ),
        'status' => array(
			'type'  => 'value',
			'field' => 'status'
        )

    );
}
