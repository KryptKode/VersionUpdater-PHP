<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 3:38 PM
 */
require "../include/config.php";
require "../include/utils.php";

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
    echo (json_encode($response)." New");

}else{
    echo('Unsupported request method');
}




?>