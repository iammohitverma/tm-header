<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jagsness-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <!-- Header start -->
    <header>
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header">
                            <div class="header-wrap">
                                <div class="logo-wrap">
                                    <?php 
                                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                        
                                        //   if logo image does'nt exist call site title and tagline
                                        if ( has_custom_logo() ) {
                                            the_custom_logo();
                                        } else {?>
                                            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
                                            <!-- <p><?php bloginfo('description'); ?></p> -->
                                        <?php
                                        }
                                    ?>
                                </div>
                                <div class="centered-menu">
                                    <?php
                                        wp_nav_menu(  array(
                                            'menu_class'        => "centered-menu-ul", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                                            'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                                            'theme_location'    => "centered_menu", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                                            'before'               => '<div class="a-Wrap">', // (string) Text before the link text.
                                            'after'                => '</div>', // (string) Text after the link text.
                                        ) );
                                    ?>
                                </div>
                                <div class="buttons-wrap">
                                    <div class="contact-btn">
                                        <a href="#" class="hvr-bounce-to-right">Contact Us
                                            <i>
                                                <ion-icon name="call"></ion-icon>
                                            </i>
                                        </a>
                                    </div>
                                    <div class="hamburger">
                                        <svg class="ham hamRotate ham7" viewBox="0 0 100 100">
                                            <path class="line top"
                                                d="m 70,33 h -40 c 0,0 -6,1.368796 -6,8.5 0,7.131204 6,8.5013 6,8.5013 l 20,-0.0013">
                                            </path>
                                            <path class="line middle" d="m 70,50 h -40"></path>
                                            <path class="line bottom"
                                                d="m 69.575405,67.073826 h -40 c -5.592752,0 -6.873604,-9.348582 1.371031,-9.348582 8.244634,0 19.053564,21.797129 19.053564,12.274756 l 0,-40">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="full-screen-header-wrap">
                            <div class="full-screen-header">
                                <div class="toggled-menu-wrap">
                                    <div class="container p-0">
                                        <div class="toggled-menu">
                                            <?php
                                                wp_nav_menu(  array(
                                                    'menu_class'        => "toggled-menu-ul", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                                                    'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                                                    'theme_location'    => "primary_menu", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                                                    'before'               => '<div class="a-Wrap">', // (string) Text before the link text.
                                                    'after'                => '</div>', // (string) Text after the link text.
                                                ) );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-contact-us">
                                    <div class="container p-0">
                                        <div class="inner">
                                            <a href="#" class="link-button">Contact Us</a>
                                            <ul class="header-sci">
                                                <li>
                                                    <a href="#">
                                                        <span class="icon"><i class="fab fa-facebook-square fa-fw"></i></span>
                                                        <span class="text">Facebook</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="icon"><i class="fab fa-twitter fa-fw"></i></span>
                                                        <span class="text">Twitter</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="icon"><i class="fab fa-instagram fa-fw"></i></span>
                                                        <span class="text">Instagram</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="icon"><i class="fab fa-linkedin fa-fw"></i></span>
                                                        <span class="text">LinkedIn</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>