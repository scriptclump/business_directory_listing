<?php
App::uses('AppModel', 'Model');
/**
 * Business Model
 *
 * @property Membership $Membership
 * @property City $City
 * @property State $State
 */
class Business extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $actsAs = array(
        'Uploader.Attachment' => array(
            'img_src' => array(
                'overwrite'    => false,
                'uploadDir'    => 'files/uploads/businesses/',
                'transportDir' => 'files/uploads/businesses/',
                'finalPath'    => 'files/uploads/businesses/',
                'transforms' => array(
                    'img_src_small' => array(
                        'class'     => 'resize',
                        'append'    => '-small',
                        'overwrite' => false,
                        'self'      => false,
                        'width'     => 150,
                        'height'    => 150,
                        'quality'   => 100
                    ),
                    'img_src_medium' => array(
                        'class'     => 'resize',
                        'append'    => '-medium',
                        'overwrite' => false,
                        'width'     => 510,
                        'height'    => 284,
                        'quality'   => 100,
                        'aspect'    => true,
                        'mode'      => 'width'
                    )
                )
            )
        ),
        'Containable',
		'Search.Searchable'

	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
    public $hasOne = array(
        'Country' => array(
            'className'  => 'Country',
            'foreignKey' => 'country_iso',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        ),
        'City' => array(
            'className'    => 'City',
            'foreignKey'   => 'id',
            'dependent'    => false,
            'conditions'   => '',
            'fields'       => '',
            'order'        => '',
            'limit'        => '',
            'offset'       => '',
            'exclusive'    => '',
            'finderQuery'  => '',
            'counterQuery' => ''
        )
    );

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
        'Membership' => array(
            'className'  => 'Membership',
            'foreignKey' => 'membership_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        )
    );

    public $hasMany = array(
        'Reviews' => array(
            'className'  => 'Review',
            'foreignKey' => 'business_id',
            'dependent'  => true,
            'conditions' => '',
            'order'      => 'Reviews.created DESC'
        ),
        'BusinessesImages' => array(
            'className'  => 'BusinessesImage',
            'foreignKey' => 'business_id',
            'dependent'  => true,
            'conditions' => '',
            'order'      => ''
        )
    );

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
    public $hasAndBelongsToMany = array(
        'Category' => array(
            'className'             => 'Category',
            'joinTable'             => 'businesses_categories',
            'foreignKey'            => 'business_id',
            'associationForeignKey' => 'category_id',
            'unique'                => 'keepExisting',
            'conditions'            => '',
            'fields'                => '',
            'order'                 => '',
            'limit'                 => '',
            'offset'                => '',
            'finderQuery'           => '',
        )
    );

	public $filterArgs = array(
        'name' => array(
            'type'  => 'like',
            'field' => 'name'
        ),
        'email' => array(
            'type'  => 'like',
            'field' => 'email'
        ),
        'phone' => array(
            'type'  => 'like',
            'field' => 'phone'
        ),
        'status' => array(
            'type'  => 'value',
            'field' => 'status'
        )
    );
}
