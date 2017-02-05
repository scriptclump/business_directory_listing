<?php
App::uses('AppController', 'Controller');
/**
 * Memberships Controller
 *
 * @property Membership $Membership
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MembershipsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Search.Prg');

	public function beforeFilter() {
		parent::beforeFilter();
		if( $this->RequestHandler->isPost() && ($this->action == 'admin_bulk_action' ) ){
			$this->Security->validatePost = false;
			$this->Security->enabled      = false;
			$this->Security->csrfCheck    = false;
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
        $this->Paginator->settings['conditions'] = $this->Membership->parseCriteria($this->Prg->parsedParams());
		$this->Membership->recursive = 0;
		$this->set('memberships', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Membership->exists($id)) {
			throw new NotFoundException(__('Invalid membership'));
		}
		$options = array('conditions' => array('Membership.' . $this->Membership->primaryKey => $id));
		$this->set('membership', $this->Membership->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Membership->create();
			if ($this->Membership->save($this->request->data)) {
				$this->Session->setFlash(__('The membership has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Membership->exists($id)) {
			throw new NotFoundException(__('Invalid membership'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Membership->save($this->request->data)) {
				$this->Session->setFlash(__('The membership has been saved.'));
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The membership could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Membership.' . $this->Membership->primaryKey => $id));
			$this->request->data = $this->Membership->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Membership->id = $id;
		if (!$this->Membership->exists()) {
			throw new NotFoundException(__('Invalid membership'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Membership->delete()) {
			$this->Session->setFlash(__('The membership has been deleted.'));
		} else {
			$this->Session->setFlash(__('The membership could not be deleted. Please, try again.'));
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

		if( count($this->request->data['Membership']['del_item']) > 0 ){
			foreach ($this->request->data['Membership']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['Membership']['do_action'] == "activate" ){
				if( $this->Membership->updateAll( array('Membership.status'=>1), array('Membership.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected memberships are activated.', true));
	            }
	        }

	        if( $this->request->data['Membership']['do_action'] == "deactivate" ){
				if( $this->Membership->updateAll( array('Membership.status'=>0), array('Membership.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected memberships are deactivated.', true));
	            }
	        }

	        if( $this->request->data['Membership']['do_action'] == "delete" ){
				if( count($this->request->data['Membership']['del_item']) > 0 ){
					foreach ($this->request->data['Membership']['del_item'] as $key => $value) {
						$this->Membership->id = $value;
						if (!$this->Membership->exists()) {
							throw new NotFoundException(__('Invalid membership'));
						}
						if ($this->Membership->delete()) {
							$this->Session->setFlash(__('The membership (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The membership could not be deleted. Please, try again.'),'error');
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
