<?php

require_once PATH_MODELS."manager.php";

$manager = new manager();

if(isset($_POST['valFormConnexion'])){

    $erreur = null;

    if(empty($_POST['login']))
        $erreur = "";
    if(empty($_POST['']))
        $erreur = "";

    if($manager -> testConnexionUser())
        $erreur = "";


}

require_once PATH_VIEWS.'connexion.php';