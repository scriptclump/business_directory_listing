<?php
App::uses('AppController', 'Controller');
/**
 * BusinessesImages Controller
 *
 * @property BusinessesImage $BusinessesImage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BusinessesImagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BusinessesImage->recursive = 0;
		$this->set('businessesImages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BusinessesImage->exists($id)) {
			throw new NotFoundException(__('Invalid businesses image'));
		}
		$options = array('conditions' => array('BusinessesImage.' . $this->BusinessesImage->primaryKey => $id));
		$this->set('businessesImage', $this->BusinessesImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BusinessesImage->create();
			if ($this->BusinessesImage->save($this->request->data)) {
				$this->Session->setFlash(__('The businesses image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The businesses image could not be saved. Please, try again.'));
			}
		}
		$users = $this->BusinessesImage->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BusinessesImage->exists($id)) {
			throw new NotFoundException(__('Invalid businesses image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BusinessesImage->save($this->request->data)) {
				$this->Session->setFlash(__('The businesses image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The businesses image could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BusinessesImage.' . $this->BusinessesImage->primaryKey => $id));
			$this->request->data = $this->BusinessesImage->find('first', $options);
		}
		$users = $this->BusinessesImage->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BusinessesImage->id = $id;
		if (!$this->BusinessesImage->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->BusinessesImage->delete()) {
			$this->Session->setFlash(__('The image has been deleted.'));
		} else {
			$this->Session->setFlash(__('The image could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BusinessesImage->recursive = 0;
		$this->set('businessesImages', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BusinessesImage->exists($id)) {
			throw new NotFoundException(__('Invalid businesses image'));
		}
		$options = array('conditions' => array('BusinessesImage.' . $this->BusinessesImage->primaryKey => $id));
		$this->set('businessesImage', $this->BusinessesImage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BusinessesImage->create();
			if ($this->BusinessesImage->save($this->request->data)) {
				$this->Session->setFlash(__('The businesses image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The businesses image could not be saved. Please, try again.'));
			}
		}
		$users = $this->BusinessesImage->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BusinessesImage->exists($id)) {
			throw new NotFoundException(__('Invalid businesses image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BusinessesImage->save($this->request->data)) {
				$this->Session->setFlash(__('The businesses image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The businesses image could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BusinessesImage.' . $this->BusinessesImage->primaryKey => $id));
			$this->request->data = $this->BusinessesImage->find('first', $options);
		}
		$users = $this->BusinessesImage->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->BusinessesImage->id = $id;
		if (!$this->BusinessesImage->exists()) {
			throw new NotFoundException(__('Invalid businesses image'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BusinessesImage->delete()) {
			$this->Session->setFlash(__('The businesses image has been deleted.'));
		} else {
			$this->Session->setFlash(__('The businesses image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
