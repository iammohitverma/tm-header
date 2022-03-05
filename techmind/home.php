<?php
/**
 * The template for displaying blog page 
 *
 * Blog Listing Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jagsness-theme
 */

 get_header(); ?>

<div class="container-fluid">

    <div class="container">
        <h1 style="text-align:center">Home Page</h1>
        <?php
        if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                        
                echo "<h2 style='text-align:center'>Display Blog Listing</h2>";
            

            endwhile;

            the_posts_navigation();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
    </div>

</div><!-- #main -->

<?php get_footer(); ?>
