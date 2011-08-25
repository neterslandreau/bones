<?php
class M4e56572f221c48f89f6d16736a3dfe48 extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'attachments' => array(
					'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'model' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
					'foreign_key' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'dirname' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 255),
					'basename' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
					'checksum' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
					'group' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 255),
					'alternative' => array('type' => 'string', 'null' => true, 'default' => NULL,'length' => 50),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
				)
			)
		),
		'down' => array(
			'drop_table' => array(
				'attachments'
			)
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
?>