<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 3:38 PM
 */
require "../include/config.php";
require "../include/utils.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $json_str = file_get_contents('php://input');

    $json_obj = json_decode($json_str, TRUE);

    if(count($json_obj) > 0){

        foreach ($json_obj as $key => $value) {
//            echo "Key= ".$key." \n"."  Value= ".$value;
            $response = insert_whats_new($conn, $value);
        }

        if($response == TRUE){
            $msg = array("success" => TRUE);
            echo(json_encode($msg));
        }else{
            $msg = array("error" => "An error occurred");
            echo json_encode($msg);
        }
    }else{
        $msg = array("error" => "Required parameters are missing");
        echo json_encode($msg);
        die("An error occurred!");
    }


} else {
    echo('Unsupported request method');
}


?>