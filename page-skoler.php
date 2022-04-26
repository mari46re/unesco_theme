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
		<h1 id="overskrift">SKOLER I NETVÆRKET</h1>
		<p id="brødtekst-skolerinet">Se listen over de mange skoler, der er en del af det danske UNESCO ASP-netværk. Find også skolernes hjemmesider samt oplysningerne på de individuelle skolers kontaktpersoner.</p>
		

		<nav id="skole-valg">
			<button data-skole="alle">Hele Danmark</button>
		</nav>
		
		<section id="skole-oversigt"> </section>

			
				

		</main><!-- #main -->
		<template>
				<article id="skole-enkle">
					<img src="" alt="">
					<h3></h3>
					<p></p>
					<a id="mail" href="mailto:"></a>
					<a id="link" href=""></a>
				</article>
			</template>

			<script>
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
				if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
					document.getElementById("masthead").style.backgroundColor = "#f7f7f3e6";
					document.getElementById("logo").style.padding = "1rem"
					
				} else {
					document.getElementById("masthead").style.backgroundColor = "none";
			}
}
				
				console.log("forbundet")

				let skoler = [];
				let categories;
				let filterSkole = "alle";

				const liste = document.querySelector("#skole-oversigt")
				const skabelon = document.querySelector("template")
				document.addEventListener("DOMContentLoaded", start);

				const url = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/skoler";
				const catUrl = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/categories?per_page=100";
				
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
				opretKanpper();
				}

				function opretKanpper(){
				categories.forEach(cat =>{document.querySelector("#skole-valg").innerHTML +=`<button class="filter" data-skole="${cat.id}">${cat.name}</button>`
				})

					addEventListenerToButton();
				}

				function addEventListenerToButton(){
					document.querySelectorAll("#skole-valg button").forEach(elm => {elm.addEventListener("click", filtrering);
				})

				
				}
				function filtrering(){
					filterSkole = this.dataset.skole;
					consol.log(filterskole);
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
