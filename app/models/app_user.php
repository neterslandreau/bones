<?php
App::import('Model', 'Users.User');
class AppUser extends User {
    public $useTable = 'users';
    public $name = 'AppUser';
	public $alias = 'User';
}
