<?php

require_once(PATH_MODELS.'PhotoDAO.php');
require_once(PATH_MODELS.'CategorieDAO.php');

//Si le formulaire est rempli, on récupère le type de photo souhaité
if(!empty($_POST['type_photo']))
	$categorieID = $_POST['type_photo'];
else
	$categorieID = 0; //sinon, la catégorie est mise à 0 par défaut


//instancation de PhotoDAO
$photoDAO = new PhotoDAO(DEBUG);


//appel via PhotoDAO de la méthode getPhotosIds. On note que cette fonction, si la catégorie est '0', retourne toutes les lignes de la table photo
if($res = $photoDAO->getPhotosIds($categorieID))
	$res = $photoDAO->getPhotosIds($categorieID);
else
	//$alert = choixAlert('query'); //si la catégorie est invalide, on retourne une erreur


$nbPhotos = count($res);


//On récupère la liste des catégories
$CategorieDAO = new CategorieDAO(DEBUG);
$nom_Categorie = $CategorieDAO->getCategories();



require_once(PATH_VIEWS.'accueil.php');



