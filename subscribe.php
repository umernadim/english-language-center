<?php
include 'admin/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($connect, $_POST['email']);

    // Check if already subscribed
    $check = mysqli_query($connect, "SELECT id FROM subscribers WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('You are already subscribed!'); window.location.href='index.php';</script>";
    } else {
        $sql = "INSERT INTO subscribers (email) VALUES ('$email')";
        if (mysqli_query($connect, $sql)) {
            echo "<script>alert('Subscribed successfully!'); window.location.href='index.php';</script>";
        } 
    }
}
?>