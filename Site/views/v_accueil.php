<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<!-- parallax -->
<div class="parallax" data-height="60" data-image-src="<?= PATH_ACCUEIL.'lyon.jpg' ?>">
    <div class="caption">
        <span class="border"><?= TITRE ?></span>
    </div>
</div>

<!--  Bandeau texte de la page d'accuel   -->

<div id="textAccueil">
    <div class = "col-lg-12">
        <h3><?= TITRE_PAGE_ACCUEIL ?></h3>
    </div>

    <!--  Image et titre monuments  -->
    <div class = "row no-padding no-margin">
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img class="AccueilIcon" src="<?= PATH_CORE.'monument.svg' ?>"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <span class="sousTitreAccueil"><?= TITRE_MONUMENT ?></span>
            </div>  
        </div>

        <!--  Image et titre activités  -->
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img src="<?= PATH_CORE.'activity.svg' ?>" class="AccueilIcon"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <span class="sousTitreAccueil"><?= TITRE_ACTIVITE ?></span>
            </div>  
        </div>

        <!--  Image et titre histoire  -->
        <div class = "col-lg-3 col-md-6 col-sm-6">
            <div class = "col-lg-12 d-flex justify-content-center">
                <a href="#mapid"><img class="AccueilIcon" src="<?= PATH_CORE.'histoire.svg' ?>"/></a>
            </div> 
            <div class = "col-lg-12 d-flex justify-content-center">
                <span class="sousTitreAccueil"><?= TITRE_HISTOIRE ?></span>
            </div>  
        </div>

        <!--  Image et titre restaurants  -->
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

<!--  Carte  -->
<div class="row no-padding no-margin">
    <div id="mapid" data-height="60"></div>
</div>

<!--  Script pour la carte  -->
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>cardMapFactory.js"></script>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>map.js"></script>

<!--  Pied de page  -->
<?php require_once(PATH_VIEWS.'footer.php');
