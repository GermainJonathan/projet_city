<?php

require_once(PATH_MODELS.'ConnexionDAO.php');

$alert['messageAlert'] = $_SESSION['prenom'] . " " . $_SESSION['nom'] . INFO_CHANGE_PWD;
$alert['classAlert'] = 'info';


if(isset($_POST['valchangepwd'])) //si on est entré dans la modification de mot de passe par le formulaire
{
	$connexion = new ConnexionDAO(DEBUG);
	$testErreur = checkVarChangepwd();
	if($testErreur)
	{
		$alert['messageAlert'] = $testErreur;
		$alert['classAlert'] = 'danger';
	}
	else
	{
		$connexion -> changepwd($_SESSION['ID'], $_POST['newpwd']); //on change le mdp de la connexion
		
		echo '<form name="modif" method="post">';
		echo '<input type="hidden" name="pwdChanged" value="pwdChanged">';
		echo '</form>';
		
		echo '<script> document.modif.submit(); </script>';
	}
}
require_once(PATH_VIEWS.'changepwd.php');