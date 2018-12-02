<?php
/**
 * Service de récupération des Histoires d'un quartier
 * 
 * @api services/getHistoireByQuartier [GET]
 * @param quartier string libelleQuartier
 */
require_once "configurationAPI.php";
require_once PATH_MODELS."quartierDAO.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$code = 200;
$quartierDAO = new quartierDAO(DEBUG);

if (isset($_GET['id'])) {
    $responses = $quartierDAO->deleteMonument($_GET['id']);
    if($responses != true) {
        $code = 501;
        $array = array(
            'error' => 'Invalid id',
            'message' => 'Error during SQL statement'
        );
    } else {
        $array = array('success' => 'true');
    }
} else {
    $code = 404;
    $array = array(
        'error' => 'No parameter',
        'message' => 'This service need id parameter'
    );
}
// Envoie de la réponse
http_response_code($code);
echo json_encode($array);