<?php

// Initialisation des paramètres du site
require_once('./config/configuration.php');
require_once('./lib/foncBase.php');
require_once(PATH_TEXTES.LANG.'.php');

session_name("p1605237");
session_start();


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

if(!empty($_POST['connexion'])) //si le post 'connexion' n'est pas vide ; autrement dit, si on a cliqué sur connexion dans le menu
{
	if($_POST['connexion'] == 'connexion')
		$page = $_POST['connexion']; //on passe à la page connexion
	else
	{
		$page = 'accueil'; //sinon on retourne à la page accueil
		$alert['messageAlert'] = INFO_DECONNEXION;
		$alert['classAlert'] = 'success';
		
		$_SESSION = array();
		
		session_destroy(); //et on détruit la session 
	}
}


//détection standard des pages restantes
if(!empty($_POST['inscription']))
	$page = $_POST['inscription'];

if(!empty($_POST['user']))
	$page = $_POST['user'];

if(!empty($_POST['ajout']))
	$page = $_POST['ajout'];

if(!empty($_POST['changepwd']))
	$page = $_POST['changepwd'];


if(isset($_SESSION['inscription'])) //si c'est une session d'inscription
{
	$alert['messageAlert'] = INFO_INSCRIPTION;
	$alert['classAlert'] = 'success';
	
	unset($_SESSION['inscription']);
}

if(isset($_POST['pwdChanged'])) 
{
	$alert['messageAlert'] = INFO_CHANGED_PWD;
	$alert['classAlert'] = 'success';
}

if(isset($_SESSION['connexion'])) //si c'est une session de connexion
{
	$alert['messageAlert'] = INFO_CONNEXION . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " !!";
	$alert['classAlert'] = 'success';
	
	unset($_SESSION['connexion']);
}

//appel du controller
require_once(PATH_CONTROLLERS.$page.'.php'); 

?>
