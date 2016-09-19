<script type="text/javascript">
	var vitesse = 100;
	var opacity = 0;
	window.onload = fadeIn;

	function fadeIn()
	{
		opacity+= 0.1;
		document.getElementById("transition").style.opacity = opacity;
		document.getElementById("transition").style.MozOpacity = opacity;
		document.getElementById("transition").style.filter = "alpha(opacity='"  +(opacity * 100) + "')";
		if (opacity < 1)
			setTimeout("fadeIn()", vitesse);
	}
</script>
<style type="text/css">
	p {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 31px;
	}
</style>
<div class="ui inverted menu">
	<a class="active item">
		Accueil
	</a>
	<a class="item">
		Apprendre
	</a>
	<a class="item">
		Mes listes
	</a>
	<a class="item">
		Mes résultats
	</a>
</div>
<div id="transition">
	<h2 class="ui header">
		<i class="chevron circle right icon"></i>
		<div class="content">
			Qui sommes-nous ?
		</div>
	</h2>
	<div class="ui segment" align="center" vertical-align="middle">
		<div class="ui three column doubling stackable grid container">
			<div class="column">
				<img class="ui small circular image" src="/EasyLearn/site/images/ben">
				<div class="ui header">
					Benjamin COULONVAL
				</div>
			</div>
			<div class="column">
				<img class="ui small circular image" src="/EasyLearn/site/images/jul">
				<div class="ui header">
					Julien SPITALERI
				</div>
			</div>
			<div class="column">
				<p><img class="ui mini spaced image" src="/EasyLearn/site/images/school"> Nous sommes deux alternants, réalisant dans le cadre d'un projet web, ce site de e-learning.</p>
			</div>
		</div>
	</div>
	<h2 class="ui header">
		<i class="chevron circle right icon"></i>
		<div class="content">
			Comment ça marche ?
		</div>
	</h2>
	<div class="ui segment">
		<img class="ui small left floated image" src="/EasyLearn/site/images/learn">
		<p class="large text">Si vous avez besoin d'un coach pour vous épauler dans votre apprentissage, EasyLearn® est fait pour vous. Avec son programme spécial, cette plateforme en ligne va vous permettre de mémoriser facilement le vocabulaire, dates et réponses que votre esprit ne semble pas vouloir retenir malgré tous vos efforts.</p>
		<img class="ui small right floated image" src="/EasyLearn/site/images/books">
		<p>Créez vos propres listes d'apprentissage et apprenez via les nombreux types d'exercice que nous vous proposons. Vous pouvez également partager vos listes avec les autres membres du site et découvrir les leurs afin de vous enrichir d'avantage. Alors, qu'attendez-vous pour commencer ?</p>
	</div>
	<div class="ui vertical segment">
		<img class="ui centered medium image" src="/EasyLearn/site/images/cesi">
	</div>
</div>