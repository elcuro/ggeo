<?php
/* Node Fixture generated on: 2011-08-17 18:08:11 : 1313596931 */
class NodeFixture extends CakeTestFixture {
	var $name = 'Node';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 20),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique'),
		'body' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'excerpt' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'mime_type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'comment_status' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1),
		'comment_count' => array('type' => 'integer', 'null' => true, 'default' => '0'),
		'promote' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'path' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'terms' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'sticky' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'visibility_roles' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'type' => array('type' => 'string', 'null' => false, 'default' => 'node', 'length' => 100, 'key' => 'index'),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'slug' => array('column' => 'slug', 'unique' => 1), 'type' => array('column' => 'type', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'parent_id' => NULL,
			'user_id' => 1,
			'title' => 'Hello World',
			'slug' => 'hello-world',
			'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque lorem sit amet felis porta porttitor non ut ante. Aenean vehicula velit non sapien auctor nec tincidunt odio sodales. Ut massa nulla, placerat eget pretium quis, molestie sit amet ligula. Phasellus commodo laoreet velit, eget volutpat justo pellentesque id. Suspendisse eu ipsum nec justo sollicitudin faucibus. Curabitur elementum imperdiet augue ut varius. Sed risus lorem, lacinia ut ultrices vel, tincidunt at neque. Ut posuere turpis quis justo semper interdum. Phasellus adipiscing libero vel quam dignissim ornare laoreet sem consectetur. Vestibulum ac ipsum velit. Praesent in neque est. Donec tempus imperdiet sodales. Proin imperdiet dolor nec lacus ullamcorper eu fermentum eros laoreet. Nulla et ante urna, eu varius magna.\r\n\r\nInteger porttitor commodo augue, eu facilisis erat hendrerit id. Duis aliquet orci id nulla ullamcorper quis molestie nisi adipiscing. Quisque lacus sapien, tincidunt quis varius ut, tempus ac sapien. Sed blandit leo et dui sollicitudin vel cursus augue bibendum. Curabitur accumsan tortor in ipsum porttitor hendrerit. Integer nec odio sapien, eu fringilla mauris. Duis vitae mi nisi, nec lobortis lorem. Morbi urna elit, dictum at mattis vel, tincidunt vel odio. Ut urna enim, accumsan non viverra vitae, lobortis vel elit. Fusce tellus mi, auctor eu elementum vitae, molestie bibendum metus. Nam risus urna, semper id laoreet id, vehicula in ipsum. Nam sit amet velit quis dolor pulvinar fermentum. Ut laoreet semper nulla, sit amet dignissim tellus adipiscing bibendum. In porttitor sem vel quam ornare dignissim. Cras sed mi arcu. Maecenas leo massa, feugiat sit amet vestibulum id, rhoncus ut sem. Curabitur convallis nibh eu erat accumsan tempor. Donec lobortis pulvinar molestie. Sed imperdiet fermentum purus in iaculis. Duis placerat, risus ac semper egestas, nulla quam imperdiet neque, a tincidunt arcu dolor volutpat sem.\r\n\r\nSed eu metus sit amet libero scelerisque varius. Quisque laoreet, lorem eget tincidunt dictum, nibh odio tincidunt erat, sollicitudin iaculis diam elit quis lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras semper massa sed lorem egestas a auctor mi feugiat. Phasellus a ullamcorper odio. Nullam nec enim risus. Cras in congue sapien. Vivamus libero arcu, dictum sit amet gravida a, cursus quis enim. Sed accumsan blandit odio ac placerat. Nunc volutpat interdum eleifend. Phasellus sed felis a arcu commodo sagittis eget quis urna. Nulla facilisi. Duis condimentum adipiscing ornare. In sagittis, nunc ac egestas auctor, arcu enim elementum neque, et venenatis purus odio et nisl. In tortor sapien, accumsan non pulvinar eget, sollicitudin a nisl.\r\n\r\nCurabitur vel urna ipsum, in blandit enim. Aliquam purus ipsum, vulputate at elementum ac, vehicula sed enim. Donec commodo commodo eleifend. Nam eu ultricies sapien. Maecenas euismod iaculis sapien, ac congue enim molestie in. Nam dapibus, augue vitae fermentum semper, orci quam accumsan eros, faucibus feugiat libero nisi non nisl. Aliquam erat volutpat. Fusce dictum blandit lobortis. Nam tempus magna ipsum, vitae pulvinar lectus. Maecenas iaculis ultricies aliquet. Etiam faucibus lacinia tempus. Fusce sed nibh non mi pharetra scelerisque. Nunc purus nisl, vulputate in ornare id, cursus ut lectus. Nullam feugiat condimentum enim quis mattis. Proin suscipit sem et orci iaculis porta. Curabitur a dui magna, non aliquam nunc. Duis lacinia imperdiet massa ut auctor. Etiam vel urna tortor. Nullam dapibus, est ut dignissim fermentum, felis enim faucibus metus, vel pellentesque erat tellus et libero.\r\n\r\nNullam quis dictum neque. Aenean in convallis mauris. Curabitur volutpat, nulla ut porta eleifend, arcu magna suscipit tortor, non scelerisque ligula sem ut nisl. In sit amet metus diam, ut tempus turpis. Etiam vehicula placerat augue, laoreet cursus dolor feugiat a. Cras hendrerit fringilla massa, id sagittis neque mattis nec. Proin dolor elit, cursus sed vestibulum sit amet, convallis vel est. Nulla sed sem lorem. Integer sit amet iaculis felis',
			'excerpt' => '',
			'status' => 1,
			'mime_type' => '',
			'comment_status' => 2,
			'comment_count' => 1,
			'promote' => 0,
			'path' => '/blog/hello-world',
			'terms' => '{\"1\":\"uncategorized\"}',
			'sticky' => 0,
			'lft' => 1,
			'rght' => 2,
			'visibility_roles' => '',
			'type' => 'blog',
			'updated' => '2011-02-18 15:20:53',
			'created' => '2009-12-25 11:00:00'
		),
		array(
			'id' => 2,
			'parent_id' => NULL,
			'user_id' => 1,
			'title' => 'About',
			'slug' => 'about',
			'body' => '<p>This is an example of a Croogo page, you could edit this to put information about yourself or your site.</p>',
			'excerpt' => '',
			'status' => 1,
			'mime_type' => '',
			'comment_status' => 0,
			'comment_count' => 0,
			'promote' => 0,
			'path' => '/about',
			'terms' => '',
			'sticky' => 0,
			'lft' => 1,
			'rght' => 2,
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2011-08-17 17:57:12',
			'created' => '2009-12-25 22:00:00'
		),
		array(
			'id' => 52,
			'parent_id' => NULL,
			'user_id' => 1,
			'title' => 'Point 1 L. Mikulas',
			'slug' => 'point-1',
			'body' => 'First point',
			'excerpt' => '',
			'status' => 1,
			'mime_type' => '',
			'comment_status' => 1,
			'comment_count' => 0,
			'promote' => 1,
			'path' => '/node/point-1',
			'terms' => '',
			'sticky' => 0,
			'lft' => 1,
			'rght' => 2,
			'visibility_roles' => '',
			'type' => 'node',
			'updated' => '2011-08-17 17:49:27',
			'created' => '2011-08-17 17:47:00'
		),
		array(
			'id' => 53,
			'parent_id' => NULL,
			'user_id' => 1,
			'title' => 'Point 2 Bobrovec',
			'slug' => 'point-2-bobrovec',
			'body' => '',
			'excerpt' => '',
			'status' => 1,
			'mime_type' => '',
			'comment_status' => 1,
			'comment_count' => 0,
			'promote' => 1,
			'path' => '/node/point-2-bobrovec',
			'terms' => '{\"1\":\"uncategorized\"}',
			'sticky' => 0,
			'lft' => 3,
			'rght' => 4,
			'visibility_roles' => '',
			'type' => 'node',
			'updated' => '2011-08-17 17:53:19',
			'created' => '2011-08-17 17:48:00'
		),
		array(
			'id' => 54,
			'parent_id' => NULL,
			'user_id' => 1,
			'title' => 'Point 3 Ruzomberok',
			'slug' => 'point-3-ruzomberok',
			'body' => '',
			'excerpt' => '',
			'status' => 1,
			'mime_type' => '',
			'comment_status' => 1,
			'comment_count' => 0,
			'promote' => 1,
			'path' => '/node/point-3-ruzomberok',
			'terms' => '{\"1\":\"uncategorized\"}',
			'sticky' => 0,
			'lft' => 3,
			'rght' => 4,
			'visibility_roles' => '',
			'type' => 'node',
			'updated' => '2011-08-17 17:53:58',
			'created' => '2011-08-17 17:49:00'
		),
		array(
			'id' => 55,
			'parent_id' => NULL,
			'user_id' => 1,
			'title' => 'Point 4 Bodice',
			'slug' => 'point-4-bodice',
			'body' => '',
			'excerpt' => '',
			'status' => 1,
			'mime_type' => '',
			'comment_status' => 1,
			'comment_count' => 0,
			'promote' => 1,
			'path' => '/node/point-4-bodice',
			'terms' => '',
			'sticky' => 0,
			'lft' => 5,
			'rght' => 6,
			'visibility_roles' => '',
			'type' => 'node',
			'updated' => '2011-08-17 17:51:45',
			'created' => '2011-08-17 17:51:00'
		),
		array(
			'id' => 24,
			'parent_id' => NULL,
			'user_id' => 0,
			'title' => 'fiaa cash',
			'slug' => 'fiaa cash.jpg',
			'body' => '',
			'excerpt' => '',
			'status' => 0,
			'mime_type' => 'image/jpeg',
			'comment_status' => 1,
			'comment_count' => 0,
			'promote' => 0,
			'path' => '/uploads/fiaa cash.jpg',
			'terms' => '',
			'sticky' => 0,
			'lft' => 1,
			'rght' => 2,
			'visibility_roles' => '',
			'type' => 'attachment',
			'updated' => '2011-03-03 15:06:37',
			'created' => '2011-03-03 15:06:37'
		),
		array(
			'id' => 25,
			'parent_id' => NULL,
			'user_id' => 0,
			'title' => 'ozn_dmv_1_2008',
			'slug' => 'ozn_dmv_1_2008.pdf',
			'body' => '',
			'excerpt' => '',
			'status' => 0,
			'mime_type' => 'application/pdf',
			'comment_status' => 1,
			'comment_count' => 0,
			'promote' => 0,
			'path' => '/uploads/ozn_dmv_1_2008.pdf',
			'terms' => '',
			'sticky' => 0,
			'lft' => 1,
			'rght' => 2,
			'visibility_roles' => '',
			'type' => 'attachment',
			'updated' => '2011-03-03 15:07:11',
			'created' => '2011-03-03 15:07:11'
		),
	);
}
?>