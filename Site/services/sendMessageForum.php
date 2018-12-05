<?php

require_once "../models/user.php";
require_once "configurationAPI.php";
require_once PATH_MODELS."forumDAO.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$code = 200;
$forumDAO = new forumDAO(DEBUG);
$array = null;
$data = json_decode(file_get_contents("php://input"));

if(isset($data->nom))
    $nom = $data->nom;
if(isset($_SESSION['user'])) {
    $nom = $_SESSION['user']->getNom();
    $profile = $_SESSION['user']->getCodeProfile();
}
else
    $profile = 0;

if (isset($data->idTopic) && isset($data->message) && isset($nom)) {
    $responses = $forumDAO->sendMessage($data->idTopic, $nom, $data->message, $profile);
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