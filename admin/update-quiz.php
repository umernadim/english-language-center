<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_email'])) {
    header('location: login.php');
    exit;
}

// Secure ID validation
$id = isset($_GET['id']);

if ($_POST) {
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $quiz_link = mysqli_real_escape_string($connect, $_POST['quiz_link']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);

    $sql = "UPDATE tests SET 
            title='$title', 
            test_url='$quiz_link', 
            description='$description' 
            WHERE id=$id";

    if (mysqli_query($connect, $sql)) {
        header("Location: quiz.php?success=updated");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
    <div class="u-quiz-modal quiz-modal">
        <div class="modal-content box">
            <div class="modal-header">
                <h2>Update Quiz</h2>
            </div>
            <p class="subtitle">Update quiz information.</p>

            <?php
            include '../config.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM tests WHERE id = $id";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                $quiz = mysqli_fetch_assoc($result);
            ?>
                <form id="updateQuizForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="hidden" name="quiz_id" value="<?php echo $quiz['id']; ?>">

                    <div class="input-field">
                        <label>Title *</label>
                        <input type="text" name="title" value="<?php echo $quiz['title']; ?>" required>
                    </div>

                    <div class="input-field">
                        <label>Quiz Link *</label>
                        <input type="url" name="quiz_link" value="<?php echo $quiz['test_url']; ?>" required>
                    </div>

                    <div class="input-field">
                        <label>Description</label>
                        <textarea name="description" rows="3"><?php echo $quiz['description']; ?></textarea>
                    </div>

                    <div class="btns">
                        <button type="button" class="cancel-btn btn" id="cancelBtn">
                            Cancel
                        </button>
                        <button type="submit" class="save-btn btn">Update Quiz</button>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
    <script>
        let cancelBtn = document.getElementById('cancelBtn');
            cancelBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to cancel? Changes will not be saved.')) {
                    window.location.href = 'quiz.php';
                }
            });
    </script>
</body>

</html>