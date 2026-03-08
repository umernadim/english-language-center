<?php
session_start();
include '../config.php';
if (!isset($_SESSION['admin_email'])) {
  header('location: login.php');
  exit;
}

$id = (int)$_GET['id'];

mysqli_query($connect, "UPDATE messages SET is_read = 1 WHERE id = $id");

$sql1 = "SELECT * FROM messages WHERE id = {$id}";
$result1 = mysqli_query($connect, $sql1);
$row1 = mysqli_fetch_assoc($result1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply Message | Hope English Language Center</title>
    <link rel="icon" type="image/png" href="../assets/images/logo.jpeg" />
    <meta name="robots" content="noindex, nofollow" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/admin.css" />
</head>

<body>

    <!-- Code for Add Quiz form -->
    <div class="u-quiz-modal quiz-modal" id="replyModal">
        <div class="modal-content box">
            <div class="modal-header">
                <h2>Reply Message</h2>
            </div>
            <p class="subtitle">Type your reply below. It will be sent directly to the sender’s email.</p>

            <?php
            include '../config.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM messages WHERE id = {$id}";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <form id="replyForm" action="sendMsg.php" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="messageId" value="<?= $row['id'] ?>">
                            <div class="input-field">
                                <label>Email</label>
                                <input type="email" name="email"
                                    placeholder="abc@gmail.com" required
                                    value="<?= $row['email'] ?>" 
                                    readonly/>
                            </div>

                            <div class="input-field">
                                <label>Description</label>
                                <textarea name="replyText" rows="3" placeholder="Type your message.."></textarea>
                            </div>

                            <div class="btns">
                                <button type="button" class="cancel-btn btn" id="cancelBtn">Cancel</button>
                                <button type="submit" class="save-btn btn">Send</button>
                            </div>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <script>
        let cancelBtn = document.getElementById('cancelBtn');
        cancelBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to cancel? Changes will not be saved.')) {
                window.location.href = 'messages.php';
            }
        });
    </script>

</body>

</html>