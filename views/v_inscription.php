<?php require_once(PATH_VIEWS.'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<form method="post"> <!-- formulaire d'inscription -->

	<?= INPUTE_PRENOM ?> 
	<input type="text" name="prenomUser" maxlength="50" value="<?= isset($_POST['prenomUser']) ? $_POST['prenomUser'] : ''?>"></br></br>
	
	<?= INPUTE_NOM ?> 
	<input type="text" name="nomUser" maxlength="50" value="<?= isset($_POST['nomUser']) ? $_POST['nomUser'] : ''?>"></br></br>
	
	<?= INPUTE_MAIL ?> 
	<input type="email" name="mailUser" maxlength="50" value="<?= isset($_POST['mailUser']) ? $_POST['mailUser'] : ''?>"></br></br>
	
	<?= INPUTE_PWD ?>
	<input type="password" name="pwdUser" maxlength="50" value="<?= isset($_POST['pwdUser']) ? $_POST['pwdUser'] : ''?>"></br></br>
	
	<?= INPUTE_VERIF_PWD ?>
	<input type="password" name="verifpwdUser" maxlength="50" value="<?= isset($_POST['verifpwdUser']) ? $_POST['verifpwdUser'] : ''?>"></br></br>
	
	<input type="hidden" name="inscription" value="inscription">
	<input type="submit" value="<?= BUTTON_SUBMIT ?>" name="valButtonIscription">
	
</form>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
