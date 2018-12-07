<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."manager.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$code = 200;
$manager = new manager();

$responses = $manager->getPays();

// Envoie de la réponse
http_response_code($code);
echo json_encode($responses);