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
    $messageId = (int)$_POST['messageId'];
    $replyText = mysqli_real_escape_string($connect, $_POST['replyText']);
    $userEmail = mysqli_real_escape_string($connect, $_POST['email']);

    // Save reply in replies table
    $sql = "INSERT INTO replies (message_id, reply_text) VALUES ('$messageId', '$replyText')";
    mysqli_query($connect, $sql);

    // Update message status
    mysqli_query($connect, "UPDATE messages SET replied = 1 WHERE id = $messageId");

    // Send email via PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'itsumernadeem@gmail.com'; // tumhara Gmail
        $mail->Password   = 'retc uoui ciiz lspg';   // Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('itsumernadeem@gmail.com', 'Hope English Language Center');
        $mail->addAddress($userEmail);

        $mail->isHTML(true);
        $mail->Subject = 'Reply from Hope English Language Center';
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
      <p>Dear Visitor,</p>
      <p>' . nl2br($replyText) . '</p>
      <p>Best regards,<br>Hope English Language Center Team</p>
    </div>
    <div class="footer">
      <p>&copy; ' . date("Y") . ' Hope English Language Center. All rights reserved.</p>
      <p>Contact us: support@yourdomain.com</p>
    </div>
  </div>
</body>
</html>';



        $mail->send();
        echo "<script>alert('Reply sent successfully!'); window.location.href='messages.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}
