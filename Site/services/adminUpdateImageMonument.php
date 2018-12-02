<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."quartierDAO.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$responses = array();
$code = 200;
$quartierDAO = new quartierDAO(DEBUG);
$array = null;

if (isset($_POST['idMonument']) && file_exists($_FILES['photo']['tmp_name'])) {
    $erreur = null;
    // TODO: trouver un moyen de charger dynamiquement le path du fichier en fonction du quartier
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
            if (!$responses = $quartierDAO->setImageActivite($_POST['idMonument'], $success)) {
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
    $code = 403;
    $array = array(
        'error' => 'No image',
        'message' => 'Upload a image unless image...'
    );
}

// Envoie de la réponse
http_response_code($code);
echo json_encode($array);