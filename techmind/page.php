<?php
/**
 * The template for displaying all inner pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jagsness-theme
 */

 get_header(); ?>

<div class="container-fluid" id="single-post">
	<div class="container">
        <h1 style="text-align:center">Page</h1>
		<?php the_content();?>
	</div>
</div>
    
<?php get_footer(); ?>
