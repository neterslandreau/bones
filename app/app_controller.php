<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
    public $components = array(
		'Session',
		'Auth',
		'Cookie',
		'Email',
		'RequestHandler',
		'Search.Prg'
	);
	public $helpers = array(
		'Session',
		'Html',
		'Javascript',
		'Form',
		'Xml',
		'Text'
	);
	public $publicControllers = array('pages');
/**
 * Object constructor - Adds the Debugkit panel if in development mode
 *
 * @return void
 */
	public function __construct() {
		if (Configure::read('debug')) {
			$this->components[] = 'DebugKit.Toolbar';
		}
		parent::__construct();
	}
	public function beforeFilter() {
		// i like to be able to view emails in development from debug kit
		if (Configure::read('debug')) {
			$this->Email->delivery = 'debug';
		}
		$prefixes = Configure::read('Routing.prefixes');
		$admin = in_array('admin', $prefixes);
		$this->Auth->loginAction = array('plugin' => null, 'controller' => 'app_users', 'action' => 'login', 'admin' => false);
		$this->Auth->logoutRedirect = '/';
		$this->Auth->loginError = __('Invalid username / password combination.  Please try again', true);
		$this->Auth->autoRedirect = false;
		$this->Auth->authorize = 'controller';
		$this->Auth->fields = array('username' => 'email', 'password' => 'passwd');

		$this->Cookie->name = 'bonesRememberMe';
		$this->Cookie->time = '1 Month';
		$cookie = $this->Cookie->read('User');

		if (!empty($cookie) && !$this->Auth->user()) {
			$data['User']['email'] = '';
			$data['User']['passwd'] = '';
			if (is_array($cookie)) {
				$data['User']['email'] = $cookie['email'];
				$data['User']['passwd'] = $cookie['passwd'];
			}
			if (!$this->Auth->login($data)) {
				$this->Cookie->destroy();
				$this->Auth->logout();
			}
		}
		if ($this->Auth->user()) {
			$this->set('userData', $this->Auth->user());
		}

		if (in_array(strtolower($this->params['controller']), $this->publicControllers)) {
            $this->Auth->allow('*');
        }
	}

	public function isAuthorized() {
		if (isset($this->params['prefix'])) {
			if ($this->params['prefix'] == 'admin' && $this->Auth->user('is_admin')) {
				return true;
			} 
		} else {
			if ($this->Auth->user()) {
				return true;
			}
		}
		return false;
	}
}
