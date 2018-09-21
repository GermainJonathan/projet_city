<?php

require_once(PATH_MODELS.'ConnexionDAO.php');

if(!empty($_POST['valButtonConnexion'])) //si on a cliqué sur le bouton de connexion
{	
	$testConexion = checkVarConnexion();
	if(is_numeric($testConexion)) //Si la validité des infos est établie
	{
		$connexionDAO = new ConnexionDAO(DEBUG); //on instancie une connexion
		
		$user = $connexionDAO -> getInformationsConnexion($testConexion); //et on définit les variables de session
		$_SESSION['ID'] = $user['userID'];
		$_SESSION['nom'] = $user['nom'];
		$_SESSION['prenom'] = $user['prenom'];
		$_SESSION['connexion'] = true;
		
		$testConexionErreur = false;
		header("Location: index.php");
	}
	else
	{
		$testConexionErreur = true;
		$alert['messageAlert'] = $testConexion;
	}
}

require_once(PATH_VIEWS.'connexion.php');