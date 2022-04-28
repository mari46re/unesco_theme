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
<div class="projekter_indhold">
		<h1 id="overskrift">Projekter</h1>
		<p>På siden findes projekter indsendt af danske UNESCO verdensmålsskoler. Projekterne er alle med udgangspunkt i FNs 17 verdensmål og kan bruges som inspiration og motivation samt udgøre grundlaget for eksempelvis skoleprojekter, undersøgelser eller lignende.

</p>
<nav id="filtrering">
<div class="dropdown" id="verdensmaal-valg">
    <!-- <option value="">Vælg</option> -->
    <button onclick="toggleDropdown()" class="dropbtn">Vælg et verdensmål</button>
	<div id="myDropdown" class="dropdown-content">
		<button data-verdensmaal="alle">Vælg et verdenmål</button>
	</div>
</div>
</nav>
</div>

<section id="verdensmaal-oversigt"></section>
		</main><!-- #main -->

<template>
	<article id="projekt_article">
		<img src="" alt="">
		<h4></h4>
	</article>
</template>

<script>
	// Her er koden for headeren, der ændres når man scroller
	window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
				if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
					document.getElementById("masthead").style.backgroundColor = "#f7f7f3e6";
					document.getElementById("logo").style.padding = "1rem"
					
				} else {
					document.getElementById("masthead").style.backgroundColor = "none";
			}
		}



	console.log("så er vi i gang")

	let projekter = [];
	let verdensmaal;
	let valgt;
	let filter = "alle";

	const liste = document.querySelector("#verdensmaal-oversigt")
	const skabelon = document.querySelector("template")
	document.addEventListener("DOMContentLoaded", start);

	const url = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/projekt";
	const vmUrl = "https://mariksen.dk/kea/2-semester/09_cms/unesco_site/wp-json/wp/v2/verdensmaal?per_page=100";

function start(){
	console.log("nu er vi i start")
	hentData();

}



async function hentData() {
        const respons = await fetch(url);
		const vmRespons = await fetch(vmUrl);

        projekter = await respons.json();
		verdensmaal = await vmRespons.json();
		console.log(verdensmaal);

		visProjekter();
		opretMuligheder();
}




function opretMuligheder(){
	console.log("nu er vi i opret muligheder")
	verdensmaal.forEach(vm => {
		document.querySelector("#myDropdown").innerHTML +=`<button class="filter" data-projekt="${vm.id}">${vm.name}</button>`
	})

	addEventListenerToOptions();
}

function addEventListenerToOptions(){
	console.log("nu tilføjer vi eventlisteners til mulighederne")
	document.querySelectorAll("#myDropdown button").forEach(elm =>{elm.addEventListener("click", filtrering);
})	
// document.querySelector("#projekt-valg").addEventListener("change", filtrering)
}

// function klikFiltrering(){
// 	document.querySelector("#søg").addEventListener("click", filtrering);
// }



function filtrering(){
	// valgt = document.querySelector("#projekt-valg option").value;
	document.getElementById("myDropdown").classList.toggle("show")
	console.log(valgt)
	filter = this.dataset.projekt;
	visProjekter();
}



function visProjekter(){
	console.log(projekter)
	liste.innerHTML="";
	projekter.forEach((projekt) =>{
		if(filter == "alle" || projekt.verdensmaal.includes(parseInt(filter))){
			const klon = skabelon.cloneNode(true).content;
			klon.querySelector("img").src = projekt.billede2.guid;
			klon.querySelector("h4").textContent = projekt.title.rendered;
			klon
          .querySelector("article")
          .addEventListener("click", () => {location.href = projekt.link});
			liste.appendChild(klon);
		}
	})
}


function toggleDropdown() {
  document.getElementById("myDropdown").classList.toggle("show");
}
</script>
			

		
	</div><!-- #primary -->

<?php
get_footer();
