<?php
App::uses('AppModel', 'Model');
/**
 * BusinessesImage Model
 *
 * @property User $User
 */
class BusinessesImage extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

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
        )
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
}
