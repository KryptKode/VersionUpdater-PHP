<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 10:04 AM
 */

require "./include/config.php";
require "./include/utils.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {


$version = get_version($conn);
if($version){

    $whats_new = array();
    $count = 0;
    $result = get_whats_new($conn, $version["version"]);
    while ($row = mysqli_fetch_assoc($result)) {
        $whats_new[] = $row;
    }
    if(count($whats_new) > 0){
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

}else{
    echo('Unsupported request method');
}

?>