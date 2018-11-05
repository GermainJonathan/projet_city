<?php

require_once PATH_MODELS."manager.php";

// DEBUG
$_SESSION['user'] = "Administrateur";
// END

$manager = new manager();
$valFormTest = false;

if(isset($_POST["valFormTopic"])){

    $erreur = null;

    if(empty($_POST["descriptionTopic"]))
        $erreur = ERREUR_TOPC_DSC;

    if(empty($_POST["titreTopic"]))
        $erreur = ERREUR_TOPC_TITRE;

    if($erreur != null)
        $alert['messageAlert'] = $erreur;
    else{
        $manager->createTopic($_POST["titreTopic"], $_POST["descriptionTopic"]);
        $alert['messageAlert'] = SUCCESS_CREATE_TOPIC;
        $alert['classAlert'] = 'success';
        $valFormTest = true;
    }
}

if(isset($_SESSION['user']) && $_SESSION['user'] != "Administrateur")
    $listTopic = $manager->getTopicValid();
else
    $listTopic = $manager->getTopicAll();

require_once PATH_VIEWS.'forum.php';
