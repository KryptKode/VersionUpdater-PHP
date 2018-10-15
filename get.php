<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 10:04 AM
 */

require "config.php";
require "utils.php";


$version = get_version($conn);
if($version){

    $whats_new = get_whats_new($conn, $version["id"]);

   if($whats_new){
        $data = array("version" => $version, "whats_new" => $whats_new);
        echo (json_encode($data));
    }else{
        $data = array("version" => $version);
        echo (json_encode($data));
    }

}else{
    $data = array("error"=>"No data, please insert data");
    echo json_encode($data);
}




?>