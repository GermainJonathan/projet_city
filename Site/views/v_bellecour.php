<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');

require_once(PATH_VIEWS.'spinner.php');?>


<!-- SideBar Page -->
<div>
    <div id="sideBar">
        <nav id="menuQuartier">
            <ul class="nav navbar-nav">
                <li>
                    <a class="nav-link" href="#anchorBodyHistoire">
                        <p class="navLien">
                            <?= TITRE_HISTOIRE ?>
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyMonuments">
                        <p class="navLien">
                            <?= TITRE_MONUMENT ?>
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyActivites">
                        <p class="navLien">
                            <?= TITRE_ACTIVITE ?>
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyRestaurants">
                        <p class="navLien">
                            <?= TITRE_RESTAURANT ?>
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyCommentaires">
                        <p class="navLien">
                            <?= TITRE_COMMENTAIRE ?>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container-fluid">
        <!--  Les catégories  -->
        <div class="bodyQuartier container col-lg-10 offset-lg-2 col-md-10 offset-md-2 col-sm-12">
            <span class="anchor" id="anchorBodyHistoire"></span>
            <div class="row">
                <h1>
                    <?= TITRE_HISTOIRE ?>
                </h1>
                <div id="BodyHistoire">
                    <div id="sousTitreHistory"></div>
                    <p id="txtHistory" class="text-justify"></p>
                </div>
                <div>
                    <!--  Catégorie Histoire  -->
                    <div id="timelineHistory">
                    </div>
                </div>
            </div>
            <span class="anchor" id="anchorBodyMonuments"></span>
            <div class="row">
                <div id="BodyMonuments">
                    <h1>
                        <?= TITRE_MONUMENT ?>
                    </h1>
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
            <span class="anchor" id="anchorBodyActivites"></span>
            <div id="bodyActivites" class="container-fluid">
                <div class="row">
                    <div class="row">
                        <h1>
                            <?= TITRE_ACTIVITE ?>
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <div class="arrow" id="arrowUpActivity"></div>
                            <div id="activiteconteneur" class="row">
                                <div>
                                    <h2>Title 1</h2>
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
                                <div>
                                    <h2>Title 2</h2>
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
                                <div>
                                    <h2>Title 3</h2>
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
                                <div>
                                    <h2>Title 4</h2>
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
                                <div>
                                    <h2>Title 5</h2>
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
                                <div>
                                    <h2>Title 6</h2>
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
                                <div>
                                    <h2>Title 7</h2>
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
                                <div>
                                    <h2>Title 8</h2>
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
                                <div>
                                    <h2>Title 9</h2>
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
                                <div>
                                    <h2>Title 10</h2>
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
                            <div class="arrow" id="arrowDownActivity"></div>
                        </div>
                        <div id="parallaxactivite" class="col-3">
                            <div class="parallax" data-height="60" data-image-src="<?= PATH_ACCUEIL.'lyon.jpg' ?>">
                                <div class="caption">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="EnsavoirPlus col-lg-10" id="SavoirPlusMonuments">
                        <div class="imgSavoirPlus"></div>    
                        <div class="txtSavoirPlus">
                            <div class="titreSavoirPlus"></div>
                            <div class="descSavoirPlus"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <span class="anchor" id="anchorBodyRestaurants"></span>
        <div class="row">
            <div class="col-lg-10 offset-lg-2 col-md-10 offset-md-2 col-sm-12" id="bodyRestaurants">
                <h1><?= TITRE_RESTAURANT ?></h1>
                <div id="ctnRestaurants">
                    <div class="containerCard" id="RestaurantCards">

                    </div>
                    <div class="arrow-restaurant"id="ArrowRes">
                        <div class="arrow" id="arrowTopRestaurant"></div>
                        <div class="arrow" id="arrowDownRestaurant"></div>
                    </div>
                </div>
                <div class="row" id="rowSavoirPlus">
                    <div class="EnsavoirPlus col-lg-10" id="SavoirPlusRestaurants">
                        <div class="imgSavoirPlus"></div>
                        <div class="txtSavoirPlus">
                            <div class="titreSavoirPlus"></div>
                            <div class="descSavoirPlus"></div>
                        </div>
                    </div>
                </div>
            </div>

    <span class="anchor" id="anchorBodyCommentaires"></span>
    <div id="bodyCommentaires">
        <h1>
            <?= TITRE_COMMENTAIRE ?>
        </h1>
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
        <?php
            if (empty($_SESSION['user'])){
                ?>
        <div>
            <form action="" name="formCommentaireBellecour" id="formCommentaireBellecour" method="post">
                <div class="form-group">
                    <label for="nomCommentaire">
                        <?= TXT_COMM_NOM ?></label>
                    <input class="form-control" type="text" name="nomCommentaire" id="nomCommentaire" value="<?= (isset($_POST['titreTopic'])) ? $_POST['titreTopic'] : "" ?>" />
                </div>
                <div class="form-group">
                    <textarea name="commentaire" id="commentaire" class="form-control" placeholder="<?= TXT_COMM_COMM ?>"></textarea>
                </div>
                <button type="submit" form="formCommentaireBellecour" name="valFormCommentaireBellecour" class="btn btn-primary">
                    <?= TXT_ENVOYER ?></button>
            </form>
        </div>
        <?php
            }
            ?>
        <div>
            <!-- le tbleau est à virer !! (c'est moche) -->
            <table>
                <thead>
                    <tr>
                        <th>
                            <?= TITRE_DATE ?>
                        </th>
                        <th>
                            <?= TITRE_COMM_NOM ?>
                        </th>
                        <th>
                            <?= TITRE_COMMENTAIRE ?>
                        </th>
                        <?php
                        if(isset($_SESSION['user']) && $_SESSION['user']->getProfile() == "Administrateur"){
                            ?>
                        <th>
                            <?= TITRE_ACTION ?>
                        </th>
                        <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($listCommentaire as $commentaire){
                            ?>
                    <td>
                        <?= $commentaire->getDate() ?>
                    </td>
                    <td>
                        <?= $commentaire->getNom() ?>
                    </td>
                    <td>
                        <?= $commentaire->getCommentaire() ?>
                    </td>
                    <?php
                            if(isset($_SESSION['user']) && $_SESSION['user']->getProfile() == "Administrateur"){
                            ?>
                    <td><button class="btn btn-danger">X</button></td>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>cardMapFactory.js"></script>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>HistoryPointFactory.js"></script>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>quartier.js"></script>

<!--  Pied de page -->
<?php require_once PATH_VIEWS.'footer.php';