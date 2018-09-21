<?php

require_once(PATH_MODELS.'PhotoDAO.php');
require_once(PATH_MODELS.'ConnexionDAO.php');


//instanciation de PhotoDAO
$photoDAO = new PhotoDAO(DEBUG);
//grace à l'instance de photoDAO, on appelle la méthode getPhotoByID. On a donc plus d'infos sur la photo
$photo = $photoDAO -> getPhotoByID($photoID);
$nomFichier=$photo['nomFiche'];
$photoCatID = $photo['catID'];

if($photo['userID'] != null)
{
	$connexion = new ConnexionDAO(DEBUG);
	$user = $connexion -> getInformationsConnexion($photo['userID']);
}

//grace à l'instance de photoDAO, on appelle la méthode getCatByPhoto. On a donc la catégorie de la photo
$photoCatName = $photoDAO -> getCatByPhoto($photo['catID']);
$photoCatName = $photoCatName['nomCat'];


//grace à l'instance de photoDAO, on appelle la méthode getMaxPhotoID. On a donc l'ID maximum des photos
$maxPhotoID = $photoDAO -> getMaxPhotoID();
$maxPhotoID = $maxPhotoID['max'];

//Si l'id de photo dans l'addresse est plus élevé que le max, on redirige l'utilisateur vers une page 404 en l'envoyant
//à une adresse volontairement incorrecte
if($photoID > $maxPhotoID)
{
	header("Location: index.php?page=photo&photoID=-1");
}

if(isset($_POST['newphoto']))
{
	$alert['messageAlert'] = INFO_UPLOAD_SUCSESS;
	$alert['classAlert'] = 'success';
}

if(isset($_SESSION['ID'])){ //si il y a une connexion
	if(isset($_POST['supprimer'])){ //si on a cliqué sur supprimer
		$photo = $photoDAO -> getPhotoByID($photoID);
		unlink("assets/images/".$nomFichier);
		$photoDAO -> supprimerPhoto($photo['photoID']);
		require_once(PATH_CONTROLLERS.'accueil.php');
	}else{
		require_once(PATH_VIEWS.'photo.php');
	}
}else{
	require_once(PATH_VIEWS.'photo.php');
}
	

