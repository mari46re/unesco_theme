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
		<main id="main" class="site-main single-main">

		<button class="luk">Tilbage</button>
			<section class="indhold">
				<img id="pic" src="" alt="">
				<article class="enkeltProjekt">
					<h2></h2>
					
					<p class="text"></p>
				</article>
			</section>
		</main><!-- #main -->

		<script>
	window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		document.getElementById("masthead").style.backgroundColor = "#f7f7f3e6";
		document.getElementById("logo").style.padding = "1rem"
		
	} else {
		document.getElementById("masthead").style.backgroundColor = "none";
}

			let projekt;
			const url = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/projekt/"+<?php echo get_the_ID() ?>;

			async function hentData() {
				console.log("id er");
				const data = await fetch(url);
				projekt = await data.json();
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
