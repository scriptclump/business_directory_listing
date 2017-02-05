<?php
App::uses('AppModel', 'Model');
/**
 * City Model
 *
 * @property State $State
 */
class City extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


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
		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state_iso',
			'conditions' => '',
            'group' => 'City.city_name',
			'fields' => '',
			'order' => ''
		)
	);

	public $filterArgs = array(
        'city_name' => array(
            'type' => 'like',
            'field' => 'city_name'
        ),
        'state_iso' => array(
            'type' => 'query',
            'method' => 'orConditionsState'
        ),
        'status' => array(
            'type' => 'value',
            'field' => 'status'
        )
    );

    public function orConditionsState($data = array()) {
        $state_iso = $data['state_iso'];
        $condition = array(
            'OR' => array(
                $this->alias . '.state_iso LIKE' => '%' . $state_iso . '%',
            )
        );
        return $condition;
    }
}
