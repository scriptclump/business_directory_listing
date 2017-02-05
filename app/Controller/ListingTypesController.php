<?php
App::uses('AppController', 'Controller');
/**
 * ListingTypes Controller
 *
 * @property ListingType $ListingType
 * @property PaginatorComponent $Paginator
 */
class ListingTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Search.Prg');


	public function beforeFilter() {
		parent::beforeFilter();
		if( $this->RequestHandler->isPost() && ( ($this->action == 'admin_bulk_action') ) ){
			$this->Security->validatePost = false;
			$this->Security->enabled = false;
			$this->Security->csrfCheck = false;
		}
		$this->Auth->allow('show', 'display');
    }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		// $this->ListingType->recursive = 0;
		// $this->set('listingTypes', $this->Paginator->paginate());
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit'] = 50;
        $this->Paginator->settings['conditions'] = $this->ListingType->parseCriteria($this->Prg->parsedParams());
        $this->set('listingTypes', $this->Paginator->paginate());
        $this->set('title_for_layout', 'Listing Types');
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ListingType->exists($id)) {
			throw new NotFoundException(__('Invalid listing type'));
		}
		$options = array('conditions' => array('ListingType.' . $this->ListingType->primaryKey => $id));
		$this->set('listingType', $this->ListingType->find('first', $options));
		$this->set('title_for_layout', 'Listing Types');
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ListingType->create();
			if ($this->ListingType->save($this->request->data)) {
				$this->Session->setFlash(__('The listing type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The listing type could not be saved. Please, try again.'));
			}
		}
		$this->set('title_for_layout', 'Listing Types');
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ListingType->exists($id)) {
			throw new NotFoundException(__('Invalid listing type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ListingType->save($this->request->data)) {
				$this->Session->setFlash(__('The listing type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The listing type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ListingType.' . $this->ListingType->primaryKey => $id));
			$this->request->data = $this->ListingType->find('first', $options);
		}
		$this->set('title_for_layout', 'Listing Types');
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ListingType->id = $id;
		if (!$this->ListingType->exists()) {
			throw new NotFoundException(__('Invalid listing type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ListingType->delete()) {
			$this->Session->setFlash(__('The listing type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The listing type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_bulk_action() {
		$this->request->onlyAllow('post', 'bulk_action');
		if( count($this->request->data['ListingType']['del_item']) > 0 ){
			foreach ($this->request->data['ListingType']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['ListingType']['do_action'] == "activate" ){
				if( $this->ListingType->updateAll( array('ListingType.status'=>1), array('ListingType.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected listing types are activated.', true));
	            }
	        }

	        if( $this->request->data['ListingType']['do_action'] == "deactivate" ){
				if( $this->ListingType->updateAll( array('ListingType.status'=>0), array('ListingType.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected listing types are deactivated.', true));
	            }
	        }

	        if( $this->request->data['ListingType']['do_action'] == "delete" ){
				if( count($this->request->data['ListingType']['del_item']) > 0 ){
					foreach ($this->request->data['ListingType']['del_item'] as $key => $value) {
						$this->ListingType->id = $value;
						if (!$this->ListingType->exists()) {
							throw new NotFoundException(__('Invalid business'));
						}
						if ($this->ListingType->delete()) {
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


	public function show() {
      $listing_types = $this->ListingType->find('all');
      $this->set('listing_types', $listing_types);
      $this->set('title_for_layout', 'Listing Types');
      $this->set('meta_key', 'Listing Types');
      $this->set('meta_desc', 'Listing Types');
    }

    public function display(){
    	$this->ListingType->recursive = 0;
    	$options = array(
    		'fields' => array('ListingType.id, ListingType.title'),
    		'conditions' => array('ListingType.status' => 1) );
    	return $listing_types = $this->ListingType->find('all', $options);
    }
}
