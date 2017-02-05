<?php
App::uses('AppController', 'Controller');
/**
 * Reviews Controller
 *
 * @property Review $Review
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ReviewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Search.Prg', 'Captcha' => array('field' => 'security_code', 'mlabel' => ''));
	var $uses          = array('Review', 'Business');

	public function beforeFilter() {
        parent::beforeFilter();
		$this->Security->unlockedActions = array('add');
		if( $this->RequestHandler->isPost() && ( ($this->action == 'add') || ($this->action == 'admin_bulk_action') ) ){
		    $this->Security->validatePost = false;
		    $this->Security->enabled = false;
		    $this->Security->csrfCheck = false;
		}
		$this->Auth->allow('view', 'captcha', 'add');
    }

/**
 * index method
 *
 * @return void
 */
	public function index( $id = null ) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		$this->Paginator->settings['fields']     = array( '`Review`. `id`, `Review`. `name`, `Review`. `email`, `Review`. `status`, `Review`. `created` ');
		$this->Paginator->settings['conditions'] = array( '`Review`.`business_id`' => $id );
		$this->Paginator->settings['contain'] = array(
	        'Business' => array( 'fields' => array('name') )
	    );
	    //$this->Paginator->settings['limit'] = 10;
		$this->Review->recursive = 0;
		$this->set('reviews', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Review->exists($id)) {
			throw new NotFoundException(__('Invalid review'));
		}
		$options = array('conditions' => array('Review.' . $this->Review->primaryKey => $id));
		$this->set('review', $this->Review->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($business_id) {
		if (!$this->Business->exists($business_id)) {
			throw new NotFoundException(__('Invalid business'));
		}

		if (!empty($this->request->data)) {
			$this->Review->setCaptcha('security_code', $this->Captcha->getCode('Review.security_code')); //getting from component and passing to model to make proper validation check
	        $this->Review->set($this->request->data);
	        if($this->Review->validates())	{
	        	$this->Review->create();
				if ($this->Review->save($this->request->data)) {
					$this->Session->setFlash(__('Thanks for submitting the review. Your review has been sent to admin departmemt for approval.'));
					return $this->redirect(array('controller' => 'reviews', 'action' => 'add', $business_id ));
				} else {
					$this->Session->setFlash(__('The review could not be saved. Please, try again.'));
				}
			}	else	{ //or
				//$error =  $this->Review->invalidFields();
				$this->Session->setFlash('Unable to proceed. Please see the error below and try again.', 'frontend_error');
			}
		}
		$businesses = $this->Review->Business->find('first', array( 'fields' => array('`Business`.`id`, `Business`.`name`, `Business`.`slug` '), 'conditions' => array('`Business`.`id`' => $business_id),
		'recursive' => -1 )  );
		$this->set(compact('businesses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Review->exists($id)) {
			throw new NotFoundException(__('Invalid review'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Review->save($this->request->data)) {
				$this->Session->setFlash(__('The review has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The review could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Review.' . $this->Review->primaryKey => $id));
			$this->request->data = $this->Review->find('first', $options);
		}
		$businesses = $this->Review->Business->find('list');
		$this->set(compact('businesses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Review->id = $id;
		if (!$this->Review->exists()) {
			throw new NotFoundException(__('Invalid review'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Review->delete()) {
			$this->Session->setFlash(__('The review has been deleted.'));
		} else {
			$this->Session->setFlash(__('The review could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit']      = 50;
		$this->Paginator->settings['conditions'] = $this->Review->parseCriteria($this->Prg->parsedParams());
		$this->Paginator->settings['order']      = array( 'created' => 'DESC' );
		$this->Review->recursive                 = 0;
		$this->set('reviews', $this->Paginator->paginate());
		$businesses = $this->Review->Business->find('list', array('order' => array('name' => 'ASC') ));
		$this->set('businesses', $businesses);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Review->exists($id)) {
			throw new NotFoundException(__('Invalid review'));
		}
		$options = array('conditions' => array('Review.' . $this->Review->primaryKey => $id));
		$this->set('review', $this->Review->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Review->create();
			if ($this->Review->save($this->request->data)) {
				$this->Session->setFlash(__('The review has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The review could not be saved. Please, try again.'));
			}
		}
		$businesses = $this->Review->Business->find('list');
		$this->set(compact('businesses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Review->exists($id)) {
			throw new NotFoundException(__('Invalid review'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Review->save($this->request->data)) {
				$this->Session->setFlash(__('The review has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The review could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Review.' . $this->Review->primaryKey => $id));
			$this->request->data = $this->Review->find('first', $options);
		}
		$businesses = $this->Review->Business->find('list');
		$this->set(compact('businesses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Review->id = $id;
		if (!$this->Review->exists()) {
			throw new NotFoundException(__('Invalid review'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Review->delete()) {
			$this->Session->setFlash(__('The review has been deleted.'));
		} else {
			$this->Session->setFlash(__('The review could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	function captcha()	{
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha'); //load it
        }
        $this->Captcha->create();
    }


    /**
	 * bulk action method
	 *
	 * @return void
	 */
	public function admin_bulk_action() {
		$this->request->onlyAllow('post', 'bulk_action');

		if( count($this->request->data['Review']['del_item']) > 0 ){
			foreach ($this->request->data['Review']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['Review']['do_action'] == "activate" ){
				if( $this->Review->updateAll( array('Review.status'=>1), array('Review.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected reviews are activated.', true));
	            }
	        }

	        if( $this->request->data['Review']['do_action'] == "deactivate" ){
				if( $this->Review->updateAll( array('Review.status'=>0), array('Review.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected reviews are deactivated.', true));
	            }
	        }

	        if( $this->request->data['Review']['do_action'] == "delete" ){
				if( count($this->request->data['Review']['del_item']) > 0 ){
					foreach ($this->request->data['Review']['del_item'] as $key => $value) {
						$this->Review->id = $value;
						if (!$this->Review->exists()) {
							throw new NotFoundException(__('Invalid review'));
						}
						if ($this->Review->delete()) {
							$this->Session->setFlash(__('The review (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The review could not be deleted. Please, try again.'),'error');
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

}
