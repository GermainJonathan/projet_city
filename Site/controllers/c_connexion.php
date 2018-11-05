<?php

require_once PATH_MODELS."manager.php";

$manager = new manager();

if(isset($_POST['valFormConnexion'])){

    $erreur = null;

    if(empty($_POST['passWord']))
        $erreur = "";

    if(empty($_POST['login']))
        $erreur = "";

    if($erreur === null) {
        if ($manager->testConnexionUser(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['passWord'])))
            $erreur = "";
    }

}

require_once PATH_VIEWS.'connexion.php';