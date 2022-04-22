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
<h1 id="overskrift">Projekter</h1>
<section id="projekt-oversigt"></section>
		</main><!-- #main -->

<template>
	<article>
		<img src="" alt="">
		<h3></h3>
	</article>
</template>

<script>
	console.log("så er vi i gang")

	let projekter = [];
	let categories;
	let filterProjekt = "alle";

	const liste = document.querySelector("#projekt-oversigt")
	const skabelon = document.querySelector("template")
	document.addEventListener("DOMContentLoaded", start);

	const url = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/projekt";
	const catUrl = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/categories";

function start(){
	console.log("nu er vi i start")
	hentData();
}

async function hentData() {
        const respons = await fetch(url);
		const catRespons = await fetch(catUrl);

        projekter = await respons.json();
		categories = await catRespons.json();
		console.log(categories);

		visProjekter();
}

function visProjekter(){
	console.log(projekter)
	liste.innerHTML="";
	projekter.forEach(projekt =>{
		if(filterProjekt == "alle" || projekt.categories.includes(parseInt(filterProjekt))){
			const klon = skabelon.cloneNode(true).content;
			klon.querySelector("img").src = projekt.billede2.guid;
			klon.querySelector("h3").textContent = projekt.title.rendered;
			liste.appendChild(klon);
		}
	})
}

</script>
			

		
	</div><!-- #primary -->

<?php
get_footer();