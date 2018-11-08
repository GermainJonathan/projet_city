<?php
/**
 * Service de récupération des données pour la création des markers sur la carte
 * 
 * @api services/getMarkerParQuartier [GET]
 * @param quartier string
 */
require_once "../config/configuration.php";
require_once "../".PATH_MODELS."forumDAO.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$responses = array();
$code = 200;
$forumDAO = new forumDAO(DEBUG);

if (isset($_GET['topic']) && isset($_GET['etat'])) {
    $responses = $forumDAO->setEtatTopicByCode($_GET['topic'], $_GET['etat']);
    if ($responses != false)
        $responses = serialize($responses);
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