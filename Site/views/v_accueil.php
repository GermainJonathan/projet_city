<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>

<!-- parallax -->
<div class="parallax" data-height="60" data-image-src="<?= PATH_ACCUEIL.'lyon.jpg' ?>">
    <h1 class="textParralax"><?= TITRE ?></h1>
</div>

<!--  Bandeau texte de la page d'accuel   -->

<div id="textAccueil">
    <div class="col-lg-12" id="titreAccueil">
        <h3><?= TITRE_PAGE_ACCUEIL ?></h3>
    </div>

    <!--  Image et titre monuments  -->
    <div class="row no-padding no-margin">
        <div class="iconPatrimoine col-lg-3 col-md-6 col-sm-6" data-index="0">
            <div class="toSpinCard" id="toSpinCard0">
                <div class="card-font card-back-face"> 
                    <div class="list-group list-group-flush">
                        <a href="?page=terreaux#anchorBodyMonuments" class="list-group-item">Terraux</a>
                        <a href="?page=bellecour#anchorBodyMonuments" class="list-group-item">Bellecour</a>
                        <a href="?page=perrache#anchorBodyMonuments" class="list-group-item">Perrache</a>
                    </div>
                </div>
                <div class="card-font card-font-face">
                    <div class = "col-lg-12 d-flex justify-content-center">
                        <a><img class="AccueilIcon" src="<?= PATH_CORE.'monument.svg' ?>"/></a>
                    </div> 
                    <div class = "col-lg-12 d-flex justify-content-center">
                        <span class="sousTitreAccueil"><?= TITRE_MONUMENT ?></span>
                    </div>  
                </div>
            </div>
        </div>

        <!--  Image et titre activités  -->
        <div class="iconPatrimoine col-lg-3 col-md-6 col-sm-6" data-index="1">
            <div class="toSpinCard" id="toSpinCard1">
                <div class="card-font card-back-face"> 
                    <div class="list-group list-group-flush">
                        <a href="?page=terreaux#anchorBodyActivites" class="list-group-item">Terraux</a>
                        <a href="?page=bellecour#anchorBodyActivites" class="list-group-item">Bellecour</a>
                        <a href="?page=perrache#anchorBodyActivites" class="list-group-item">Perrache</a>
                    </div>
                </div>
                <div class="card-font card-font-face">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <a><img src="<?= PATH_CORE.'activity.svg' ?>" class="AccueilIcon"/></a>
                    </div> 
                    <div class="col-lg-12 d-flex justify-content-center">
                        <span class="sousTitreAccueil"><?= TITRE_ACTIVITE ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!--  Image et titre histoire  -->
        <div class="iconPatrimoine col-lg-3 col-md-6 col-sm-6" data-index="2">
            <div class="toSpinCard" id="toSpinCard2">
                <div class="card-font card-back-face"> 
                    <div class="list-group list-group-flush">
                        <a href="?page=terreaux#anchorBodyHistoire" class="list-group-item">Terraux</a>
                        <a href="?page=bellecour#anchorBodyHistoire" class="list-group-item">Bellecour</a>
                        <a href="?page=perrache#anchorBodyHistoire" class="list-group-item">Perrache</a>
                    </div>
                </div>
                <div class="card-font card-font-face">
                    <div class = "col-lg-12 d-flex justify-content-center">
                        <a><img class="AccueilIcon" src="<?= PATH_CORE.'histoire.svg' ?>"/></a>
                    </div> 
                    <div class = "col-lg-12 d-flex justify-content-center">
                        <span class="sousTitreAccueil"><?= TITRE_HISTOIRE ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!--  Image et titre restaurants  -->
        <div class="iconPatrimoine col-lg-3 col-md-6 col-sm-6" data-index="3">
            <div class="toSpinCard" id="toSpinCard3">
                <div class="card-font card-back-face"> 
                    <div class="list-group list-group-flush">
                        <a href="?page=terreaux#anchorBodyRestaurants" class="list-group-item">Terraux</a>
                        <a href="?page=bellecour#anchorBodyRestaurants" class="list-group-item">Bellecour</a>
                        <a href="?page=perrache#anchorBodyRestaurants" class="list-group-item">Perrache</a>
                    </div>
                </div>  
                <div class="card-font card-font-face">
                    <div class = "col-lg-12 d-flex justify-content-center">
                        <a><img class="AccueilIcon" src="<?= PATH_CORE.'restaurant.svg' ?>"/></a>
                    </div> 
                    <div class = "col-lg-12 d-flex justify-content-center">
                        <span class="sousTitreAccueil"><?= TITRE_RESTAURANT ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<!--  Carte  -->
<div class="row no-padding no-margin">
    <div id="mapid" data-height="60"></div>
</div>

<!-- Modal marker pour mobile -->
<div class="modal fade" id="mobileModal" tabindex="-1" role="dialog" aria-labelledby="mobileModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<!--  Script pour la carte  -->
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>cardMapFactory.js"></script>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>map.js"></script>

<!--  Pied de page  -->
<?php require_once(PATH_VIEWS.'footer.php');
