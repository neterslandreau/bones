<?php
/* AppUser Test cases generated on: 2011-08-26 22:49:25 : 1314413365*/
App::import('model', 'AppUser');

class AppUserTestCase extends CakeTestCase {
	var $fixtures = array('app.user', 'app.detail');

	public function startTest() {
		$this->AppUser = ClassRegistry::init('AppUser');
	}

	public function endTest() {
		unset($this->AppUser);
		ClassRegistry::flush();
	}
	
}
