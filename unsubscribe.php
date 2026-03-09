<?php
include 'config.php';

if (isset($_GET['email'])) {
    $email = mysqli_real_escape_string($connect, $_GET['email']);

    $check = mysqli_query($connect, "SELECT id FROM subscribers WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($connect, "DELETE FROM subscribers WHERE email='$email'");
        echo "<div style='padding:20px; background:#e6ffe6; border:1px solid #0f0; color:#060;'>
        You have been unsubscribed successfully.
      </div>";
    }
} else {
    echo "<h2>Invalid request.</h2>";
}
