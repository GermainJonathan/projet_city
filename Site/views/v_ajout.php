<?php require_once(PATH_VIEWS.'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>


<div>
	<form method="post" enctype="multipart/form-data"> <!-- formulaire d'ajout de photo -->
		<p><input type="file" name="photo" value="<?php if(isset($_FILES['photo']['name'])){ echo $_FILES['photo']['tmp_name'];}?>"></p> <!-- entrée du fichier -->
		<p>
			<select name="catPhoto">
				<?php
					foreach($listCat as $temp) //choix de la catégorie 
					{
						if(!empty($_POST['catPhoto']) and $_POST['catPhoto'] == $temp['CatID'])
						{
							?>
							<option value="<?= $temp['CatID'] ?>" selected><?= $temp['nomCat'] ?></option>
							<?php
						}
						else
						{
							?>
							<option value="<?= $temp['CatID'] ?>"><?= $temp['nomCat'] ?></option>
							<?php
						}
					}
				?>
			</select>
		</p>
		<p><input type="text" name="dscPhoto" value="<?= (isset($_POST['dscPhoto'])) ? $_POST['dscPhoto'] : '' ?>"></p> <!-- entrée de la description -->
		<p><input type="submit" value="<?= BUTTON_SUBMIT ?>" name="valButtonPhoto"></p>
		<input type="hidden" name="ajout" value="ajout">
	</form>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
