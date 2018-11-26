<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."administrationDAO.php";
require_once PATH_MODELS."user.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$responses = array();
$code = 200;
$administrationDAO = new administrationDAO(DEBUG);
$array = null;

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['message']) && isset($_POST['mail'])) {
    $responses = $administrationDAO->createMessageContact();
    if($responses) {
        $message = makeMessage("message", "nom", "prenom", "mail");
        mail(MAIL_ADMIN, 'messageContact', $message);
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