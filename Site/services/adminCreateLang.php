<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."paysDAO.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$responses = array();
$code = 200;
$paysDAO = new paysDAO(DEBUG);
$array = null;
$data = json_decode(file_get_contents("php://input"));

if (isset($data->libelle) && isset($data->libelleCourt)) {
    $fichier = $data->libelleCourt . '-' . strtolower($data->libelleCourt);
    $responses = $paysDAO->addPays($data->codelibelle, $data->libelleCourt, $fichier);
    if($responses) {
        copy(PATH_LANG_VOID, $responses->getFichier());
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