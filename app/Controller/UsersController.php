<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	var $helpers = array('Html', 'Form', 'Captcha');
	public $components = array('Paginator', 'Captcha'=>array('field'=>'security_code', 'mlabel' => ''));//'Captcha'
	var $uses = array('User', 'Business', 'BusinessesImage', 'State', 'City', 'Country');


	public function beforeFilter() {
	    parent::beforeFilter();
        $this->Security->unlockedActions = array('my_account', 'admin_edit');
	    $this->Auth->allow('index', 'view', 'login', 'logout', 'register', 'admin_logout', 'admin_login', 'initDB', 'captcha', 'country_to_stateAjax', 'state_to_cityAjax', 'claim', 'pay');
	    if( $this->RequestHandler->isPost() && ($this->action == 'state_to_cityAjax' || $this->action == 'register' || $this->action == 'my_account'  || $this->action == 'admin_edit' ) ){
			$this->Security->validatePost = false;
			$this->Security->enabled      = false;
			$this->Security->csrfCheck    = false;
        }
	}

	public function initDB() {
	    $group = $this->User->Group;

	    // Allow admins to everything
	    $group->id = 1;
	    $this->Acl->allow($group, 'controllers');

	     // Allow admins to everything
	    $group->id = 2;
	    $this->Acl->allow($group, 'controllers');

	    // allow managers to posts and widgets
	    $group->id = 3;
	    $this->Acl->deny($group, 'controllers');
	    $this->Acl->allow($group, 'controllers/Posts');
	    $this->Acl->allow($group, 'controllers/Widgets');

	    // allow users to only add and edit on posts and widgets
	    $group->id = 4;
	    $this->Acl->deny($group, 'controllers');
	    $this->Acl->allow($group, 'controllers/Users/my_account');
	    $this->Acl->allow($group, 'controllers/Reviews/add');

	    // allow basic users to log out
	    $this->Acl->allow($group, 'controllers/users/logout');
	    $this->Acl->allow($group, 'controllers/Autocomplete/fetch');
	    $this->Acl->allow($group, 'controllers/BusinessesImages');

	    // we add an exit to avoid an ugly "missing views" error message
	    echo "all done";
	    exit;
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
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->Paginator->settings['conditions'] = array(array('NOT' => array('User.group_id' => array(1, 2, 3))));
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
		}
	}

	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			// if ( $_SESSION['Auth']['User']['id'] != $id ) {
			// 	$this->Session->setFlash(__('You are not allowed to change other user settings.'),'error');
			// 	return $this->redirect(array('action' => 'edit/'.$id));
			// }
			// pr($this->request->data);
			// die;
			$user_count = $this->User->find('count', array(
				'conditions' => array('User.username' => $this->request->data['User']['username'],
									  'User.id !=' => $this->request->data['User']['id']
								)
				)
			);
			if ($user_count > 0) {
				$this->Session->setFlash(__('This username is already taken. Please enter another username.'),'error');
				return $this->redirect(array('action' => 'edit/'.$id));
			} else {
				$this->request->data['User']['group_id'] = '4';
				if ($this->User->saveAll($this->request->data)) {
					$Email = new CakeEmail();
					//Email Activation Link to user.
					$Email->template('member_password', 'default')
					    ->emailFormat('html')
					    ->to($this->request->data['User']['email'])
					    ->subject('Pittsburgh Black Business Directory - Password')
					    ->viewVars(
						    	array(
									'fname'          => $this->request->data['Business']['fname'],
									'lname'          => $this->request->data['Business']['lname'],
									'email'          => $this->request->data['User']['email'],
									'password'       => $this->request->data['User']['password']
						    	)
					    	)
					    ->from('sender@pittsburghblackdirectory.com')
					    ->helpers(array('Html', 'Text'))
					    ->send();
					$this->Session->setFlash(__('Your information has been saved.'));
					return $this->redirect(array('action' => 'edit/'.$id));
				}
				$this->Session->setFlash(__('The user could not be saved. Please, try again.')
				);
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			unset($this->request->data['User']['password']);
			$businesses = $this->User->Business->find('list', array(
		        'order' => array('Business.name')
		    ));
		    $this->set(compact('businesses'));
		}
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_login() {
		if ($this->Session->read('Auth.Admin')) {
	        $this->Session->setFlash('You are logged in!');
	        return $this->redirect(array( 'controller' => 'dashboards', 'action' => 'index'));
	    }

	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
				$this->User->id = $this->Auth->user('id');
				$current        = date("Y-m-d H:i:s");
				$this->User->saveField('last_login',$current);
    			$group_id = $this->Auth->user('group_id');
    			if( $group_id == 1 || $group_id == 2 ){
    				if( $this->Auth->user('status') == "0" ){
    					$this->Session->setFlash(__('Your account is inactive. Kindly, contact to super admin.'), 'error');
    					$this->redirect($this->Auth->logout());
    				} else if( $this->Auth->user('status') == "2" ){
    					$this->Session->setFlash(__('Your account is has been suspended. Kindly, contact to super admin.'), 'error');
    					$this->redirect($this->Auth->logout());
    				} else if( $this->Auth->user('status') == "3" ){
    					$this->Session->setFlash(__('Your account is has been expired. Kindly, contact to super admin.'), 'error');
    					$this->redirect($this->Auth->logout());
    				} else{
    					$this->Session->setFlash(__('Welcome to the administrator panel.'));
    					return $this->redirect($this->Auth->redirect());
    				}
    			} else{
    				$this->Session->setFlash(__('You are not allowed to access the admin panel.'), 'error');
    				$this->redirect($this->Auth->logout());
    			}
	        }else{
	        	$this->Session->setFlash(__('Username or password entered is incorrect. Please try again.'), 'error');
	        }
	    }
	}

	public function admin_logout() {
	    $this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
	}

	public function admin_settings($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ( $_SESSION['Auth']['Admin']['id'] != $id ) {
				$this->Session->setFlash(__('You are not allowed to change other user settings.'),'error');
				return $this->redirect(array('action' => 'settings/'.$id));
			}

			$user_count = $this->User->find('count', array(
				'conditions' => array('User.username' => $this->request->data['User']['username'],
									  'User.id !=' => $this->request->data['User']['id']
								)
				)
			);
			if ($user_count > 0) {
				$this->Session->setFlash(__('This username is already taken. Please enter another username.'),'error');
				return $this->redirect(array('action' => 'settings/'.$id));
			} else {
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('Your information has been saved.'));
					return $this->redirect(array('action' => 'settings/'.$id));
				}
				$this->Session->setFlash(__('The user could not be saved. Please, try again.')
				);
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		}
		if ( $_SESSION['Auth']['Admin']['id'] != $id ) {
			$this->Session->setFlash(__('You are not allowed to change other user settings.'),'error');
			return $this->redirect(array('action' => 'settings/'.$_SESSION['Auth']['User']['id']));
		}
	}

	public function register() {
		$this->set('title_for_layout', 'Registration');
		// Country Fetch.
		$countries = array('US' => 'United States');
	    $this->set('countries', $countries);

	    // State Fetch.
		$states = $this->State->find('list', array(
			'fields'     => array('State.state_iso', 'State.state_name'),
			'conditions' => array('State.country_iso' => 'US', 'State.status' => '1')
	    ));
	    $this->set('states', $states);
		if (!empty($this->request->data)) {

			$this->User->set($this->request->data);
            if($this->User->validates()) {
            	$password = substr(str_shuffle('abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, 8);
				$this->request->data['User']['password'] = $password;
				$this->request->data['User']['username'] = $this->request->data['User']['email'];
	            $this->request->data['User']['status'] = '1'; // Default waiting for the approval.
	            $this->request->data['User']['activation_key'] = md5(uniqid()); // Adding the activation key
	            $this->request->data['User']['group_id'] = '4';
	            if ($this->User->saveAll($this->request->data)) {
	    			$Email = new CakeEmail();
					// Informing admin department about registration.
					$Email->template('registration_admin', 'default')
					    ->emailFormat('html')
					    ->to('info@pittsburghblackdirectory.com')
					    ->subject('Pittsburgh Black Business Directory - New Registration')
					    ->viewVars(
						    	array(
									'fname'   => $this->request->data['Business']['fname'],
									'lname'   => $this->request->data['Business']['lname'],
									'email'   => $this->request->data['User']['email']
						    	)
					    	)
					    ->from('sender@pittsburghblackdirectory.com')
					    ->helpers(array('Html', 'Text'))
					    ->send();

					//Email Activation Link to user.
					$Email->template('activation_link_member', 'default')
					    ->emailFormat('html')
					    ->to($this->request->data['User']['email'])
					    ->subject('Pittsburgh Black Business Directory - Account Activation Link')
					    ->viewVars(
						    	array(
									'fname'          => $this->request->data['Business']['fname'],
									'lname'          => $this->request->data['Business']['lname'],
									'email'          => $this->request->data['User']['email'],
									'password'       => $this->request->data['User']['password'],
									'activation_key' => $this->request->data['User']['activation_key']
						    	)
					    	)
					    ->from('sender@pittsburghblackdirectory.com')
					    ->helpers(array('Html', 'Text'))
					    ->send();
	                $this->Session->setFlash('Please check your email for the password', 'frontend_success');
	                return $this->redirect(array('action' => 'login'));
	            } else{
	            	$this->Session->setFlash('Please try again', 'frontend_error');
	            	//return $this->redirect(array('action' => 'register'));
	            }
	        }else{
	        	$this->Session->setFlash('Please check the validation error', 'frontend_error');
	        	//return $this->redirect(array('action' => 'register'));
	        }
		}
		$this->layout = 'home';
	    $this->render('home');
	}

	public function country_to_stateAjax(){
		$country_iso =  $this->request->data['Business']['country_iso'];
		$states = $this->State->find('list', array(
			'fields'     => array('State.state_iso', 'State.state_name'),
			'conditions' => array('State.status' => '1', 'State.country_iso' => $country_iso),
			'order'      => array('State.title', 'State.state_name ASC'),
			'recursive'  => 0
	    ));
	    $this->set('states',$states);
		$this->layout = 'ajax';
	}

	public function state_to_cityAjax(){
		$state_iso =  $this->request->data['Business']['state_iso'];
		$cities = $this->City->find('list', array(
			'fields'     => array('City.id', 'City.city_name'),
			'conditions' => array('City.status' => '1', 'City.state_iso' => $state_iso),
			'order'      => array('City.city_name' => 'ASC'),
			'group'      => array('City.city_name'),
			'recursive'  => 0
	    ));
	    $this->set('cities',$cities);
		$this->layout = 'ajax';
	}

	public function login() {
		if ($this->Session->read('Auth.User')) {
	        $this->Session->setFlash('You are logged in!');
	        return $this->redirect(array( 'controller' => 'users', 'action' => 'my_account'));
	    }

	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
				$this->User->id = $this->Auth->user('id');
				$current        = date("Y-m-d H:i:s");
				$this->User->saveField('last_login',$current);
    			$group_id = $this->Auth->user('group_id');
    			if( $group_id != 1 && $group_id != 2 ){
    				if( $this->Auth->user('status') == "0" ){
    					$this->Session->setFlash(__('Your account is inactive. Kindly, contact to admin.'), 'frontend_error');
    					$this->redirect($this->Auth->logout());
    				} else if( $this->Auth->user('status') == "2" ){
    					$this->Session->setFlash(__('Your account is has been suspended. Kindly, contact to admin.'), 'frontend_error');
    					$this->redirect($this->Auth->logout());
    				} else if( $this->Auth->user('status') == "3" ){
    					$this->Session->setFlash(__('Your account is has been expired. Kindly, contact to admin.'), 'frontend_error');
    					$this->redirect($this->Auth->logout());
    				} else{
    					return $this->redirect($this->Auth->redirect());
    				}
    			} else{
    				$this->Session->setFlash(__('Please login with your member username, password.'), 'frontend_error');
    				$this->redirect($this->Auth->logout());
    			}
	        }else{
	        	$this->Session->setFlash(__('Username or password entered is incorrect. Please try again.'), 'frontend_error');
	        }
	    }
	}

	public function logout() {
		$this->Session->setFlash('Good-Bye', 'frontend_success');
		$this->redirect($this->Auth->logout());
	}

	public function my_account() {
		$this->User->id = $this->Auth->user('id');

	    if ($this->request->is('post') || $this->request->is('put')) {
	    	if( count($this->request->data['BusinessesImage']) > 0 ) {
	    		for($i=0; $i<count($this->request->data['BusinessesImage']); $i++){
	    			$this->request->data['BusinessesImage'][$i]['business_id'] = $this->request->data['Business']['id'];
	    		}
	    	}
	    	$this->BusinessesImage->saveMany($this->request->data['BusinessesImage']);
	    	//   	$user_count = $this->User->find('count', array(
			// 	'conditions' => array('User.email' => $this->request->data['User']['email'],
			// 						  'User.id !=' => $this->request->data['User']['id']
			// 					)
			// 	)
			// );
			// if ($user_count > 0) {
			// 	$this->Session->setFlash(__('This username is already taken. Please enter another username.'),'frontend_error');
			// 	return $this->redirect(array('action' => 'my_account/'));
			// } else {
				// for($i=0; $i<=count($this->request->data['BusinessesImage']); $i++){
				// 	$this->request->data['BusinessesImage'][$i]['img_src'] = $this->request->data['BusinessesImage']['img_src'][$i];
				// 	unset($this->request->data['BusinessesImage']['img_src'][$i]);
				// }
				// unset($this->request->data['BusinessesImage']);
				// pr($this->request->data);
				// debug($this->User->validationErrors);
				// $this->User->saveAll($this->request->data);
				// die;
				if ($this->User->saveAll($this->request->data)) {
					$this->Session->setFlash(__('Your information has been saved.'), 'frontend_success');
					return $this->redirect(array('action' => 'my_account/'));
				} else{
					$this->Session->setFlash(__('Your information could not be saved. Please, try again.'), 'frontend_error');
					return $this->redirect(array('action' => 'my_account/'));
				}
			//}
	    } else{
	    	$this->User->recursive = 2;
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $this->Auth->user('id')),
				'contain' => array(
					'Business' => array(
						'Reviews',
			            'City' => array(
			                'fields' => array('city_name'),
			                'conditions' => array('City.status' => 1)
			            ),
			            'Country',
			            'BusinessesImages'
					)
		        )
	        );
			$user    = $this->User->find('first', $options);
		    $this->set(compact('user'));
	    }
	}

	public function claim( $business_id = null ){
		$this->Business->id = $business_id;
		if (!$this->Business->exists()) {
			throw new NotFoundException(__('Invalid business'));
		}
		if (!empty($this->request->data)) {
			$this->User->set($this->request->data);
			if($this->User->validates()) {
				$this->request->data['User']['username'] = $this->request->data['User']['email'];
				$this->request->data['User']['group_id'] = 4;
				$this->User->create();
				if( $this->User->save($this->request->data['User'] ) ){
					$user_id = $this->User->getLastInsertId();

					// Updating the business ID.
					$this->request->data['Business']['user_id'] = $user_id;
					$this->request->data['Business']['id']      = $business_id;
					$this->Business->save($this->request->data['Business']);
				}
				$this->Session->setFlash('Please pay in order to claim this listing', 'frontend_success');
				$this->redirect( 'pay' );
			}else{
				$this->Session->setFlash('Please check the message below.', 'frontend_error');
			}
		}
		$this->Business->recursive = -1;
		$business = $this->Business->find('first', array(
			'fields'     => array('Business.id', 'Business.name'),
			'conditions' => array('Business.id' => $business_id )
			));
		$this->set('business', $business);
	}

	public function pay(){
		// Generating PayPal button.
	}

}