<?php
App::uses('AppController', 'Controller');
/**
 * Dashboards Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DashboardsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	var $uses = array('Category', 'Business', 'User' );

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$total_categories = $this->Category->find('count');
		$total_businesses = $this->Business->find('count');
		$total_paid_users = $this->User->find('count',
			array('conditions' => array('Group.id' => 4, 'Business.membership_id' => 2 )
				)
			);
		$total_free_users = $this->Business->find('count',
			array('conditions' => array('Business.membership_id' => 1 )
				)
			);
		$this->set( compact( 'total_categories', 'total_businesses', 'total_paid_users', 'total_free_users' ) );


	}

}
