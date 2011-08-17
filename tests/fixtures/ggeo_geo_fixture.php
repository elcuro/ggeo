<?php
/* GgeoGeo Fixture generated on: 2011-08-17 18:08:16 : 1313597116 */
class GgeoGeoFixture extends CakeTestFixture {
	var $name = 'GgeoGeo';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'node_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'lat' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'lon' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'radius' => array('type' => 'float', 'null' => true, 'default' => '1'),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'updated' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'node_id' => 2,
			'lat' => '48.1483765',
			'lon' => '17.1073105',
			'radius' => 10,
			'created' => '0000-00-00 00:00:00',
			'updated' => '0000-00-00 00:00:00'
		),
		array(
			'id' => 27,
			'node_id' => 52,
			'lat' => '49.0824894',
			'lon' => '19.6120471',
			'radius' => 10,
			'created' => '0000-00-00 00:00:00',
			'updated' => '0000-00-00 00:00:00'
		),
		array(
			'id' => 28,
			'node_id' => 53,
			'lat' => '49.1210303',
			'lon' => '19.6141104',
			'radius' => 10,
			'created' => '0000-00-00 00:00:00',
			'updated' => '0000-00-00 00:00:00'
		),
		array(
			'id' => 29,
			'node_id' => 54,
			'lat' => '49.0833555',
			'lon' => '19.3050566',
			'radius' => 10,
			'created' => '0000-00-00 00:00:00',
			'updated' => '0000-00-00 00:00:00'
		),
		array(
			'id' => 30,
			'node_id' => 55,
			'lat' => '49.0592497',
			'lon' => '19.5748102',
			'radius' => 10,
			'created' => '0000-00-00 00:00:00',
			'updated' => '0000-00-00 00:00:00'
		),
	);
}
?>