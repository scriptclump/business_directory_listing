<?php
App::uses('AppController', 'Controller');
/**
 * Cities Controller
 *
 * @property City $City
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CitiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Session', 'Search.Prg');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit'] = 100;
        $this->Paginator->settings['conditions'] = $this->City->parseCriteria($this->Prg->parsedParams());
        $this->Paginator->settings['group'] = 'City.city_name';
        $this->set('cities', $this->Paginator->paginate());
		// $this->City->recursive = 0;
		// $this->set('cities', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		$options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
		$this->set('city', $this->City->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->City->create();
			if ($this->City->save($this->request->data)) {
				$this->Session->setFlash(__('The city has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city could not be saved. Please, try again.'));
			}
		}
		$states = $this->City->State->find('list');
		$this->set(compact('states'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->City->save($this->request->data)) {
				$this->Session->setFlash(__('The city has been saved.'));
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
			$this->request->data = $this->City->find('first', $options);
		}
		$states = $this->City->State->find('list');
		$this->set(compact('states'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->City->delete()) {
			$this->Session->setFlash(__('The city has been deleted.'));
		} else {
			$this->Session->setFlash(__('The city could not be deleted. Please, try again.'));
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

		if( count($this->request->data['City']['del_item']) > 0 ){
			foreach ($this->request->data['City']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['City']['do_action'] == "activate" ){
				if( $this->City->updateAll( array('City.status'=>1), array('City.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected cities are activated.', true));
	            }
	        }

	        if( $this->request->data['City']['do_action'] == "deactivate" ){
				if( $this->City->updateAll( array('City.status'=>0), array('City.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected cities are deactivated.', true));
	            }
	        }

	        if( $this->request->data['City']['do_action'] == "delete" ){
				if( count($this->request->data['City']['del_item']) > 0 ){
					foreach ($this->request->data['City']['del_item'] as $key => $value) {
						$this->City->id = $value;
						if (!$this->City->exists()) {
							throw new NotFoundException(__('Invalid city'));
						}
						if ($this->City->delete()) {
							$this->Session->setFlash(__('The city (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The city could not be deleted. Please, try again.'),'error');
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

}
