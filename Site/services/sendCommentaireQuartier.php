<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."commentaireDAO.php";
require_once PATH_MODELS."user.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


$responses = array();
$code = 200;
$commentaireDAO = new commentaireDAO(DEBUG);
$array = null;
session_start();

if (isset($_GET['idQuartier']) && isset($_GET['message']) && isset($_POST['nom'])) {
    $responses = $commentaireDAO->addCommentaire($_SESSION['idLang'], $_POST['idQuartier'], $_POST['message'], $_POST['nom']);
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