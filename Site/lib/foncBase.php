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