<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 3:38 PM
 */
require "config.php";
require "utils.php";


$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if (strcasecmp($contentType, 'application/json') != 0) {
    throw new Exception('Content type must be: application/json');
}
$json_str = file_get_contents('php://input');

$json_obj = json_decode($json_str, TRUE);

$version = $json_obj["version"];
if (!$version) {
    $msg = array("error" => "Required parameters are missing");
    echo json_encode($msg);
    die("An error occurred!");
}

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0) {

    $response = insert_version($conn, $json_obj);

}else if(strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT') == 0) {
    //update

}else{
    echo('Unsupported request method');
}




?>