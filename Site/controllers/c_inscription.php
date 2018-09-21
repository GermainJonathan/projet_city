<?php

require_once(PATH_MODELS.'ConnexionDAO.php');

if(!empty($_POST['valButtonIscription'])) //si le  bouton d'inscription a été cliqué
{
	$testErreur = checkVarInscription(); //in vérifie la validité des infos
	if($testErreur)
	{
		$alert['messageAlert'] = $testErreur;
	}
	else
	{
		$connexionDAO = new ConnexionDAO(DEBUG);
		$IDUser = $connexionDAO -> newInscription($_POST['nomUser'], $_POST['prenomUser'], $_POST['mailUser'], $_POST['pwdUser']); //appel à la méthode newInscription pour ajouter un utilisateur
		
		$_SESSION['nom'] = $_POST['nomUser'];
		$_SESSION['prenom'] = $_POST['prenomUser'];
		$_SESSION['ID'] = $IDUser;
		$_SESSION['inscription'] = true;
		
		header("Location: index.php");
	}
}

require_once(PATH_VIEWS.'inscription.php');