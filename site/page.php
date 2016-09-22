<?php
require_once ("include/autoload.php");
include (APP_PATH."/include/header.php");
?>
<div class="ui stackable grid">
	<?php /* menu verticale */?>
	<div class="three wide column">
		<div class="ui vertical fluid tabular menu" id="vertMenu">
			<a class="ui header active item" data-tab="accueil">
				Accueil
			</a>
			<a class="ui header item" data-tab="apprendre">
				Apprendre
			</a>
			<a class="ui header item" data-tab="listes">
				Mes listes
			</a>
			<a class="ui header item" data-tab="results">
				Mes résultats
			</a>
		</div>
	</div>
	<div class="thirteen wide stretched column" id="page">
		<?php /* page au contenu dymanique */
		include(APP_PATH."/accueil.php");
		include (APP_PATH."/apprendre.php");
		include (APP_PATH."/listes.php");
		include (APP_PATH."/results.php");
		?>
	</div>
	<div class="centered row">
		<div class="ui vertical segment">
			<img class="ui centered medium image" src="/EasyLearn/site/images/cesi.png">
		</div>
	</div>
</div>

