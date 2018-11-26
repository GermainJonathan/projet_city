<?php

//retourne l'alerte correcte
function choixAlert($message)
{
  $alert = array();
  switch($message)
  {
    case 'connexion':
      $alert['messageAlert'] = ERREUR_CONNECT_BDD;
      break;
    case 'login' :
      $alert['messageAlert'] = ERREUR_INSCRIPTION;
      break;
    case 'query' :
      $alert['messageAlert'] = ERREUR_QUERY_BDD;
      break;
    case 'url_non_valide' :
      $alert['messageAlert'] = TEXTE_PAGE_404;
      break;
    default :
      $alert['messageAlert'] = MESSAGE_ERREUR;
  }
  return $alert;
}

function dateSiteToBase($dateSite){
    $tdate = explode("/", $dateSite);
    $dateBase = date($tdate[2]."-".$tdate[1]."-".$tdate[0]);
    return $dateBase;
}

function dateBaseToSite($dateBase){
    $tdate = explode("-", $dateBase);
    $dateSite = date($tdate[2]."/".$tdate[1]."/".$tdate[0]);
    return $dateSite;
}

//fonction qui vérifie la validité du fichier photo uploadé. retourne l'erreur adaptée au problème potentiel.
function checkVarAjoutPhoto()
{
	if(empty($_POST['dscPhoto']))
		return  $erreur = ERREUR_FILE_DSC;
	
	if(empty($_FILES['photo']['name']))
		return $erreur = ERREUR_FILE_NULL;
	
	//On fait un tableau contenant les extensions autorisées.
	$extensions = array('.png', '.jpg', '.jpeg', '.gif');
	// récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
	$extension = strrchr($_FILES['photo']['name'], '.');
	//Ensuite on teste
	if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		return ERREUR_FILE_EXTENSION;
	}
	else
	{
		// taille maximum (en octets)
		$taille_maxi = 100000;
		//Taille du fichier
		$taille = filesize($_FILES['photo']['tmp_name']);
		if($taille > $taille_maxi)
			return ERREUR_FILE_TAIL;
	}
}

function getLangage(){

    require_once PATH_MODELS.'manager.php';

    $lang = explode('-',$_SERVER['HTTP_ACCEPT_LANGUAGE'])[0];

    $manager = new manager();
    $listPays = $manager->getPays();

    foreach ($listPays as $pays){
        if($pays->getLibelleCourt() == $lang) {
            $_SESSION["lang"] = $pays->getFicher();
            $_SESSION["idLang"] = $pays->getId();
            return $pays->getFicher();
        }
    }
    $_SESSION["idLang"] = 1;
    return "FR-fr";
}

function getActionValidByEtat($etat){
    switch ($etat) {

        case 1:
            Return array("action" => TXT_VALIDER, "codeAction" => 2);
        case 2:
            return array("action" => TXT_RESOLUE, "codeAction" => 1);
        case 3:
            return array("action" => TXT_VALIDER, "codeAction" => 3);
        default:
            return false;
    }
}

function getActionRefuseByEtat($etat){
    switch ($etat) {

        case 1:
            Return array("action" => TXT_REFUSER, "codeAction" => 1);
        case 2:
            return array("action" => TXT_ANNULER, "codeAction" => 2);
        case 3:
            return array("action" => TXT_SUPPRIMER, "codeAction" => 3);
        default:
            return false;
    }
}

function makeMessage($message, $nom, $prenom, $mail){
    return 'salut !!';
}