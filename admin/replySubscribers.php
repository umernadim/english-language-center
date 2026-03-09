<?php
session_start();
include '../config.php';
if (!isset($_SESSION['admin_email'])) {
  header('location: login.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply Subscribers | Hope English Language Center</title>
    <link rel="icon" type="image/png" href="../assets/images/logo.jpeg" />
    <meta name="robots" content="noindex, nofollow" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/admin.css" />
</head>

<body>

    <div class="u-quiz-modal quiz-modal" id="replyModal">
        <div class="modal-content box">
            <div class="modal-header">
                <h2>Send Message</h2>
            </div>
            <p class="subtitle">Type your reply below. It will be sent directly to the sender’s email.</p>
                    <form id="replyForm" action="sendSubscribersReply.php" method="post">
                        <div class="modal-body">
                            <div class="input-field">
                                <label>Subject</label>
                                <input type="text" name="subject"
                                    placeholder="New batch start" required
                                    />
                            </div>

                            <div class="input-field">
                                <label>Message</label>
                                <textarea name="replyText" rows="5" placeholder="Type your message.." required></textarea>
                            </div>

                            <div class="btns">
                                <button type="button" class="cancel-btn btn" id="cancelBtn">Cancel</button>
                                <button type="submit" class="save-btn btn">Send</button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>

    <script>
        let cancelBtn = document.getElementById('cancelBtn');
        cancelBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to cancel? Changes will not be saved.')) {
                window.location.href = 'subscribersData.php';
            }
        });
    </script>

</body>

</html>