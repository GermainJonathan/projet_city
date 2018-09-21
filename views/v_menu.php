<!-- Menu du site -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
				<li <?php echo ($page=='accueil' ? 'class="active"':'')?>>
					<a href="index.php">
						<?= MENU_ACCUEIL ?>
					</a>
				</li>
				<?php
				if(isset($_SESSION['ID'])) //si une session est déclarée, on affiche l'option d'ajout de photo au menu
				{
					?>
					<li <?= ($page == 'ajout') ? 'class="active"' : '' ?>>
						<form name="ajout" action="index.php" method="post">
							<input type="hidden" name="ajout" value="ajout">
						</form>
						<a onclick="document.ajout.submit();"><?= AJOUT_PHOTO  ?></a>
					<li>
					<?php
				}
				?>
	</ul>
	
	<ul class="nav navbar-nav navbar-right">
	
				<li <?= ($page == 'connexion') ? 'class="active"' : '' ?>>
					<form name="connexion" action="index.php" method="post"> <!-- formulaire connexion -->
						<input type="hidden" name="connexion" value="<?= (empty($_SESSION['ID'])) ? "connexion" : "deconnexion" ?>"> <!-- si aucune session n'est ouverte, on affiche connexion. sinon, on affiche deconnexion. -->
					</form>
					<a onclick="document.connexion.submit();"><?= (empty($_SESSION['ID'])) ? MENU_CONNEXION : MENU_DECONNEXION?></a>
				</li>
				
				<?php if(empty($_SESSION)) //si aucune session n'est déclarée
				{
					?>
					<li <?= ($page == 'inscription') ? 'class="active"' : '' ?>>
						<form name="inscription" action="index.php" method="post">
							<input type="hidden" name="inscription" value="inscription">
						</form>
						<a onclick="document.inscription.submit();"><?= MENU_INSCRIPTION ?></a>
					<li>
				<?php
				}
				else //si une session est déclarée
				{
					?>
					<li <?= ($page == 'user') ? 'class="active"' : '' ?>>
						<form name="user" action="index.php" method="post">
							<input type="hidden" name="user" value="user">
						</form>
						<a onclick="document.user.submit();"><?= $_SESSION['prenom'] . " " .$_SESSION['nom']  ?></a>
					<li>
				<?php } ?>
				
    </ul>
  </div>
</nav>