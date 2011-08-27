<?php
/* Detail Fixture generated on: 2011-08-26 22:52:31 : 1314413551 */
class DetailFixture extends CakeTestFixture {
	var $name = 'Detail';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'position' => array('type' => 'float', 'null' => false, 'default' => '1'),
		'field' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'value' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'input' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 16, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'data_type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 16, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'label' => array('type' => 'string', 'null' => false, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'UNIQUE_PROFILE_PROPERTY' => array('column' => array('field', 'user_id'), 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => '4e585bef-bfd4-4e19-9db9-33606a3dfe48',
			'user_id' => 'Lorem ipsum dolor sit amet',
			'position' => 1,
			'field' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'input' => 'Lorem ipsum do',
			'data_type' => 'Lorem ipsum do',
			'label' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-08-26 22:52:31',
			'modified' => '2011-08-26 22:52:31'
		),
	);
}
