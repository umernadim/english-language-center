<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin_email'])) {
    header('location: index.php');
    exit;
}

$teacher_id = $_GET['id'];

$sql = "DELETE FROM teachers WHERE id = {$teacher_id}";
$result = mysqli_query($connect, $sql);
header("location: teachers.php");

?>