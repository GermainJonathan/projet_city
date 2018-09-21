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

//fonction qui vérifie le mot de passe.
function checkVarConnexion()
{
	if(empty($_POST['mailUser']))
	{
		$erreur = ERREUR_NOM_NULL;
		return $erreur;
	}
	
	if(empty($_POST['pwdUser']))
	{
		$erreur = ERREUR_PWD_NULL;
		return $erreur;
	}
	
	if(!filter_var($_POST['mailUser'], FILTER_VALIDATE_EMAIL))
	{
		$erreur = ERREUR_MAIL_FORM;
		return $erreur;
	}
	
	if(strlen($_POST['mailUser']) < 10 || strlen($_POST['mailUser']) > 50)
	{
		$erreur = ERREUR_NOM_TAILLE;
		return $erreur;
	}
	
	if(!ctype_alnum($_POST['pwdUser']))
	{
		$erreur = ERREUR_PWD_FORM;
	}
	
	if(strlen($_POST['pwdUser']) < 10 || strlen($_POST['pwdUser'] > 50))
	{
		$erreur = ERREUR_PWD_TAILLE;
		return $erreur;
	}
	
	$connexionDAO = new ConnexionDAO(DEBUG);
	
	$checkConnexion = $connexionDAO -> checkIndentification($_POST['mailUser'], $_POST['pwdUser']);
	if(isset($checkConnexion) && $checkConnexion != -1)
		return $checkConnexion;
	$erreur = ERREUR_NOM_PWD;
	return $erreur;
}

//fonction qui vérifie la validité de l'identifiant.
function checkVarInscription()
{
	if(empty($_POST['nomUser']))
		return $erreur = ERREUR_NOM_NULL;
		
	if(empty($_POST['prenomUser']))
		$erreur = ERREUR_PRENOM_NULL;
		
	if(empty($_POST['mailUser']))
		return $erreur = ERREUR_MAIL_NULL;
		
	if(empty($_POST['pwdUser']))
		return $erreur = ERREUR_PWD_NULL;
		
	if(empty($_POST['verifpwdUser']))
		return $erreur = ERREUR_VERIF_PWD_NULL;
		
	if(!filter_var($_POST['mailUser'], FILTER_VALIDATE_EMAIL))
		return $erreur = ERREUR_MAIL_FORM;
	
	if(!ctype_alpha($_POST['nomUser']))
		return $erreur = ERREUR_NOM_FORM;
		
	if(strlen($_POST['nomUser']) < 3 || strlen($_POST['nomUser']) > 50)
		return $erreur = ERREUR_NOM_TAILLE;
		
	if(strlen($_POST['prenomUser']) < 3 || strlen($_POST['prenomUser']) > 50)
		return $erreur = ERREUR_PRENOM_TAILLE;
		
	if(strlen($_POST['mailUser']) < 10 || strlen($_POST['mailUser']) > 50)
		return $erreur = ERREUR_MAIL_TAILLE;
		
	
	if(!ctype_alnum($_POST['pwdUser']))
		return$erreur = ERREUR_PWD_FORM;
	
	if(strlen($_POST['pwdUser']) < 10 || strlen($_POST['pwdUser'] > 50))
		return $erreur = ERREUR_PWD_TAILLE;
		
	if($_POST['pwdUser'] != $_POST['verifpwdUser'])
		return $erreur = ERREUR_PWD_FAUX;
		
	
	$connexionDAO = new ConnexionDAO(DEBUG);
	
	$checkConnexion = $connexionDAO -> checkMailExistant($_POST['mailUser']);
	
	if(!$checkConnexion)
	{
		$erreur = ERREUR_MAIL_DEJA_EXISTANT;
		return $erreur;
	}
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


//fonction qui vérifie le mot de passe pour le changement de mot de passe.
function checkVarChangepwd()
{
	if(empty($_POST['oldpwd']))
		return ERREUR_OLD_PWD;
	
	if(empty($_POST['newpwd']))
		return ERREUR_NEW_PWD;
	
	if(!ctype_alnum($_POST['newpwd']))
		return$erreur = ERREUR_PWD_FORM;
	
	if(empty($_POST['verifnewpwd']))
		return ERREUR_VERIF_NEW_PWD;
	
	if(strlen($_POST['newpwd']) < 10 || strlen($_POST['newpwd'] > 50))
		return $erreur = ERREUR_PWD_TAILLE;
	
	if($_POST['verifnewpwd'] != $_POST['newpwd'])
		return ERREUR_PWD_FAUX;
	
	$connexion = new ConnexionDAO(DEBUG);
	
	if(!$connexion -> verifpwd($_SESSION['ID'], $_POST['oldpwd']))
		return ERREUR_OLD_PWD_FAUX;
	return false;
}