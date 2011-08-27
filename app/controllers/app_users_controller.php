<?php
App::import('Controller', 'Users.Users');
class AppUsersController extends UsersController {
	
	public $viewPath = 'app_users';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->User = ClassRegistry::init('AppUser');
		$this->User->Detail = ClassRegistry::init('AppDetail');
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

/**
 * Edit
 *
 * @param string $id User ID
 * @return void
 */
	public function edit() {
		if (!empty($this->data)) {
			$this->data['Detail'] = $this->data['Detail']['User'];
			unset($this->data['Detail']['User']);

			if ($this->User->Detail->saveSection($this->Auth->user('id'), $this->data, 'User')) {
				$this->Session->setFlash(__d('users', 'Profile saved.', true));
			} else {
				$this->Session->setFlash(__d('users', 'Could not save your profile.', true));
			}
		} else {
			$this->data = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $this->Auth->user('id'),
				)
			));
		}

		$this->_setLanguages();
	}

}
