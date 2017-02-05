<?php
App::uses('AppController', 'Controller');
/**
 * Businesses Controller
 *
 * @property Business $Business
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BusinessesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Search.Prg');
	public $helpers = array('Js');
	var $uses = array('Business', 'City', 'State');

	public function beforeFilter() {
        parent::beforeFilter();
		$this->Security->unlockedActions = array('admin_cityDropdownAjax','search');
		if( $this->RequestHandler->isPost() && ( ($this->action == 'admin_cityDropdownAjax') || ($this->action == 'admin_bulk_action') ) ){
			$this->Security->validatePost = false;
			$this->Security->enabled      = false;
			$this->Security->csrfCheck    = false;
		}
		$this->Auth->allow('view', 'review', 'search');
    }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit']      = 50;
		$this->Paginator->settings['conditions'] = $this->Business->parseCriteria($this->Prg->parsedParams());
        $this->set('businesses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}

		$options = array('conditions' => array('Business.' . $this->Business->primaryKey => $id));
		$business =  $this->Business->find('first', $options);
		$this->set('business', $business);

		// State Fetch.
		$states = $this->State->find('first', array(
			'fields'     => array('State.state_name'),
			'conditions' => array('State.state_iso' => $business['Business']['state_iso'])
	    ));
	    $this->set('states', $states);

	    // City Fetch.
		$cities = $this->City->find('first', array(
			'fields'     => array('City.city_name'),
			'conditions' => array('City.id' => $business['Business']['city_id'])
	    ));
	    $this->set('cities', $cities);
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Business->create();
			if ($this->Business->save($this->request->data)) {
				$this->Session->setFlash(__('The business has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business could not be saved. Please, try again.'));
			}
		}
		$memberships = $this->Business->Membership->find('list');
		$categories = $this->Business->Category->find('list', array(
	        'order' => array('Category.title' => 'asc')
	    ));
		$states = $this->State->find('list', array(
			'fields'     => array('State.state_iso', 'State.state_name'),
			'conditions' => array('State.status' => '1', 'State.country_iso' => 'US'),
			'recursive'  => 0
	    ));
		$this->set(compact('memberships', 'states', 'categories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Business->save($this->request->data)) {
				$this->Session->setFlash(__('The business has been saved.'));
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Business.' . $this->Business->primaryKey => $id));
			$this->request->data = $this->Business->find('first', $options);
		}
		$memberships = $this->Business->Membership->find('list');
		$categories = $this->Business->Category->find('list', array(
	        'order' => array('Category.title' => 'asc')
	    ));
		$states = $this->State->find('list', array(
			'fields'     => array('State.state_iso', 'State.state_name'),
			'conditions' => array('State.status' => '1', 'State.country_iso' => 'US'),
			'recursive'  => 0
	    ));
	    $cities = $this->City->find('list', array(
			'fields'     => array('City.id', 'City.city_name'),
			'conditions' => array('City.status' => '1', 'City.state_iso' => $this->request->data['Business']['state_iso']),
			'order'      => array('City.city_name', 'City.city_name ASC'),
			'group'      => array('City.city_name'),
			'recursive'  => 0
	    ));
		$this->set(compact('memberships', 'cities', 'states', 'categories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Business->id = $id;
		if (!$this->Business->exists()) {
			throw new NotFoundException(__('Invalid business'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Business->delete()) {
			$this->Session->setFlash(__('The business has been deleted.'));
		} else {
			$this->Session->setFlash(__('The business could not be deleted. Please, try again.'));
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
		if( count($this->request->data['Business']['del_item']) > 0 ){
			foreach ($this->request->data['Business']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['Business']['do_action'] == "activate" ){
				if( $this->Business->updateAll( array('Business.status'=>1), array('Business.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected businesses are activated.', true));
	            }
	        }

	        if( $this->request->data['Business']['do_action'] == "deactivate" ){
				if( $this->Business->updateAll( array('Business.status'=>0), array('Business.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected businesses are deactivated.', true));
	            }
	        }

	        if( $this->request->data['Business']['do_action'] == "delete" ){
				if( count($this->request->data['Business']['del_item']) > 0 ){
					foreach ($this->request->data['Business']['del_item'] as $key => $value) {
						$this->Business->id = $value;
						if (!$this->Business->exists()) {
							throw new NotFoundException(__('Invalid business'));
						}
						if ($this->Business->delete()) {
							$this->Session->setFlash(__('The business (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The business could not be deleted. Please, try again.'),'error');
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

	public function admin_cityDropdownAjax(){
		$state_iso =  $this->request->data['Business']['state_iso'];
		$cities = $this->City->find('list', array(
			'fields'     => array('City.id', 'City.city_name'),
			'conditions' => array('City.status' => '1', 'City.state_iso' => $state_iso),
			'order'      => array('City.city_name', 'City.city_name ASC'),
			'group'      => array('City.city_name'),
			'recursive'  => 0
	    ));
	    $this->set('cities',$cities);
		$this->layout = 'ajax';
	}

	public function view($slug = null) {
		$business = $this->Business->findBySlug($slug);
		$this->set('business', $business);
		$this->set('title_for_layout', $business['Business']['meta_title']);
		$this->set('meta_key', $business['Business']['meta_keyword']);
		$this->set('meta_desc', $business['Business']['meta_desc']);
	}

	public function search(){
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit'] = 20;
		$this->Paginator->settings['contain'] = array(
	            'Reviews' => array(
	                'fields' => array('rating'),
	                'conditions' => array('Reviews.status' => 1)
	            ),
	            'City' => array(
	                'fields' => array('city_name'),
	                'conditions' => array('City.status' => 1)
	            )
	    );
        $this->Paginator->settings['conditions'] = $this->Business->parseCriteria($this->Prg->parsedParams());
        $this->set('businesses', $this->Paginator->paginate());
	}
}
