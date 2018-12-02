<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');

// Spinner au chargement de la page
require_once(PATH_VIEWS.'spinner.php');?>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>quartier.js"></script>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>perracheEnv.js"></script>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>cardMapFactory.js"></script>
<script type="text/javascript">var idQuartier = 1;</script>
<!-- TODO: FAIRE UNE VUE SIDEBAR -->
<!-- SideBar Page -->
<?php require_once(PATH_VIEWS.'sidebar.php');?>
<div class="container-fluid">
    <!--  Les catégories  -->
    <div class="bodyQuartier col-lg-10 offset-lg-2 col-md-10 offset-md-2 col-sm-12">
        <!-- Composant histoire -->
        <?php 
            require_once(PATH_VIEWS.'histoire.php');
            require_once(PATH_VIEWS.'monument.php'); 
            require_once(PATH_VIEWS.'activite.php');
            require_once(PATH_VIEWS.'restaurant.php'); 
            require_once(PATH_VIEWS.'commentaire.php');  
        ?>
    </div>
</div>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');