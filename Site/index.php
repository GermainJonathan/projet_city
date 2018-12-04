<?php

// Initialisation des paramètres du site
require_once './config/configuration.php';
require_once PATH_LIB.'foncBase.php';

require_once PATH_MODELS.'user.php';
require_once PATH_MODELS.'paysDAO.php';

//selection de la langue
session_start();

if(empty($_GET["lang"])) {
    if (isset($_SESSION["lang"]) && !empty($_SESSION["lang"]))
        $lang = $_SESSION["lang"];
    else
        $lang = getLangage();
}
else {
    $lang = setLangageById($_GET["lang"]);
}

require_once PATH_TEXTES.$lang.'.php';

//vérification de la page demandée
if(isset($_GET['page']))
{
  $page = htmlspecialchars($_GET['page']);
  if(!is_file(PATH_CONTROLLERS . htmlspecialchars($_GET['page']) . ".php"))
  { 
    $page = '404'; //page demandée inexistante
  }
}
else {
	header('Location: ?page=accueil');
	$page='accueil'; //page d'accueil du site - http://.../index.php
}

$paysDAO = new paysDAO(DEBUG);

$listPays = $paysDAO->getPays();

//appel du controller
require_once(PATH_CONTROLLERS.$page.'.php');