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

if (isset($_POST['idActivite']) && isset($_POST['description'])) {
    $responses = $quartierDAO->setDescriptionActivite($_POST['idActivite'], $_POST['description']);
    if($responses)
        $array = $responses->toArray();
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