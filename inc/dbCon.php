<?php 
$host = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "todo";

$db = new mysqli("$host", "$dbUser", "$dbPass", "$dbName");
if($db->connect_error) {
    die("Connection Failed:". $db->connect_error);
}
?>