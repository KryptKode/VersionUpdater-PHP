<?php
/**
 * Created by PhpStorm.
 * User: cyberman
 * Date: 10/15/2018
 * Time: 9:56 AM
 */

ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

$server_name = "localhost";
$db_name = "version_updater";
$db_username = "root";
$db_password = "";

$conn = new mysqli($server_name, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>