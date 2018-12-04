<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."quartierDAO.php";
require_once PATH_MODELS."user.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$responses = array();
$code = 200;
$quartierDAO = new quartierDAO(DEBUG);
$array = null;
session_start();

if (isset($_SESSION['user']) && $_SESSION['user']->getProfile() == "Administrateur" && isset($_POST['idActivite'])) {
    $responses = $quartierDAO->deleteActivite($_POST['idActivite']);
} else {
    $code = 404;
    $responses = array(
        'error' => 'No parameter',
        'message' => 'This service need quarter parameter'
    );
}
// Envoie de la réponse
http_response_code($code);
echo json_encode($responses);