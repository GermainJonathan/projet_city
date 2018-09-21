<?php
/*
 * DS PHP
 * Vue page index - page d'accueil
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 */
//  En tête de page

require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Affichage nombre de photos -->
<pre>
<?php echo "il y a " . $nbPhotos . " photos trouvé(es)."; ?>
</pre>

<?php
	//création du formulaire (du selecteur de categorie)
	
	echo '<form method="post">';
	echo SELECT_TYPE;
	echo '<select name="type_photo">';
	echo '<option value="0">' . PHOTO_TYPE_TOUS .'</option>';
	
	//Pour chaque nom_categorie, on crée une option dans le menu déroulant
	foreach($nom_Categorie as $temp)
	{
		?>
		<option value="<?= $temp['CatID'] ?>" <?php if(!empty($_POST['type_photo']) && $_POST['type_photo'] == $temp['CatID']) echo 'selected' ?> ><?= $temp['nomCat'] ?></option>
		<?php
	}
	
	//le formulaire peut submit
	echo '<input type="submit" value="'.BUTTON_SUBMIT.'"/>';
	echo '</select>';
	echo '</form>';
	
	
?>

<!--  Début de la page -->
<h1>

<?php 

//En fonction de la catégorie choisie, on affiche un titre différent
switch($categorieID)
{
	case 0:
		echo TITRE_PAGE_ACCUEIL_TOUS;
		break;
	case 1:
		echo TITRE_PAGE_ACCUEIL_ANIMAUX;
		break;
	case 2:
		echo TITRE_PAGE_ACCUEIL_REPAS;
		break;
	case 3:
		echo TITRE_PAGE_ACCUEIL_MONUMANTS;
		break;
	default:
		echo TITRE_PAGE_ACCUEIL_TOUS;
		break;
	
}
?>
</h1>


<?php
	
	//Pour chaque résultat de la requete (récuperer les images dans la bdd) on crée l'image correspondante, avec un href 
	//qui redéfinit l'adresse pour accéder à sa page de description
	// foreach($res as $r)
	// {
	?>
	<!-- // 	<div class="col-md-2 col-sm-4 col-xs-8">
	// 		<a href="index.php?page=photo&photoID=<?= $r['photoID'] ?>"><img src = "<?= PATH_IMAGES . $r['nomFiche'] ?>" alt = "<?= $r['description'] ?>" class="img-responsive"></a>
	// 	</div>
	<?php
	// }
?>


<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
