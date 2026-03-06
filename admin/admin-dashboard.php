<?php
session_start();
include '../config.php';
if (!isset($_SESSION['admin_email'])) {
  header('location: login.php');
  exit;
}

$teach_count = 'SELECT COUNT(*) AS count FROM teachers';
$result1 = mysqli_query($connect, $teach_count);
$teachers_count = mysqli_fetch_assoc($result1)['count'];

$feed_count = 'SELECT COUNT(*) AS count FROM feedback';
$result2 = mysqli_query($connect, $feed_count);
$feedback_count = mysqli_fetch_assoc($result2)['count'];

$achieve_count = 'SELECT COUNT(*) AS count FROM achievements';
$result3 = mysqli_query($connect, $achieve_count);
$achievements_count = mysqli_fetch_assoc($result3)['count'];

$quiz_count = 'SELECT COUNT(*) AS count FROM tests';
$result4 = mysqli_query($connect, $quiz_count);
$quizzes_count = mysqli_fetch_assoc($result4)['count'];


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin-Dashboard | Hope English Language Center</title>
    <meta name="robots" content="noindex, nofollow" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/css/admin.css" />
  </head>
  <body>
    <!-- Sidebar -->
    <?php
    include 'assets/components/sidebar.php'
    ?>

    <main class="main-content">
      <!-- Top Bar -->
     <?php
    include 'assets/components/navbar.php'
    ?>
      <!-- Stats Grid -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon teachers">
            <i class="ri-team-line"></i>
          </div>
          <div class="stat-info">
            <h3><?php echo $teachers_count; ?></h3>
            <p>Total Teachers</p>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon courses">
            <i class="ri-book-2-line"></i>
          </div>
          <div class="stat-info">
            <h3><?php echo $quizzes_count; ?></h3>
            <p>Grammar Quizes</p>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon achievements">
            <i class="ri-trophy-line"></i>
          </div>
          <div class="stat-info">
            <h3><?php echo $achievements_count; ?></h3>
            <p>Achievements</p>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon testimonial">
            <i class="ri-message-line"></i>
          </div>
          <div class="stat-info">
            <h3><?php echo $feedback_count; ?></h3>
            <p>Feedback</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon testimonial">
            <i class="ri-message-3-line"></i>
          </div>
          <div class="stat-info">
            <h3>0</h3>
            <p>Messages</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon testimonial">
            <i class="ri-mail-line"></i>
          </div>
          <div class="stat-info">
            <h3>0</h3>
            <p>Emails</p>
          </div>
        </div>



      </div>
    </main>

    <script src="../assets/js/admin.js"></script>
  </body>
</html>
