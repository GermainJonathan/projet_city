<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."quartierDAO.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$responses = array();
$code = 200;
$quartierDAO = new quartierDAO(DEBUG);
$array = null;
$data = json_decode(file_get_contents("php://input"));
error_log(var_export($data, true));
if (isset($data->idActivite) && isset($data->description) && isset($data->title) && isset($data->coordonnees)&& isset($data->adresse) && isset($data->telephone)) {
    $responses = $quartierDAO->setDescriptionActivite($data->idActivite, $data->description, $data->title, $data->coordonnees, $data->adresse,$data->telephone);
    if($responses) {
        $array = $responses->toArray();
    } else {
        $code = 501;
        $array = array(
            'error' => 'Error in SQL statement',
            'message' => 'Error occured during update'
        );
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