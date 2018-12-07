<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."forumDAO.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$code = 200;
$forumDAO = new forumDAO(DEBUG);

if (isset($_GET['id'])) {
    $responses = $forumDAO->deleteMesage($_GET['id']);
    if(!$responses) {
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