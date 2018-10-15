<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 7:01 PM
 */

function get_version($conn){
    $sql_version = "SELECT * FROM version ORDER BY id DESC LIMIT 1";

    $result = $conn->query($sql_version);
    if($result->num_rows >0){
        return $result->fetch_assoc();
    }else{
        return null;
    }
}


function insert_version($conn, $data){
    $version_num = $data["version"];
    $message = $data["message"];
    $sql_version = "INSERT INTO version (version, message) VALUES ('$version_num', '$message')";

    $result = $conn->query($sql_version);
    if($result === TRUE){
        return get_version($conn);
    }else{
        return null;
    }
}


function update_version($conn, $data){
    $id = get_version($conn)["id"];
    $version_num = $data["version"];
    $message = $data["message"];
    $sql_version = "UPDATE version SET version='$version_num', message='$message' WHERE id='$id'";

    $result = $conn->query($sql_version);
    if($result === TRUE){
        return get_version($conn);
    }else{
        return null;
    }
}


function get_whats_new($conn, $version_id){
    $sql_whats_new = "SELECT * FROM whats_new WHERE version_id='$version_id'"." LIMIT 4";

    $result = $conn->query($sql_whats_new);
    if($result->num_rows >0){
        return $result->fetch_assoc();
    }else{
        return null;
    }
}


function insert_whats_new($conn, $data){
    $version_id = $data["version_id"];
    $message = $data["whats_new_mesage"];
    $sql_version = "INSERT INTO whats_new (version_id, whats_new_mesage) VALUES ('$version_id', '$message')";

    $result = $conn->query($sql_version);
    return $result === TRUE;
}


function update_whats_new($conn, $data){
    $id = $data["id"];
    $message = $data["whats_new_mesage"];
    $sql_version = "UPDATE whats_new SET  whats_new_mesage='$message' WHERE id='$id'";
    $result = $conn->query($sql_version);
    if($result === TRUE){
        $id = get_version($conn)["id"];
        return get_whats_new($conn, $id);
    }else{
        return null;
    }
}
?>