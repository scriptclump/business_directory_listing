<?php
App::uses('AppController', 'Controller');
/**
 * Advertisements Controller
 *
 * @property Advertisement $Advertisement
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdvertisementsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Search.Prg');

	/**
	 * beforeFilter method
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		if( $this->RequestHandler->isPost() && ($this->action == 'admin_bulk_action' ) ){
			$this->Security->validatePost = false;
			$this->Security->enabled = false;
			$this->Security->csrfCheck = false;
		}
    }


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit'] = 50;
        $this->Paginator->settings['conditions'] = $this->Advertisement->parseCriteria($this->Prg->parsedParams());
		$this->Advertisement->recursive = 0;
		$this->set('advertisements', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Advertisement->exists($id)) {
			throw new NotFoundException(__('Invalid advertisement'));
		}
		$options = array('conditions' => array('Advertisement.' . $this->Advertisement->primaryKey => $id));
		$this->set('advertisement', $this->Advertisement->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Advertisement->create();
			if ($this->Advertisement->save($this->request->data)) {
				$this->Session->setFlash(__('The advertisement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advertisement could not be saved. Please, try again.'));
			}
		}
		$cmspages = $this->Advertisement->Cmspage->find('list');
		$this->set(compact('cmspages'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Advertisement->exists($id)) {
			throw new NotFoundException(__('Invalid advertisement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Advertisement->save($this->request->data)) {
				$this->Session->setFlash(__('The advertisement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advertisement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Advertisement.' . $this->Advertisement->primaryKey => $id));
			$this->request->data = $this->Advertisement->find('first', $options);
		}
		$cmspages = $this->Advertisement->Cmspage->find('list');
		$this->set(compact('cmspages'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Advertisement->id = $id;
		if (!$this->Advertisement->exists()) {
			throw new NotFoundException(__('Invalid advertisement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Advertisement->delete()) {
			$this->Session->setFlash(__('The advertisement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The advertisement could not be deleted. Please, try again.'));
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

		if( count($this->request->data['Advertisement']['del_item']) > 0 ){
			foreach ($this->request->data['Advertisement']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['Advertisement']['do_action'] == "activate" ){
				if( $this->Advertisement->updateAll( array('Advertisement.status'=>1), array('Advertisement.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected advertisements are activated.', true));
	            }
	        }

	        if( $this->request->data['Advertisement']['do_action'] == "deactivate" ){
				if( $this->Advertisement->updateAll( array('Advertisement.status'=>0), array('Advertisement.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected advertisements are deactivated.', true));
	            }
	        }

	        if( $this->request->data['Advertisement']['do_action'] == "delete" ){
				if( count($this->request->data['Advertisement']['del_item']) > 0 ){
					foreach ($this->request->data['Advertisement']['del_item'] as $key => $value) {
						$this->Advertisement->id = $value;
						if (!$this->Advertisement->exists()) {
							throw new NotFoundException(__('Invalid advertisement'));
						}
						if ($this->Advertisement->delete($value,true) != false) {
							$this->Session->setFlash(__('The advertisement (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The advertisement could not be deleted. Please, try again.'),'error');
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

	public function all_active_advertisements()
	{
		$cities = $this->Advertisement->find('all', array('fields'=>array('Advertisement.title, Advertisement.body, Advertisement.file_src'),
							   'recursive'=>0,
							   'order'=>array('Advertisement.id'),
							   'conditions'=> array('Advertisement.status' => 1)));

		if(isset($this->params['requested']))
		{
			return $cities;
		}
		$this->set('all_cities', $cities);
	}
}
