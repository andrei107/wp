<?php

/*подключение стилей*/
add_action('wp_enqueue_scripts', 'theme_css');
function theme_css() {
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/style.css');
	wp_enqueue_style('font_style', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('font_style', get_stylesheet_directory_uri() . '/css/font-awesome.css');
};

/*подключение бутстрапа*/
function load_bootstrap(){
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/bootstrap/bootstrap.js');
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/bootstrap/bootstrap.css');

}
add_action('wp_enqueue_scripts', 'load_bootstrap');

//подключение скриптов
add_action('wp_enqueue_scripts', 'theme_scripts');
function theme_scripts(){
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'));
	wp_enqueue_script('snap.svg', get_template_directory_uri() . '/js/snap.svg.js');
}

require get_template_directory().'/wp_bootstrap_navwalker.php';

register_nav_menus(array(
  'header_menu' => 'Меню в header',
  'sidebar_menu'=>'Sidebar menu'
));

function true_register_wp_sidebars() {
	register_sidebar(
		array(
			'id' => 'true_side', 
			'name' => 'Боковая колонка', 
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', 
			'before_widget' => '<div id="%1$s" class="side widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}

add_action( 'widgets_init', 'true_register_wp_sidebars' );

//возможность самим вставлять лого
add_theme_support('custom_logo');

//роутинг
use JetRouter\Router;

$config = [];
  
$r = Router::create($config);

$r->get('receipts/{id}', 'get_receipt_by_id', function($id){
	$template = __DIR__ . '\receiptItemTemplate.php';
    load_template( $template, true, array( 'id' => $id ) );
  });


$r->get('menu/{menu_id}', 'get_receipt_by_menu', function($menu_id){
	$template = __DIR__ . '\selectMenuTemplate.php';
    load_template( $template, true, array( 'menu_id' => $menu_id ) );
  });
?>