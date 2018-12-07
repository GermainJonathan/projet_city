<?php

require_once "configurationAPI.php";
require_once PATH_LIB.'foncBase.php';
require_once PATH_MODELS."administrationDAO.php";
require_once PATH_MODELS."user.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$responses = array();
$code = 200;
$administrationDAO = new administrationDAO(DEBUG);
$data = json_decode(file_get_contents("php://input"));
$array = null;

if (isset($data->nom) && isset($data->prenom) && isset($data->message) && isset($data->mail) && isset($data->objet)) {
    $responses = $administrationDAO->createMessageContact($data->nom, $data->prenom, $data->mail, $data->objet, $data->message);
    if($responses) {
        $message = makeMessage($data->message, $data->nom, $data->prenom, $data->mail);
        @mail(MAIL_ADMIN, 'messageContact : ' . $data->objet, $message);
        $array = $responses->toArray();
    }
} else {
    $code = 404;
    $array = array(
        'error' => 'No parameter',
        'message' => $data
    );
}
// Envoie de la réponse
http_response_code($code);
echo json_encode($array);