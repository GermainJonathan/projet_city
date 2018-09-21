<?php require_once(PATH_VIEWS.'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>
<div>

	<!-- afichage des informations sur l'utilisateur -->
	<p><?= INPUTE_NOM . $utilisateur['nom'] ?></p>
	<p><?= INPUTE_PRENOM . $utilisateur['prenom'] ?></p>
	<p><?= INPUTE_MAIL . $utilisateur['mail'] ?></p>
	<p><?= INPUTE_NB_PHOTO . $utilisateur['nbphotoupload'] ?></p>
	<p>
		<?= INPUTE_CHANGE_PWD ?>
		<form method="post">
			<input type="hidden" name="changepwd" value="changepwd">
			<input type="submit" name="valChangepwd" value="<?= CHANGER ?>">
		</form>
	</p>
</div>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
