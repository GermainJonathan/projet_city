<?php

require_once(PATH_MODELS."PhotoDAO.php");
require_once(PATH_MODELS."CategorieDAO.php");
require_once(PATH_MODELS."ConnexionDAO.php");

$catDAO = new CategorieDAO(DEBUG);

$photoDAO = new PhotoDAO(DEBUG);

$coDAO = new ConnexionDAO(DEBUG);

$listCat = $catDAO -> getCategories();
if(isset($_POST['valButtonPhoto'])) //si on a cliqué sur le bouton d'ajout de photo
{
	$testErreur = checkVarAjoutPhoto(); //on vérifie la validité du fichier

	if($testErreur)
	{
		$alert['messageAlert'] = $testErreur;
	}
	else
	{
		$dossier = 'assets/images/'; //dossier local
		
		$newPhotoID = $photoDAO -> getMaxPhotoID(); //definition de l'id de photo
		$newPhotoID = $newPhotoID['max'] + 1;
		
		$newNom = 'DSC'; //création du nouveau nom de photo
		
		$newNom .= ($newPhotoID < 10000) ? '0' : '';
		$newNom .= ($newPhotoID < 1000) ? '0' : '';
		$newNom .= ($newPhotoID < 100) ? '0' : '';
		$newNom .= ($newPhotoID < 10) ? '0' : '';
		
		$newNom = $newNom . $newPhotoID . strrchr($_FILES['photo']['name'], '.'); //nouveau nom = nom + idPhoto + extension du fichier uploadé
		
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $newNom)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné
		{
			$alert['messageAlert'] = INFO_UPLOAD_SUCSESS; //Upload effectué avec succès !
			$alert['classAlert'] = 'success';
			
			$coDAO -> incremntNbPhoto($_SESSION['ID']);
			
			$photoDAO -> ajoutPhoto($newPhotoID, $newNom, htmlspecialchars($_POST['dscPhoto']), $_POST['catPhoto'], $_SESSION['ID']);
			
			echo '<form name="ajout" method="post" action="index.php?page=photo&photoID=' . $newPhotoID . '">';
			echo '<input type="hidden" name="newphoto" value="newphoto">';
			echo '</form>';
			
			echo '<script> document.ajout.submit(); </script>';
		}
		else //Sinon la fonction renvoie FALSE
		{
			$alert['messageAlert'] = INFO_UPLOAD_FAIL;
		}
	}
}
require_once(PATH_VIEWS.'ajout.php');