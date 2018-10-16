<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 3:38 PM
 */
require "../include/config.php";
require "../include/utils.php";


if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0) {


$json_str = file_get_contents('php://input');

$json_obj = json_decode($json_str, TRUE);

$message = $json_obj["whats_new_message"];
if (!$message) {
    $msg = array("error" => "Required parameters are missing");
    echo json_encode($msg);
    die("An error occurred!");
}


    $response = update_whats_new($conn, $json_obj);
    echo (json_encode($response));

}else{
    echo('Unsupported request method');
}




?>