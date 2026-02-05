<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz-Result | Hope English Language Center</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <section id="quiz-result">
      <div class="container">
        <!-- Header -->
        <div class="page-header">
          <h1>Quiz Result</h1>
          <p>Review your performance and answers</p>
        </div>

        <!-- Result Card -->
        <div class="result-card">
          <!-- Student Info -->
          <div class="student-info">
            <div class="info-item">
              <div class="info-label">Student Name:</div>
              <div class="info-value">
                Muhammad Umer
              </div>
            </div>
            <div class="info-item">
              <div class="info-label">Topic Name:</div>
              <div class="info-value">Present Simple</div>
            </div>
          </div>

          <!-- Code for Score Cards -->
          <div class="score-section">
            <div class="score-card total">
              <h3 class="score-number">10</h3>
              <div class="score-label">Total Questions</div>
            </div>
            <div class="score-card correct">
              <h3 class="score-number">07</h3>
              <div class="score-label">Correct Answers</div>
            </div>
            <div class="score-card wrong">
              <h3 class="score-number">03</h3>
              <div class="score-label">Wrong Answers</div>
            </div>
          </div>
        </div>

        <!-- Review Section -->
        <div class="review-section">
          <h2 class="section-title">Answer Review</h2>

          <?php
      $q = mysqli_query($conn, "SELECT * FROM questions WHERE test_id=$test_id");
      $i = 1;
      
      while ($question = mysqli_fetch_assoc($q)) {
        // Get student's answer
        $ans = mysqli_fetch_assoc(
          mysqli_query($conn,
            "SELECT selected_option_id FROM answers
             WHERE student_id=$sid AND question_id=".$question['id']
          )
        );
        
        $selected = $ans['selected_option_id'];
      ?>
          <div class="review-question">
            <div class="question-header">
              <div class="question-number"><?= $i++ ?></div>
              <div class="question-text">
                <?= htmlspecialchars($question['question']) ?>
              </div>
            </div>

            <div class="options">
              <?php
          $opts = mysqli_query($conn,
            "SELECT * FROM options WHERE question_id=".$question['id']
          );
          
          while ($opt = mysqli_fetch_assoc($opts)) {
            $class = "option";
            $status = "";
            
            if ($opt['is_correct']) {
              $class .= " correct";
              $status = "Correct Answer";
            }
            
            if ($opt['id'] == $selected && !$opt['is_correct']) {
              $class .= " wrong";
              $status = "Your Answer (Incorrect)";
            } elseif ($opt['id'] == $selected && $opt['is_correct']) {
              $status = "Your Answer ✓";
            }
          ?>
              <div class="<?= $class ?>">
                <div class="option-label">
                  <?= htmlspecialchars($opt['option_text']) ?>
                </div>
                <?php if ($status): ?>
                <div class="status"><?= $status ?></div>
                <?php endif; ?>
              </div>
              <?php } ?>
            </div>
          </div>
          <?php } ?>
        </div>

        <!-- Actions -->
        <div class="action-buttons cta-btn-cont">
          <a href="quiz-cards.php" class="btn cta-button">Back to Home</a>
        </div>

        <!-- Footer -->
        <div class="footer">
          <p>© Hope English Language Center. Thank you for taking the test!</p>
        </div>
      </div>
    </section>
    <!-- <script src="assets/js/script.js"></script> -->
  </body>
</html>
