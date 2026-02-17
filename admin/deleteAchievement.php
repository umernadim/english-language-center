<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_email'])) {
    header('location: login.php');
    exit;
}

$achieve_id = $_GET['id'];

$sql = "DELETE FROM achievements WHERE id = {$achieve_id}";
$result = mysqli_query($connect, $sql);
header("location: achievements.php");

?>