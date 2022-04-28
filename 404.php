<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Ups! Siden blev ikke fundet...', 'twentynineteen' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'Det ser ikke ud til vi kunne finde hvad du ledte efter. Vil du prøve igen??', 'twentynineteen' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->

		<script>	window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		document.getElementById("masthead").style.backgroundColor = "#f7f7f3e6";
		document.getElementById("logo").style.padding = "1rem"
		
	} else {
		document.getElementById("masthead").style.backgroundColor = "none";
}</script>
	</div><!-- #primary -->

<?php
get_footer();
