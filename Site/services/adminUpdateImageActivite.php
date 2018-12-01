<?php

require_once "configurationAPI.php";
require_once PATH_MODELS."quartierDAO.php";

// Header de retour pour le type JSON et éviter les erreurs cross-origin ( rendre accessible l'API )
header("Access-Control-Allow-Origin: *");
header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$responses = array();
$code = 200;
$quartierDAO = new quartierDAO(DEBUG);
$array = null;

if(isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $imageName = $image['name'];
    if (isset($_POST['id']) && isset($imageName) && $image['error'] == 0) {
        $responses = $quartierDAO->setImageActivite($_POST['id'], $imageName);
        if($responses) {
            $array = $responses->toArray();
        }
        $codeQuartier = $array['codeQuartier'];
        move_uploaded_file($image['tmp_name'], PATH[$codeQuartier].basename($imageName));
    } else {
        $code = 502;
        $array = array(
            'error' => 'Error during operating',
            'message' => 'Error has occured during SQL statement or image upload'
        );
    }
} else {
    $code = 403;
    $array = array(
        'error' => 'No image',
        'message' => 'Upload a image unless image...'
    );
}

// Envoie de la réponse
http_response_code($code);
echo json_encode($array);