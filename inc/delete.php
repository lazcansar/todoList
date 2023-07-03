<?php 
require_once 'dbCon.php';

if(isset($_GET['taskId'])) {
    $stmt = $db->prepare("DELETE FROM task WHERE taskId = ?");
    $stmt->bind_param("i", $_GET['taskId']);
    $stmt->execute();
    header("Location: ../index.php");
}

?>