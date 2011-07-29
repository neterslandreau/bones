<?php
App::import('Controller', 'Users.Users');
class AppUsersController extends UsersController {
	
	public $viewPath = 'app_users';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->User = ClassRegistry::init('AppUser');
	}

	public function render($action = null, $layout = null, $file = null) {
		if (is_null($action)) {
			$action = $this->action;
		}
		if (!file_exists(VIEWS . $this->viewPath . DS . $action . '.ctp')) {
			$file = App::pluginPath('users') . 'views' . DS . 'users' . DS . $action . '.ctp';
		}
		return parent::render($action, $layout, $file);
	}

}
