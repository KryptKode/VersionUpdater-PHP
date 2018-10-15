<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 9:56 AM
 */

$server_name = "localhost";
$db_name = "version_updater";
$db_username = "root";
$db_password = "";

$conn = new mysqli($server_name, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>