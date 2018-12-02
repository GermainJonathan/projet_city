<?php

require_once "configurationAPI.php";
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

    $responses = $administrationDAO->createMessageContact($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['objet'], $_POST['message']);
if (isset($data->nom) && isset($data->prenom) && isset($data->message) && isset($data->mail)) {
    if($responses) {
        $message = makeMessage("message", "nom", "prenom", "mail");
        mail(MAIL_ADMIN, 'messageContact : ' . $_POST['objet'], $message);
        $array = $responses->toArray();
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