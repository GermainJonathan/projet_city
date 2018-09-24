<?php

//  En tête de page

require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>
<div class="parallax-window" data-parallax="scroll" data-image-src="./assets/images/lyon.jpg" style="min-height: 600px;background: transparent;"></div>
<div class="row no-padding">
    <div id="mapid"></div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>map.js"></script>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
