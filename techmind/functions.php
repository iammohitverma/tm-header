<?php

if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_JN_VERSION', '1.0.0' );
}

if ( ! function_exists( 'jagsness_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jagsness_theme_setup() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// Logo support
        $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => false, 
        );

        add_theme_support( 'custom-logo', $defaults );


        // added by mohit
        // added by mohit
        // added by mohit

          // change class of logo + add attr on logo element by av
            add_filter( 'get_custom_logo', function( $html, $blog_id ) {
                $html = str_replace( 'class="custom-logo"', 'class="logo-img img-fluid" title="'.get_bloginfo("name").'" alt="'.get_bloginfo("name").'"', $html );
                $html = str_replace( 'custom-logo-link', 'logo', $html );
                return $html;
            }, 10, 2 );


            // register_nav_menus Support
            register_nav_menus( array(
                'centered_menu' => __( 'Centered Menu', 'dynamicwp' ),
                'primary_menu' => __( 'Primary Menu', 'dynamicwp' ),
                'footer_menu'  => __( 'Footer Menu', 'dynamicwp' ),
            ) );		
            
            
            // replace menu current-menu-item class to active
            function dynamicwp_special_nav_class ($classes, $item) {
                if (in_array('current-menu-item', $classes) ){
                    $classes[] = 'active ';
                }
                return $classes;
            }
            add_filter('nav_menu_css_class' , 'dynamicwp_special_nav_class' , 10 , 2);    
            
            
            // add caret for submenus
            function dynamicwp_menu_arrow($item_output, $item, $depth, $args) {
                if (in_array('menu-item-has-children', $item->classes)) {
                    $arrow = '<span class="subMenuAngle"> <i class="fas fa-chevron-down"></i></span>'; // Change the class to your font icon
                    $item_output = str_replace('</a>', '</a>'. $arrow .'', $item_output);
                }
                return $item_output;
            }
            add_filter('walker_nav_menu_start_el', 'dynamicwp_menu_arrow', 10, 4);

        // added by mohit
        // added by mohit
        // added by mohit

        
        /**
         * Enqueue scripts and styles.
         */

        function jagsness_scripts() {
            wp_enqueue_style( 'jagsness-style', get_stylesheet_uri(), array(), _JN_VERSION );
            wp_enqueue_style( 'jagsness-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jagsness-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css',false, _JN_VERSION,'all');

            // owl and slick both are linked use one of them at once 
            wp_enqueue_style( 'jagsness-owl-style', get_template_directory_uri() . '/assets/css/owl/owl-carousel-v2..3.4.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jagsness-slick-style', get_template_directory_uri() . '/assets/css/slick/slick-1.8.1.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jagsness-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css',false, _JN_VERSION,'all');

            wp_enqueue_script( 'jagsness-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery-3.6.0.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jagsness-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true );

            // owl and slick both are linked use one of them at once  
            wp_enqueue_script( 'jagsness-owl-script', get_template_directory_uri() . '/assets/js/owl/owl-carousel-v2.3.4.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jagsness-slick-ionicons', "https://unpkg.com/ionicons@5.0.0/dist/ionicons.js" , _JN_VERSION, true );
            wp_enqueue_script( 'jagsness-slick-script', get_template_directory_uri() . '/assets/js/slick/slick-1.8.1.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jagsness-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true );


        //	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        //		wp_enqueue_script( 'comment-reply' );
        //	}
        }
        add_action( 'wp_enqueue_scripts', 'jagsness_scripts' );
	}
endif;
add_action( 'after_setup_theme', 'jagsness_theme_setup' );









function techiepress_get_send_data() {

    $url = 'https://jsonplaceholder.typicode.com/albums';
    
    $arguments = array(
        'method' => 'GET'
    );

	$response = wp_remote_get( $url, $arguments );

	if ( is_wp_error( $response ) ) {
		$error_message = $response->get_error_message();
		return "Something went wrong: $error_message";
	} else {
		echo '<pre>';
		var_dump( wp_remote_retrieve_body( $response ) );
		echo '</pre>';
	}
}	

add_shortcode( 'show_api_data' , 'techiepress_get_send_data' );















/**
 * Register a custom menu page to view the information queried.
 */
//function techiepress_register_my_custom_menu_page() {
//	add_menu_page(
//		__( 'Query API Test Settings', 'query-apis' ),
//		'Query API Test',
//		'manage_options',
//		'api-test.php',
//		'techiepress_get_send_data',
//		'dashicons-testimonial',
//		16
//	);
//}
//
//add_action( 'admin_menu', 'techiepress_register_my_custom_menu_page' );
//
//























