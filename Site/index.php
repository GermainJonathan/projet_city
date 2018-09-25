<?php

// Initialisation des paramètres du site
require_once('./config/configuration.php');
require_once('./lib/foncBase.php');
require_once(PATH_TEXTES.LANG.'.php');


//vérification de la page demandée 

if(isset($_GET['page']))
{
  $page = htmlspecialchars($_GET['page']); // http://.../index.php?page=toto
  if(!is_file(PATH_CONTROLLERS . htmlspecialchars($_GET['page']) . ".php"))
  { 
    $page = '404'; //page demandée inexistante
  }
}
else
	$page='accueil'; //page d'accueil du site - http://.../index.php


//si l'adresse précise que l'on va sur la page photo
if($page == "photo" && isset($_GET['photoID']))
{
	$photoID = (int)htmlspecialchars($_GET['photoID']); //On récupère dans la meme adresse l'ID de photo. 
	if(isset($photoID) && is_numeric($photoID) && $photoID>0)
		$photoID = htmlspecialchars($_GET['photoID']);
	else //s'il n'est pas valable, on appelle la page 404
		$page = '404';
}

//appel du controller
require_once(PATH_CONTROLLERS.$page.'.php');