<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'users', 'action' => 'register', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => true));
	Router::connect('/categories', array('controller' => 'ListingTypes', 'action' => 'show'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/category/:slug', array('controller' => 'categories', 'action' => 'view'), array('pass' => array('slug')));
	Router::connect('/business/:slug', array('controller' => 'businesses', 'action' => 'view'), array('pass' => array('slug')));
	Router::connect('/business/rate-it/:id', array('controller' => 'businesses', 'action' => 'rateIt'), array('pass' => array('id')));
	Router::connect('/business/reviews/:id', array('controller' => 'businesses', 'action' => 'reviews'), array('pass' => array('id')));


	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/merchant', array('controller' => 'merchants', 'action' => 'login', 'merchant' => true));
	Router::connect('/:slug', array('controller' => 'cmspages', 'action' => 'view'), array('pass' => array('slug')));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
