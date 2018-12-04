<?php
/**
 * Service de récupération des données pour la création des markers sur la carte
 * 
 * @api services/getMarkerParQuartier [GET]
 * @param quartier string libelleQuartier
 */
require_once "configurationAPI.php";
require_once PATH_MODELS."quartierDAO.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$responses = array();
$code = 200;
$quartierDAO = new quartierDAO(DEBUG);

session_start();

session_start();

if (isset($_GET['quartier'])) {
    $responses = $bo->getAllDataByQuarter($_GET['quartier'], $_SESSION["idLang"]);
} else {
    $code = 404;
    $responses = array(
        'error' => 'No parameter',
        'message' => 'This service need quartier parameter'
    );
}
// Envoie de la réponse
http_response_code($code);
echo json_encode($responses);