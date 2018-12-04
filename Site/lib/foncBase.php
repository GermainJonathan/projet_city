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

// fonction qui récupère le langage de la page
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

// Récupère l'action valider du forum suivant l'état
function getActionValidByEtat($etat){
    switch ($etat) {
        // Etat en attente: le topic peut être valider
        case 1:
            return array("action" => TXT_VALIDER, "codeAction" => 2);
            // Etat valider: le topic peut être résolu
        case 2:
            return array("action" => TXT_RESOLUE, "codeAction" => 4);
            // Etat annuler: le topic peut être valider
        case 3:
            return array("action" => TXT_VALIDER, "codeAction" => 2);
            // Etat résolue: le topic ne peut rien faire comme action valid
        case 4:
            return array("action" => TXT_RESOLUE, "codeAction" => 0);
            // Etat refuser: le topic peut être valider 
        case 5:
            return array("action" => TXT_VALIDER, "codeAction" => 2);
        default:
            return false;
    }
}

// Récupère l'action refuser du forum suivant l'état
function getActionRefuseByEtat($etat){
    switch ($etat) {

        // Etat en attente: le topic peut être refuser
        case 1:
            return array("action" => TXT_REFUSER, "codeAction" => 5);
        // Etat valider: le topic peut etre annuler
        case 2:
            return array("action" => TXT_ANNULER, "codeAction" => 3);
        // Etat annuler : le topic peut être refuser
        case 3:
            return array("action" => TXT_REFUSER, "codeAction" => 5);
        // Etat résolu: le topic peut être annuler
        case 4:
            return array("action" => TXT_ANNULER, "codeAction" => 3);
            // Etat refuser le topic ne peut rien faire en action refuse
        case 5:
            return array("action" => TXT_REFUSER, "codeAction" => 0); 
        default:
            return false;
    }
}

function makeMessage($message, $nom, $prenom, $mail){
    $message .= "\r\n";
    $message .= "\r\n";
    $message .= $nom . " " . $prenom;
    $message .= "\r\n";
    $message .= $mail;
    $message .= "\r\n";
    return $message;
}


/**
 * @param $arrayToConvert
 * @return array[x, y]
 */
function convertCoordonees($arrayToConvert) {
    preg_match("/\d*.\d* \d*.\d*/", $arrayToConvert, $chaine);
    $chaine[0] = explode(' ', $chaine[0]);
    return array('x' => floatval($chaine[0][0]), 'y' => floatval($chaine[0][1]));
}

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}