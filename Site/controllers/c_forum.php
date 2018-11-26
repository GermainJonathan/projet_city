<?php

require_once PATH_MODELS."manager.php";

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
        mail(MAIL_ADMIN, 'création de topic', makeMessage("", "", "", ""));
        $valFormTest = true;
    }
}

if(isset($_SESSION['user']) && ($_SESSION['user']->getProfile() == "Administrateur" || $_SESSION['user']->getProfile() == "Moderateur"))
    $listTopic = $manager->getTopicAll();
else
    $listTopic = $manager->getTopicValid();

require_once PATH_VIEWS.'forum.php';
