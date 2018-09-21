<?php require_once(PATH_VIEWS.'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<form method="post"> <!-- formulaire de connexion -->

	<?= INPUTE_MAIL ?> 
	<input type="text" name="mailUser" maxlength="50" value="<?= isset($_POST['mailUser']) ? $_POST['mailUser'] : ''?>"></br></br>
	
	<?= INPUTE_PWD ?>
	<input type="password" name="pwdUser" maxlength="50" value="<?= isset($_POST['pwdUser']) ? $_POST['pwdUser'] : ''?>"></br></br>
	
	<input type="hidden" name="connexion" value="connexion">
	
	<input type="submit" value="<?= BUTTON_SUBMIT ?>" name="valButtonConnexion">
	
</form>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
