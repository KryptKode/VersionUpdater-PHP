<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 3:38 PM
 */
require "../include/config.php";
require "../include/utils.php";

if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0) {


    $json_str = file_get_contents('php://input');

    $json_obj = json_decode($json_str, TRUE);

    if(count($json_obj) > 0){

        foreach ($json_obj as $key => $value) {
            $response = insert_whats_new($conn, $value);
        }
        $msg = array("success" => TRUE);
        echo(json_encode($response));
    }else{
        $msg = array("error" => "Required parameters are missing");
        echo json_encode($msg);
        die("An error occurred!");
    }




} else {
    echo('Unsupported request method');
}


?>