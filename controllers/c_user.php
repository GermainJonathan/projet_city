<?php

require_once(PATH_MODELS.'ConnexionDAO.php');

$connexion = new ConnexionDAO(DEBUG);

$utilisateur = $connexion -> getInformationsConnexion($_SESSION['ID']);

require_once(PATH_VIEWS.'user.php');