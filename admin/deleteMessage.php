<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_email'])) {
    header('location: login.php');
    exit;
}

$message_id = $_GET['id'];

$sql = "DELETE FROM messages WHERE id = {$message_id}";
$result = mysqli_query($connect, $sql);
header("location: messages.php");

?>