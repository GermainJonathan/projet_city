<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."forumDAO.php";
require_once PATH_LIB.'foncBase.php';

session_start();

if(isset($_SESSION["lang"]))
    $lang = $_SESSION["lang"];
else
    $lang = getLangage();
require_once(PATH_TEXTES.$lang.'.php');

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$responses = array();
$code = 200;
$forumDAO = new forumDAO(DEBUG);

if (isset($_GET['topic']) && isset($_GET['etat'])) {
    $responses = $forumDAO->setEtatTopicByCode($_GET['topic'], $_GET['etat']);
    if ($responses != false)
        $responses = $responses->toArray();
} else {
    $code = 404;
    $responses = array(
        'error' => 'No parameter',
        'message' => 'This service need quarter parameter'
    );
}
// Envoie de la réponse
http_response_code($code);
echo json_encode($responses);