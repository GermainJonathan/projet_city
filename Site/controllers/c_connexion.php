<?php

require_once PATH_MODELS."manager.php";

$manager = new manager();

if(isset($_POST['valFormConnexion'])){

    $erreur = null;

    if(empty($_POST['passWord']))
        $erreur = ERREUR_CONN_PW_VOID;

    if(empty($_POST['login']))
        $erreur = ERREUR_CONN_LOGIN_VOID;

    if($erreur === null) {
        if ($test = $manager->testConnexionUser(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['passWord']))){

            session_start();
            $_SESSION['user'] = $test;

            header("Location: index.php");

        }
        else
            $erreur = ERREUR_CONN_REFUSEE;
    }

    if($erreur != null)
        $alert['messageAlert'] = $erreur;

}

require_once PATH_VIEWS.'connexion.php';