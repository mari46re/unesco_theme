<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End the loop.
			?>

		</main><!-- #main -->

		<script>
			window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	const header = document.getElementById("masthead");
	if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
		header.style.backgroundColor = "#f7f7f3";
		header.style.borderBottom = "1px solid #92d3ec";
		header.style.transition = "0.3s";
		
	} else {
		header.style.backgroundColor = "#f7f7f3b1";
		header.style.transition = "0.3s";
		header.style.boxShadow = "none";

}
}
		</script>
	</div><!-- #primary -->

<?php
get_footer();
