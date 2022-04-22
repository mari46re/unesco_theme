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
		<template>
				<article>
					<img src="" alt="">
					<h3></h3>
					<p></p>
					<a id="mail" href="mailto:"></a>
					<a id="link" href=""></a>
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

				const url = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/skoler";
				const catUrl = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/categories";
				
				function start(){
				console.log("nu er vi i start")
				hentData();
				}

				async function hentData() {
				const respons = await fetch(url);
				const catRespons = await fetch(catUrl);

				skoler = await respons.json();
				categories = await catRespons.json();
				console.log(categories);

				visSkoler();
				}

				function visSkoler(){
				console.log(skoler)
				liste.innerHTML="";
				skoler.forEach(skole =>{
				if(filterSkole == "alle" || skole.categories.includes(parseInt(filterProjekt))){
					const klon = skabelon.cloneNode(true).content;
				klon.querySelector("img").src = skole.logo.guid;
				klon.querySelector("h3").textContent = skole.title.rendered;
				klon.querySelector("p").textContent = skole.kontaktperson;
				klon.querySelector("#mail").textContent = skole.mail;
				klon.querySelector("#link").textContent = skole.link;
				liste.appendChild(klon);
				}
			})
		}
				
			</script>

	</div><!-- #primary -->
			
<?php
get_footer();
