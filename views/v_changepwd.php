	<?php require_once(PATH_VIEWS.'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>
<div>

	<form method="post"> <!-- formulaire du changement de mdp -->
		<p>
			<?= INPUTE_OLD_PWD ?>
			<input type="password" name="oldpwd">
		</p>
		<p>
			<?= INPUTE_NEW_PWD ?>
			<input type="password" name="newpwd">
		</p>
		<p>
			<?= INPUTE_VERIF_NEW_PWD ?>
			<input type="password" name="verifnewpwd">
		</p>
		<input type="hidden" name="changepwd" value="changepwd">
		<p>
			<input type="submit" name="valchangepwd" value="<?= BUTTON_SUBMIT ?>">
		</p>
	</form>
</div>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
