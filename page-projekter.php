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

<div class="dropdown" id="verdensmaal-valg">
    <!-- <option value="">Vælg</option> -->
    <button onclick="toggleDropdown()" data-verdensmaal="alle">Vælg et verdensmål</button>
	<div id="myDropdown" class="dropdown-content"></div>
</div>


<section id="verdensmaal-oversigt"></section>
		</main><!-- #main -->

<template>
	<article>
		<img src="" alt="">
		<h3></h3>
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
	let filterProjekt = "alle";

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
		document.querySelector("#verdensmaal-valg").innerHTML +=`<button class="filter" data-projekt="${vm.id}">${vm.name}</button>`
	})

	addEventListenerToOptions();
}

function addEventListenerToOptions(){
	console.log("nu tilføjer vi eventlisteners til mulighederne")
	document.querySelectorAll("#verdensmaal-valg button").forEach(elm =>{elm.addEventListener("click", filtrering);
})	
// document.querySelector("#projekt-valg").addEventListener("change", filtrering)
}

// function klikFiltrering(){
// 	document.querySelector("#søg").addEventListener("click", filtrering);
// }

function toggleDropdown() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filtrering(){
	// valgt = document.querySelector("#projekt-valg option").value;
	console.log(valgt)
	filterProjekt = this.dataset.value;
	visProjekter();
}



function visProjekter(){
	console.log(projekter)
	liste.innerHTML="";
	projekter.forEach(projekt =>{
		if(filterProjekt == "alle" || projekt.verdensmaal.includes(parseInt(filterProjekt))){
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
