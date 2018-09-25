<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<div class="parallax" id="parallax-1" data-image-src="./assets/images/lyon.jpg" data-height="60">
    <div class="caption">
        <span class="border">Presqu'île</span>
    </div>
</div>

<div id="textAccueil">
    <h3 class="titreAccueil">DÉCOUVREZ LA PRESQU'ÎLE</h3>
    <div class = "row no-padding no-margin">
        <div class = "col-lg-3 col-md-3 col-sm-3 d-flex justify-content-center align-items-center">
            <div class="AccueilIcon" id="monument"></div>
        </div>
        <div class = "col-lg-3 col-md-3 col-sm-3 d-flex justify-content-center align-items-center">
            <div class="AccueilIcon" id="activity"></div>
        </div>
        <div class = "col-lg-3 col-md-3 col-sm-3 d-flex justify-content-center align-items-center">
            <div class="AccueilIcon" id="histoire"></div>
        </div>
        <div class = "col-lg-3 col-md-3 col-sm-3 d-flex justify-content-center align-items-center">
            <div class="AccueilIcon" id="restaurant"></div>
        </div>
    </div>    

        <div class = "row no-padding no-margin">
        <div class = "col-lg-3 col-md-3 col-sm-3 d-flex justify-content-center align-items-center">
            <div class="sousTitreAccueil">Ses Monuments</div>
        </div>
        <div class = "col-lg-3 col-md-3 col-sm-3 d-flex justify-content-center align-items-center">
            <div class="sousTitreAccueil">Ses Activités</div>
        </div>
        <div class = "col-lg-3 col-md-3 col-sm-3 d-flex justify-content-center align-items-center">
            <div class="sousTitreAccueil">Son Histoire</div>
        </div>
        <div class = "col-lg-3 col-md-3 col-sm-3 d-flex justify-content-center align-items-center">
            <div class="sousTitreAccueil">Ses Restaurants</div>
        </div>
    </div>    
</div>

<div class="row no-padding no-margin">
    <div id="mapid" data-height="60"></div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>map.js"></script>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
