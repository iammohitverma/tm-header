<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jagsness-theme
 */

get_header();
?>

<div class="container-fluid" id="single-post">
	<div class="container">
        <h1 style="text-align:center">Sinlge Page Template</h1>
		<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile; // End of the loop.
		?>
	</div>
<?php get_footer();?>

