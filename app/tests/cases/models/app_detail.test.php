<?php
/* AppDetail Test cases generated on: 2011-08-26 22:49:46 : 1314413386*/
App::import('model', 'AppDetail');

class AppDetailTestCase extends CakeTestCase {
	var $fixtures = array('app.detail', 'app.user');

	function startTest() {
		$this->AppDetail = ClassRegistry::init('AppDetail');
	}

	function endTest() {
		unset($this->AppDetail);
		ClassRegistry::flush();
	}

}
