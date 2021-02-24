function custom_plugins_table(){
	global $wpdb;
	require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
	if(count($wpdb->get_var('SHOW TABLES LIKE "wp_custom_plugins" ')) == 0){
	$sql_query_to_create_table = "CREATE TABLE `wp_custom_plugins` (
								 `id` int(11) NOT NULL AUTO_INCREMENT,
								 `name` varchar(255) DEFAULT NULL,
								 `email` varchar(255) DEFAULT NULL,
								 `created_At` timestamp NULL DEFAULT NULL,
								 PRIMARY KEY (`id`)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
								
	dbDelta($sql_query_to_create_table);
	}
}

register_activation_hook(__FILE__, 'custom_plugins_table')