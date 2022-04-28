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

		<button class="luk">Tilbage</button>
			<section class="indhold">
				<img id="pic" src="" alt="">
				<article class="enkeltKage">
					<h2></h2>
					
					<p class="text"></p>
				</article>
			</section>
		</main><!-- #main -->

		<script>

			let kage;
			const url = "https://mariksen.dk/kea/2-semester/09_cms/passion_site/wp-json/wp/v2/projekt/"+<?php echo get_the_ID() ?>;

			async function hentData() {
				console.log("id er");
				const data = await fetch(url);
				kage = await data.json();
				visProjekter();
			}

			function visProjekter(){
				document.querySelector("h2").textContent = projekt.title.rendered;
				document.querySelector("#pic").src = projekt.billede2.guid;
				document.querySelector(".text").textContent = projekt.beskrivelse;
				document.querySelector(".luk").addEventListener("click", () => {
        history.back();})
			}

			hentData();
		</script>
	</div><!-- #primary -->

<?php
get_footer();
