<?php
App::import('Model', 'Users.User');
class AppUser extends User {
    public $useTable = 'users';
    public $name = 'AppUser';
	public $alias = 'User';

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Detail' => array(
			'className' => 'AppDetail',
			'foreign_key' => 'user_id'));

/**
 * Constructor
 *
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
	}
/**
 * Registers a new user
 *
 * @param array $postData Post data from controller
 * @param boolean $useEmailVerification If set to true a token will be generated
 * @return mixed
 */
	public function register($postData = array(), $useEmailVerification = true) {
		$postData = $this->_beforeRegistration($postData, $useEmailVerification);

		$this->_removeExpiredRegistrations();

		$this->set($postData);
//debug($this->Detail);
		if ($this->validates()) {
			App::import('Core', 'Security');
			$postData[$this->alias]['passwd'] = Security::hash($postData[$this->alias]['passwd'], 'sha1', true);
			$this->create();
			$ret = $this->save($postData, false);
			$this->Detail->createDefaults($this->id);
			return $ret;
		}

		return false;
	}


}
