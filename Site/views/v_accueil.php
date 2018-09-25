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
    <div class = "col-lg-12">
        <h3>DÉCOUVREZ LA PRESQU'ÎLE</h3>
    </div>
    <div class = "row no-padding no-margin">
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img class="AccueilIcon" src="./Assets/images/monument.svg"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <div class="sousTitreAccueil">Ses Monuments</div> 
            </div>  
        </div>
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img src="./Assets/images/activity.svg" class="AccueilIcon"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <div class="sousTitreAccueil">Ses Activités</div> 
            </div>  
        </div>
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img class="AccueilIcon" src="./Assets/images/histoire.svg"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <div class="sousTitreAccueil">Son Histoire</div> 
            </div>  
        </div>
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img class="AccueilIcon" src="./Assets/images/restaurant.svg"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <div class="sousTitreAccueil">Ses Restaurants</div> 
            </div>
        </div>
    </div>    
</div>

<div class="row no-padding no-margin">
    <div id="mapid" data-height="60"></div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>map.js"></script>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
