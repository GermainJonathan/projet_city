<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');

require_once(PATH_VIEWS.'spinner.php');?>


<!-- SideBar Page -->
<div>
    <div id="sideBar" class="col-lg-2 col-md-2 col-sm-0">
        <nav id="menuQuartier">
            <ul class="nav navbar-nav">
                <li>
                    <a class="nav-link" href="#anchorBodyHistoire">
                        <p class="navLien">Histoire</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyMonuments">
                    <p class="navLien">Monuments</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyActivites">
                    <p class="navLien">Activités</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyRestaurants">
                    <p class="navLien">Restaurants</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyCommentaires">
                    <p class="navLien">Commentaires</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!--  Les catégories  -->
     <div class="bodyQuartier">
        <span class="anchor" id="anchorBodyHistoire"></span>
        <div class="row">
            <div class="col-lg-4 offset-lg-2 col-md-3 offset-md-2 col-sm-12" id="BodyHistoire">
                <h1> Histoire</h1>
                <div id="sousTitreHistory"></div>
                <p id="txtHistory" class="text-justify"></p>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12">
                <!--  Catégorie Histoire  -->
                <div id="timelineHistory">
                </div>
            </div>
        </div>
        <span class="anchor" id="anchorBodyMonuments"></span>
        <div class="row">
            <div class="col-lg-10 offset-lg-2 col-md-10 offset-md-2 col-sm-12" id="BodyMonuments">
                <h1> Les Monuments</h1>
                <div class="carrousel">
                    <div class="arrow-carrousel">
                        <div class="arrow" id="arrowLeftMonument"></div>
                        <div class="arrow" id="arrowRightMonument"></div>
                    </div>
                    <div class="carrousel-contenu" id="carrouselMonument">
                    </div>
                </div>
            </div>
        </div>

        <span class="anchor" id="anchorBodyRestaurants"></span>
        <div class="row">
            <div class="col-lg-10 offset-lg-2 col-md-10 offset-md-2 col-sm-12" id="bodyRestaurants">
                <h1> Restaurants</h1>
                <div class="containerCard" id="RestaurantCards">

                </div>
                <div class="arrow-restaurant"id="ArrowRes">
                    <a class="arrow" id="arrowTopRestaurant" href="#anchorBodyRestaurants"></a>
                    <a class="arrow" id="arrowDownRestaurant"></a>
                </div>
            </div>
        </div>
    </div> 
        <span class="anchor" id="anchorBodyActivites"></span>
        <div id="bodyActivites">
        <h1> Activités</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat.
            Lorem ipsum dolor sit amet, consectetur
            adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat.</p>
        </div>
    
        <span class="anchor" id="anchorBodyCommentaires"></span>
        <div id="bodyCommentaires">
        <h1> Commentaires</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat.
            Lorem ipsum dolor sit amet, consectetur
            adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat.</p>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>cardMapFactory.js"></script>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>HistoryPointFactory.js"></script>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>quartier.js"></script>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
