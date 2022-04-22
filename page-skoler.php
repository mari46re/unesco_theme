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
		<section id="skole-oversigt"> </section>

			
				

		</main><!-- #main -->
	</div><!-- #primary -->

			<template>
				<article>
					<img src="" alt="">
					<h3></h3>
					<p></p>
					<a href="mailto:"></a>
					<a href=""></a>
				</article>
			</template>

			<script>
				console.log("forbundet")

				let skoler = [];
				let categories;
				let filterSkole = "alle";

				const liste = document.querySelector("#skole-oversigt")
				const skabelon = document.querySelector("template")
				document.addEventListener("DOMContentLoaded", start);

				const url = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/skole";
				const catUrl = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/categories";
				function start(){
				console.log("nu er vi i start")
				hentData();
				}
				
			</script>

<?php
get_footer();
