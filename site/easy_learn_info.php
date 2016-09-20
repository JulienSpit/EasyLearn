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
		font-size: 25px;
	}
</style>

<div class="ui grid">
	<div class="three wide column">
		<div class="ui vertical fluid tabular menu">
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
	</div>
	<div class="thirteen wide stretched column">
		<div id="transition">
			<h1 class="ui header">
				<i class="chevron circle right icon"></i>
				<div class="content">
					Qui sommes-nous ?
				</div>
			</h1>
			<div class="ui segment" align="center">
				<div class="ui three column doubling stackable grid container">
					<div class="column">
						<img class="ui small circular image" src="site/images/ben.jpg">
						<div class="ui header">
							Benjamin COULONVAL
						</div>
					</div>
					<div class="column">
						<img class="ui small circular image" src="site/images/jul.jpeg">
						<div class="ui header">
							Julien SPITALERI
						</div>
					</div>
					<div class="column">
						<p><img class="ui mini spaced image" src="site/images/school.png"> Nous sommes deux alternants, réalisant dans le cadre d'un projet web, ce site de e-learning.</p>
					</div>
				</div>
			</div></br>
			<h1 class="ui header">
				<i class="chevron circle right icon"></i>
				<div class="content">
					Comment ça marche ?
				</div>
			</h1>
			<div class="ui segment">
				<img class="ui small left floated image" src="site/images/learn.jpg">
				<p class="large text">Si vous avez besoin d'un coach pour vous épauler dans votre apprentissage, EasyLearn® est fait pour vous. Avec son programme spécial, cette plateforme en ligne va vous permettre de mémoriser facilement le vocabulaire, dates et réponses que votre esprit ne semble pas vouloir retenir malgré tous vos efforts.</p>
				<img class="ui small right floated image" src="site/images/books.png">
				<p>Créez vos propres listes d'apprentissage et apprenez via les nombreux types d'exercice que nous vous proposons. Vous pouvez également partager vos listes avec les autres membres du site et découvrir les leurs afin de vous enrichir d'avantage. Alors, qu'attendez-vous pour commencer ?</p></br>
			</div>
			<div class="ui vertical segment">
				<img class="ui centered medium image" src="site/images/cesi.png">
			</div>
		</div>
	</div>
</div>