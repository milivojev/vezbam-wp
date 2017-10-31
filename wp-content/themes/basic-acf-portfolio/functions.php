<?php

	function custom_title(){
		$name = get_bloginfo('name');
		$description = get_bloginfo('description');
		$page_title = wp_title('|',true,'right');
		return $page_title.$name . " ~ ".$description;
	}


// dodavanje custom title sa add theme support title tag

// add_action( 'after_setup_theme', 'theme_functions' );
// function theme_functions() {

//     add_theme_support( 'title-tag' );

// }

// add_filter( 'wp_title', 'custom_titles', 10, 2 );
// function custom_titles( $title, $sep ) {

//     //Check if custom titles are enabled from your option framework
//     if ( ot_get_option( 'enable_custom_titles' ) === 'on' ) {
//         //Some silly example
//         $name = get_bloginfo('name');
// 		$description = get_bloginfo('description');
// 		$page_title = wp_title('|',true,'right');
// 		$title = $page_title.$name . " ~ ".$description;
//     }

//     return $title;
// }


add_action('after_setup_theme','custom_menus');
function custom_menus(){
	register_nav_menus( [
		'main-menu'=>'main menu, pages',
		'category-menu'=>'category menu, sub-header'
	] );
}

function excerpt($content,$length = 180){
	$content = wp_strip_all_tags( $content );
	$content = substr($content, 0, $length);
	echo $content;
}

add_action( 'wp_enqueue_scripts', 'custom_styles');
function custom_styles(){
	wp_register_style( 
		'bootstrap', 
		get_template_directory_uri()."/vendor/bootstrap/css/bootstrap.min.css",
		 [],
		  4.0, 
		  $media = 'all'
		   );
	wp_register_style(
		'modern-business',
		get_template_directory_uri().'/css/modern-business.css',
		['bootstrap'],
		1.0
	);
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'modern-business' );

}

add_action('wp_enqueue_script','custom_script ');
function custom_script(){
	wp_deregister_script( 
		'jQuery',
		get_template_directory_uri()."/vendor/jquery/jquery.min.js",
		[],
		3.21,
		true
	 );
	wp_retister_script(
		'popper',
		get_template_directory_uri()."/vendor/popper/popper.min.js",
		[],
		1.111,
		true
	);
		wp_register_script(
		'bootstrap',
		get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.min.js',
		[],
		4.0,
		true
	);
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('jQuery');
	wp_enqueue_script('popper');
}
add_image_size('Portfolio Featured',750, 500, true);
add_image_size('Hero',1920, 1080, true);


// To register your Google API key, please use the ‘acf/fields/google_map/api’ filter like so:
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyDs09UnmSHTn45QP-3GYfcv27rzhMdovPc');
}

add_action('acf/init', 'my_acf_init');

/**

     * We all need a debug method. The second parameter is optional

     * and decides if php is set to die after printing the var.

     */

    function dump($input, $die = false) {

        echo '<pre>';

        if (is_bool($input)) {

            var_dump($input);

        } else {

            print_r($input);

        }

        echo '</pre>';

        if ($die) {

            die();

        }

    }