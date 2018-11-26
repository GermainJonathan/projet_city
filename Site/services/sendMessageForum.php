<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."forumDAO.php";
require_once PATH_MODELS."user.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$responses = array();
$code = 200;
$forumDAO = new forumDAO(DEBUG);
$array = null;
session_start();

if(isset($_POST['nom']))
    $nom = $_POST['nom'];
if(isset($_SESSION['user'])) {
    $nom = $_SESSION['user']->getNom();
    $profile = $_SESSION['user']->getCodeProfile();
}
else
    $profile = 0;

if (isset($_POST['idTopic']) && isset($_POST['message']) && isset($nom)) {
    $responses = $forumDAO->createMessageTopic($_POST['idTopic'], $_POST['message'], $nom, $profile);
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