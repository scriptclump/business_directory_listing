<?php
class AutocompleteController extends AppController {

	public function beforeFilter(){
		$this->Auth->allow('fetch');
	}

    public function fetch($model, $search_field, $term = null) {
		$this->loadModel($model);
		$term = $this->request->query('term');
		$this->$model->recursive = 0;
		$field_alias = ucfirst($model);
		$results = $this->$model->find('all', array(
		   'fields' => array($field_alias.'.id, '.$field_alias.'.'.$search_field),
		   'conditions' =>array(
		       $model . "." . $search_field . " LIKE '%" . $term . "%'"
		   )
		));
		$result_arr = array();
		for($i=0; $i<count($results); $i++){
			$result_arr[] = array('label' => $results[$i][$field_alias]['name'], 'id' => $results[$i][$field_alias]['id'] );
		}
		$this->set(compact('result_arr'));
    }
}