<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
error_log("HERE");
http_response_code(200);
echo json_encode(array("message" => "Quartier works"));
?>