<?php
App::uses('AppController', 'Controller');
/**
 * States Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class StatesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Search.Prg');

	public function beforeFilter() {
       parent::beforeFilter();
       if (AuthComponent::user('role') === 'admin') {
            //Here, we disable the Security component for Ajax requests and for the "fineupload" action
            if( $this->RequestHandler->isPost() && ($this->action == 'admin_bulk_action' ) ){
                $this->Security->validatePost = false;
                $this->Security->enabled = false;
                $this->Security->csrfCheck = false;
            }
        }
    }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Prg->commonProcess();
		$this->Paginator->settings['group'] = array('State.state_iso');
        $this->Paginator->settings['conditions'] = $this->State->parseCriteria($this->Prg->parsedParams());
        $this->set('states', $this->Paginator->paginate());
		// $this->State->recursive = 0;
		// $this->set('states', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Invalid state'));
		}
		$options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
		$this->set('state', $this->State->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->State->create();
			if ($this->State->save($this->request->data)) {
				$this->Session->setFlash(__('The state has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The state could not be saved. Please, try again.'));
			}
		}
		$countries = $this->State->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Invalid state'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->State->save($this->request->data)) {
				$this->Session->setFlash(__('The state has been saved.'));
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The state could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
			$this->request->data = $this->State->find('first', $options);
		}
		$countries = $this->State->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->State->id = $id;
		if (!$this->State->exists()) {
			throw new NotFoundException(__('Invalid state'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->State->delete()) {
			$this->Session->setFlash(__('The state has been deleted.'));
		} else {
			$this->Session->setFlash(__('The state could not be deleted. Please, try again.'));
		}

		$pos = strpos($this->referer(), 'view');
		if ($pos !== false) {
			return $this->redirect(array('action' => 'index'));
		} else{
			if ($this->referer() != '/') {
	            return $this->redirect($this->referer());
	        }
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * bulk action method
	 *
	 * @return void
	 */
	public function admin_bulk_action() {
		$this->request->onlyAllow('post', 'bulk_action');

		if( count($this->request->data['State']['del_item']) > 0 ){
			foreach ($this->request->data['State']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['State']['do_action'] == "activate" ){
				if( $this->State->updateAll( array('State.status'=>1), array('State.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected states are activated.', true));
	            }
	        }

	        if( $this->request->data['State']['do_action'] == "deactivate" ){
				if( $this->State->updateAll( array('State.status'=>0), array('State.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected states are deactivated.', true));
	            }
	        }

	        if( $this->request->data['State']['do_action'] == "delete" ){
				if( count($this->request->data['State']['del_item']) > 0 ){
					foreach ($this->request->data['State']['del_item'] as $key => $value) {
						$this->State->id = $value;
						if (!$this->State->exists()) {
							throw new NotFoundException(__('Invalid state'));
						}
						if ($this->State->delete()) {
							$this->Session->setFlash(__('The state (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The state could not be deleted. Please, try again.'),'error');
						}
					}
				} else{
					$this->Session->setFlash(__('Please select at least one item.'),'error');
				}
			}
		} else{
			$this->Session->setFlash(__('Please select at least one item.'),'error');
		}

		if ($this->referer() != '/') {
            return $this->redirect($this->referer());
        }
		return $this->redirect(array('action' => 'index'));
	}

	public function display(){
		return $states = $this->State->find('list', array(
			'fields'     => array('State.state_iso', 'State.state_name'),
			'conditions' => array('State.country_iso' => 'US', 'State.status' => '1')
	    ));
	}
}
