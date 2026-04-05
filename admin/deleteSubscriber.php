<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin_email'])) {
    header('location: index.php');
    exit;
}

$id = (int)$_GET['id'];
mysqli_query($connect, "DELETE FROM subscribers WHERE id = $id");
header("Location: subscribersData.php");
exit;
?>