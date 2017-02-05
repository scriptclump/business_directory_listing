<?php
App::uses('AppModel', 'Model');
/**
 * Advertisement Model
 *
 * @property Cmspage $Cmspage
 */
class Advertisement extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	public $actsAs = array(
		'Uploader.Attachment' => array(
			'file_src' => array(
				'overwrite' => false,
				'uploadDir' => 'files/uploads/advertisements/',
				'transportDir' => 'files/uploads/advertisements/',
				'finalPath' => 'files/uploads/advertisements/',
				'transforms' => array(
					'file_src_small' => array(
						'class' => 'resize',
						'append' => '-small',
						'overwrite' => false,
						'self' => false,
						'width' => 100,
						'height' => 100,
						'quality' => 100
					),
					'file_src_medium' => array(
						'class' => 'resize',
						'append' => '-small',
						'overwrite' => false,
						'self' => false,
						'width' => 250,
						'height' => 230,
						'quality' => 100,
						'aspect' => true,
						'mode' => 'width'
					),
					'file_src' => array(
						'class' => 'resize',
						'append' => '-medium',
						'overwrite' => false,
						'width' => 670,
						'height' => 80,
						'quality' => 100,
						'aspect' => true,
						'mode' => 'width'
					)
				)
			)
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
		'Cmspage' => array(
			'className' => 'Cmspage',
			'foreignKey' => 'cmspage_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	// Search
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
