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
		<h1 id="overskrift">Skoler i Netværket</h1>
		<p>Se listen over de mange skoler, der er en del af det danske UNESCO ASP-netværk. Find også skolernes hjemmesider samt oplysningerne på de individuelle skolers kontaktpersoner.</p>
		<label for="pet-select">Vælg et verdensmål</label>

		<select name="Skoler" id="Skole-valg">
			<!-- <option value="">Vælg</option> -->
			<option data-skole="alle">Alle</option>
			<!-- <option value="cat">Cat</option>
			<option value="hamster">Hamster</option>
			<option value="parrot">Parrot</option>
			<option value="spider">Spider</option>
			<option value="goldfish">Goldfish</option> -->
		</select>
		
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
				opretMuligheder();
				}

				function opretMuligheder(){
				categories.forEach(cat =>{document.querySelector("#skole-valg").innerHTML +=`<option class="filter" data-projekt="${cat.id}">${cat.name}</option>`
				})

					addEventListenerToOptions();
				}

				function addEventListenerToOptions(){
					document.querySelectorAll("#skole-valg").forEach(elm => {elm.addEventListener("click", filtrering);
				})

				visSkoler();
				}

				function visSkoler(){
				console.log(skoler)
				liste.innerHTML="";
				skoler.forEach(skole =>{
				if(filterSkole == "alle" || skole.categories.includes(parseInt(filterSkole))){
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
