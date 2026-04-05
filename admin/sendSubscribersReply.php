<?php
session_start();
include 'config.php';
if (!isset($_SESSION['admin_email'])) {
    header('location: index.php');
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = mysqli_real_escape_string($connect, $_POST['subject']);
    $replyText = mysqli_real_escape_string($connect, $_POST['replyText']);

    $result = mysqli_query($connect, "SELECT email FROM subscribers");

    while ($row = mysqli_fetch_assoc($result)) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'itsumernadeem@gmail.com';
            $mail->Password   = 'retc uoui ciiz lspg';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('itsumernadeem@gmail.com', 'Hope English Language Center');
            $mail->addAddress($row['email']);

            $mail->isHTML(true);
            $mail->Subject = $subject;

            $mail->Body = '
<!DOCTYPE html>
<html>
<head>
  <style>
    body { font-family: Arial, sans-serif; background-color:#f9f9f9; padding:20px; }
    .container { max-width:600px; margin:auto; background:#fff; border:1px solid #ddd; border-radius:8px; padding:20px; }
    .header { text-align:center; border-bottom:1px solid #eee; padding-bottom:10px; }
    .header img { max-height:60px; }
    .content { margin:20px 0; font-size:15px; line-height:1.6; }
    .footer { font-size:12px; color:#777; text-align:center; border-top:1px solid #eee; padding-top:10px; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="https://yourdomain.com/assets/images/logo.jpeg" alt="Hope Logo" />
      <h2>Hope English Language Center</h2>
    </div>
    <div class="content">
      <p>Dear Subscriber,</p>
      <p>' . nl2br($replyText) . '</p> 
      <p>Best regards,<br>Hope English Language Center Team</p>
    </div>
    <div class="footer">
      <p>&copy; ' . date("Y") . ' Hope English Language Center. All rights reserved.</p>
      <p>Contact us: support@yourdomain.com</p>
      <p>
  <a href="https://yourdomain.com/unsubscribe.php?email={{EMAIL}}">
    Unsubscribe
  </a>
</p>
    </div>
  </div>
</body>
</html>';


            $mail->send();
        } catch (Exception $e) {
            // handle error if needed
        }
    }

    echo "<script>alert('Reply sent to all subscribers successfully!'); window.location.href='subscribersData.php';</script>";
}
