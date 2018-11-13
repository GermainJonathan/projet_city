<?php

// En tête de page
require_once PATH_VIEWS.'header.php';

// menu navigation
require_once PATH_VIEWS.'alert.php';

// Spinner au chargement de la page
require_once PATH_VIEWS.'spinner.php';?>

<script type="text/javascript" src="<?= PATH_SCRIPTS ?>quartier.js"></script>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>bellecourEnv.js"></script>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>cardMapFactory.js"></script>
<!-- TODO: FAIRE UNE VUE SIDEBAR -->
<!-- SideBar Page -->
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
    <div class="bodyQuartier col-lg-10 offset-lg-2 col-md-10 offset-md-2 col-sm-12">
        <!-- Composant histoire -->
        <?php 
            require_once PATH_VIEWS.'histoire.php';
            require_once PATH_VIEWS.'monument.php'; 
            require_once PATH_VIEWS.'activite.php';
            require_once PATH_VIEWS.'restaurant.php'; 
            require_once PATH_VIEWS.'commentaire.php';  
        ?>
    </div>
</div>
<!--  Pied de page -->
<?php require_once PATH_VIEWS.'footer.php';