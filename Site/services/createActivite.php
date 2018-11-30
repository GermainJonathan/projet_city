<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."quartierDAO.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$responses = array();
$code = 200;
$quartierDAO = new quartierDAO(DEBUG);
$array = null;

if (isset($_POST['idQuartier']) && file_exists($_FILES['photo']['tmp_name'])) {

    $quartier = $quartierDAO->getQuartierByCode($_POST['idQuartier']);
    $erreur = null;

    // TODO: trouver un moyen de charger dynamiquement le path du fichier en fonction du quartier (mieux que ca)
    $fichier = PATH_IMAGES . $quartier->getLibelleQuartier() . "/";


    $nouvelleImage = $fichier.basename($_FILES['photo']['name']);
    $imageType = strtolower(pathinfo($nouvelleImage,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check === false)
        $erreur =  ERREURE_FILE_NOT_IMAGE;

    if (file_exists($nouvelleImage))
        $erreur = ERREURE_IMAGE_EXISTANTE;

    if ($_FILES["photo"]["size"] > 500000)
        $erreur = ERREUR_IMAGE_TROP_LOURDE;

    if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif" )
        $erreur =  ERREURE_NOT_IMAGE;

    if($erreur == null) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $nouvelleImage)) {
            $success = basename($_FILES["photo"]["name"]);
            if (!$responses = $quartierDAO->createActivite($_SESSION['idLang'], $success)) {
                $erreur = ERREUR_BDD;
                unlink($nouvelleImage);
            }
            else{
                $array = $responses->toArray();
            }
        }
    }
    else
        $erreur = ERREURE_TELECHARGEMENT;
} else {
    $code = 404;
    $array = array(
        'error' => 'No parameter',
        'message' => 'This service need quarter parameter'
    );
}
// Envoie de la réponse
http_response_code($code);
echo json_encode($array);