<?php 
require_once 'dbCon.php';

if(isset($_POST['checked'])) {
    $id = $_POST['taskId'];
    $chek = $_POST['check'];
    $stmt = $db->prepare("UPDATE task SET taskType=?  WHERE taskId = ?");
    $stmt->bind_param("si", $chek, $id);
    $stmt->execute();
    header("Location: ../index.php");
    $stmt->close();
}
if(isset($_POST['check'])) {
    $id = $_POST['taskId'];
    $chek = $_POST['check'];
    $stmt = $db->prepare("UPDATE task SET taskType=?  WHERE taskId = ?");
    $stmt->bind_param("si", $chek, $id);
    $stmt->execute();
    header("Location: ../index.php");
    $stmt->close();
}
?>