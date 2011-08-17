<?php
/* NodesTaxonomy Fixture generated on: 2011-08-17 18:08:52 : 1313596972 */
class NodesTaxonomyFixture extends CakeTestFixture {
	var $name = 'NodesTaxonomy';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'node_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 20),
		'taxonomy_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 2,
			'node_id' => 1,
			'taxonomy_id' => 1
		),
		array(
			'id' => 158,
			'node_id' => 54,
			'taxonomy_id' => 1
		),
		array(
			'id' => 157,
			'node_id' => 53,
			'taxonomy_id' => 1
		),
	);
}
?>