<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

//spinner
require_once(PATH_VIEWS.'spinner.php');
// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<div class="parallax" id="parallax-1" data-height="60" data-image-src="<?= PATH_ACCUEIL.'lyon.jpg' ?>">
    <div class="caption">
        <span class="border"><?= TITRE ?></span>
    </div>
</div>

<div id="textAccueil">
    <div class = "col-lg-12">
        <h3><?= TITRE_PAGE_ACCUEIL ?></h3>
    </div>
    <div class = "row no-padding no-margin">
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img class="AccueilIcon" src="<?= PATH_CORE.'monument.svg' ?>"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <span class="sousTitreAccueil"><?= TITRE_MONUMENT ?></span>
            </div>  
        </div>
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img src="<?= PATH_CORE.'activity.svg' ?>" class="AccueilIcon"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <span class="sousTitreAccueil"><?= TITRE_ACTIVITE ?></span>
            </div>  
        </div>
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img class="AccueilIcon" src="<?= PATH_CORE.'histoire.svg' ?>"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <span class="sousTitreAccueil"><?= TITRE_HISTOIRE ?></span>
            </div>  
        </div>
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img class="AccueilIcon" src="<?= PATH_CORE.'restaurant.svg' ?>"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <span class="sousTitreAccueil"><?= TITRE_RESTAURANT ?></span>
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
