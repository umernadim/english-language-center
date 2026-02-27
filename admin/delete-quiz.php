<?php

session_start();
include '../config.php';
if (!isset($_SESSION['admin_email'])) {
  header('location: login.php');
  exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM tests WHERE id = {$id}";
$result = mysqli_query($connect, $sql);
header("Location: quiz.php");

?>