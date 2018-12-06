<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."forumDAO.php";
require_once PATH_MODELS."user.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$responses = array();
$code = 200;
$forumDAO = new forumDAO(DEBUG);
$array = null;
$data = json_decode(file_get_contents("php://input"));

if (isset($data->titreTopic) && isset($data->descriptionTopic)) {
    $responses = $forumDAO->createNewTopic($data->titreTopic, forbiden_words($data->descriptionTopic), $_SESSION["idLang"]);
    
    @mail(MAIL_ADMIN, 'création de topic', makeMessage("", "", "", ""));

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