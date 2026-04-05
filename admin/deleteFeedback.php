<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin_email'])) {
    header('location: index.php');
    exit;
}

$feedback_id = $_GET['id'];

$sql = "DELETE FROM feedback WHERE id = {$feedback_id}";
$result = mysqli_query($connect, $sql);
header("location: feedback.php");

?>