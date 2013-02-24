<?php
App::uses('Postcat', 'Model');

/**
 * Postcat Test Case
 *
 */
class PostcatTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.postcat',
		'app.post',
		'app.user',
		'app.comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Postcat = ClassRegistry::init('Postcat');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Postcat);

		parent::tearDown();
	}

}
