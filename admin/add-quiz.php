  <?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_email'])) {
    header('location: login.php');
    exit;
}

  if ($_POST) {
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $quiz_link = mysqli_real_escape_string($connect, $_POST['quiz_link']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);

    $sql = "INSERT INTO tests (title, test_url, description) 
            VALUES ('$title', '$quiz_link', '$description')";

    if (mysqli_query($connect, $sql)) {
      echo "Quiz added successfully!";
      header("Location: quiz.php");
      exit;
    }
  }
  ?>