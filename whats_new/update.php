<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 3:38 PM
 */
require "../include/config.php";
require "../include/utils.php";


if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') === 0) {


$json_str = file_get_contents('php://input');

$json_obj = json_decode($json_str, TRUE);
    if(array_key_exists("whats_new_message", $json_obj)){

        $response = update_whats_new($conn, $json_obj);
        $whats_new = array();
        while ($row = mysqli_fetch_assoc($response)) {
            $whats_new[] = $row;
        }
        echo (json_encode($whats_new));
    }else{
        $msg = array("error" => "Required parameters are missing");
        echo json_encode($msg);
    }

}else{
    echo('Unsupported request method');
}




?>