  <?php
  session_start();
  include '../config.php';

  if ($_POST) {
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $quiz_link = mysqli_real_escape_string($connect, $_POST['quiz_link']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);

    $sql = "INSERT INTO tests (title, test_url, description) 
            VALUES ('$title', '$quiz_link', '$description'";

            
  }
  ?>