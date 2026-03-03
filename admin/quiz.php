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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quize Panel | Hope English Language Center</title>
  <meta name="robots" content="noindex, nofollow" />
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet" />
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

    <!-- Content Grid -->
    <div class="content-grid">
      <!-- Left Column -->
      <div class="left-column">
        <!-- Recent Students -->
        <div class="content-card">
          <div class="card-header">
            <h3>Grammar Quiz</h3>
            <div class="card-actions">
              <button class="btn">
                <i class="ri-add-line"></i>
                Add Quiz
              </button>
            </div>
          </div>

          <div class="table-container">
            <?php
            include '../config.php';
            $sql = "SELECT * FROM tests";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result)) {
            ?>
            <table>
              <thead>
                <tr>
                  <th>Topic Name</th>
                  <th>Description</th>
                  <th>Link</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                 <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                <tr>
                  <td><?= $row['title'] ?></td>
                  <td>
                   <?= $row['description'] ?>
                  </td>
                  <td><?= $row['test_url'] ?></td>
                  <td>
                    <div class="action-buttons">
                      <a href="update-quiz.php?id=<?php echo $row['id']?>"
                       class="action-btn edit">
                        <i class="ri-edit-line"></i>
                      </a>
                      <a href="delete-quiz.php?id=<?php echo $row['id']?>" 
                      class="action-btn delete"
                      onclick="return confirm('Are you sure, you want to remove this quiz?')">
                        <i class="ri-delete-bin-line"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Code for Add Quiz form -->
  <div class="a-quiz-modal quiz-modal" id="quizModal">
    <div class="modal-content box">
      <div class="modal-header">
        <h2>Add New Quiz</h2>
        <button class="close-modal" id="closeQuizModal">&times;</button>
      </div>
      <p class="subtitle">Please provide your information of the quiz.</p>

      <form id="quizForm" action="add-quiz.php" method="post">
        <div class="input-field">
          <label>Title</label>
          <input type="text" name="title" placeholder="Test title" required />
        </div>

        <div class="input-field">
          <label>Quiz Link</label>
          <input type="url" name="quiz_link" placeholder="https://quiz-link.com" required />
        </div>

        <div class="input-field">
          <label>Description</label>
          <textarea name="description" rows="3" placeholder="Write a short description.."></textarea>
        </div>

        <div class="btns">
          <button type="button" class="cancel-btn btn" id="cancelQuizBtn">Cancel</button>
          <button type="submit" class="save-btn btn">Save Quiz</button>
        </div>
      </form>
    </div>
  </div>


  <script>
    // Code for add quiz
    document.addEventListener('DOMContentLoaded', function() {
      // Quiz Modal
      const addQuizBtn = document.querySelector('.content-card h3 + .card-actions .btn');
      const quizModal = document.getElementById('quizModal');
      const closeQuizBtn = document.getElementById('closeQuizModal');
      const cancelQuizBtn = document.getElementById('cancelQuizBtn');

      // Open Quiz Modal
      if (addQuizBtn) {
        addQuizBtn.addEventListener('click', function(e) {
          e.preventDefault();
          quizModal.style.display = 'flex';
          document.body.style.overflow = 'hidden';
        });
      }

      // Close functions
      function closeQuizModal() {
        quizModal.style.display = 'none';
        document.body.style.overflow = 'auto';
        document.getElementById('quizForm').reset();
      }

      if (closeQuizBtn) closeQuizBtn.addEventListener('click', closeQuizModal);
      if (cancelQuizBtn) cancelQuizBtn.addEventListener('click', closeQuizModal);

      // Outside click
      quizModal.addEventListener('click', function(e) {
        if (e.target === quizModal) closeQuizModal();
      });
    });
  </script>

</body>

</html>