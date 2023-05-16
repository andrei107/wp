<?php
/*
Plugin Name: Gusto
Description:
Version: 1
Author: Andrei
*/

function loadAssets()
{
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/bootstrap/bootstrap.js');
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/bootstrap/bootstrap.css');
}

add_action('init', 'loadAssets');
				
function gusto_options_install() 
{
    global $wpdb;

    $table_name = $wpdb->prefix . "receipt_table";
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
                `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
				`img_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
				`time_prepare` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
				`calories` int(10) CHARACTER SET utf8 DEFAULT NULL,
				`ingridients` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
				`receipt` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
				`persons` int(10) CHARACTER SET utf8 DEFAULT NULL,
				PRIMARY KEY(id)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

register_activation_hook(__FILE__, 'gusto_options_install');

add_action('admin_menu','receipt_modifymenu');

function receipt_modifymenu() 
{
	add_menu_page('Gusto', 
		'Gusto', 
		'manage_options', 
		'receipt_list', 
		'receipt_list' 
	);
	
	add_submenu_page('receipt_list', 
		'Add new receipt', 
		'Добавить рецепт', 
		'manage_options', 
		'receipt_create', 
		'receipt_create'
	); 

	add_submenu_page(null, 
		'Update receipt', 
		'Update', 
		'manage_options',
		'receipt_update', 
		'receipt_update'
	); 
}

define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'receipt-list.php');
require_once(ROOTDIR . 'receipt-create.php');
require_once(ROOTDIR . 'receipt-update.php');
