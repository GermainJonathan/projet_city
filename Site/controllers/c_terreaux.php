<?php

require_once PATH_MODELS.'manager.php';

$manager = new manager();
$quartier = $manager->getQuartierByLibelle(ucfirst($_GET['page']));

if(isset($_POST['valFormCommentaireBellecour'])){

    $erreur = null;

    if(empty($_POST['commentaire']))
        $erreur = "";

    if(empty($_POST['nomCommentaire']))
        $erreur = "";

    if($erreur == null){

        $manager->addCommentaire();

    }
}

$listCommentaire = $manager->getCommentaire($quartier->getCodeQuartier());

require_once PATH_VIEWS.'terreaux.php';
