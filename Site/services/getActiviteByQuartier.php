<?php
/**
 * Service de récupération des Activites d'un quartier
 * 
 * @api services/getMActiviteByQuartier [GET]
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

if (isset($_GET['quartier'])) {
    $responses = $quartierDAO->getActiviteByQuartier($_GET['quartier'], $_SESSION["idLang"]);
    $array = array();
    if ($responses != false) {
        foreach ($responses as $temp)
            $array[] = $temp->toArray();
    }
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