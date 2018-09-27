<?php

// Initialisation des paramètres du site
require_once './config/configuration.php';
require_once './lib/foncBase.php';

//selection de la langue
session_start();
if(isset($_SESSION["lang"]))
    $lang = $_SESSION["lang"];
else
    $lang = getLangage();
require_once(PATH_TEXTES.$lang.'.php');

//vérification de la page demandée
if(isset($_GET['page']))
{
  $page = htmlspecialchars($_GET['page']); // http://.../index.php?page=toto
  if(!is_file(PATH_CONTROLLERS . htmlspecialchars($_GET['page']) . ".php"))
  { 
    $page = '404'; //page demandée inexistante
  }
}
else {
	header('Location: ?page=accueil');
	$page='accueil'; //page d'accueil du site - http://.../index.php
}

//appel du controller
require_once(PATH_CONTROLLERS.$page.'.php');