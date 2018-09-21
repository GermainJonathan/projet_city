<?php 
require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<!--  Début de la page -->

<h1><?= TITRE_PHOTO_SELECTION ?></h1>

<!-- affichage de l'image -->
<div class="col-md-6 col-sm-6 col-xs-12">
	<img src="<?= PATH_IMAGES . $photo['nomFiche'] ?>" class="img-responsive">
</div>


<!-- affichage du tableau d'info sur l'image -->
<div class="col-md-6 col-sm-6 col-xs-12">
<table class="table table-bordered">
<tr>
	<td><?= TEXT_DESC ?></td>
	<td><?= $photo['description'] ?></td> <!--description-->
</tr>
<tr>
	<td><?= TEXT_NOM ?></td>
	<td><?= $photo['nomFiche'] ?></td> <!--nomFichier-->
</tr>
<tr>
	<td><?= TEXT_CAT ?></td>
	<td style="color: #49B47C;"> <!--nom de la catégorie de la photo -->
		<form name="accueil" action="index.php" method="post">
			<input type="hidden" name="type_photo" value="<?= $photoCatID ?>">
			<a onclick="document.accueil.submit();"><?= $photoCatName ?></a>
		</form>
	</td>
</tr>

<?php

if($photo['userID'] != null)
	{
	?>
	<tr>
		<td><?= TEXT_USER ?></td>
		<td><?= $user['prenom'] . " " . $user['nom'] ?></td>
	</tr>
<?php 
}
?>

</table>
</div>
<?php 
if(isset($_SESSION['ID'])){ //on affiche ça seulement si l'utilisateur est connecté.
	?>
	<div align="center">
		<form method="post" name="supprimer">
			<input type="submit" 
			name="supprimer" 
			value=<?php echo BUTTON_SUPPRESSION ?>
			onclick="return confirm('voulez-vous vraiment supprimer la photo ?');">
		</form>
	</div>
<?php 
} ?>


<!--  Fin de la page -->


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 