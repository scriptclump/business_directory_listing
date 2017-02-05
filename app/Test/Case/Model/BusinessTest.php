<?php
App::uses('Business', 'Model');

/**
 * Business Test Case
 *
 */
class BusinessTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.business',
		'app.membership',
		'app.listing_type',
		'app.city',
		'app.state',
		'app.country',
		'app.category_buisness'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Business = ClassRegistry::init('Business');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Business);

		parent::tearDown();
	}

}
