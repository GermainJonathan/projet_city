<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."commentaireDAO.php";
require_once PATH_MODELS."user.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$responses = array();
$code = 200;
$commentaireDAO = new commentaireDAO(DEBUG);
$array = null;
$data = json_decode(file_get_contents("php://input"));
session_start();

if (isset($data->idQuartier) && isset($data->message) && isset($data->nom)) {
    $responses = $commentaireDAO->addCommentaire($_SESSION['idLang'], $data->idQuartier, $data->message, $data->nom);
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