<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Grammar-Quizes | Hope English Language Center</title>
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <!--Code for navbar -->
  <?php
  include 'assets/components/navbar.php';
  ?>

  <div class="wrapper">
    <!-- code for hero-section-banner  -->
    <section id="B-hero-sec">
      <div class="test-header">
        <div class="inner-header flex">
          <div class="container">
            <h1>Ready to Test Your Brain?</h1>
            <p>
              Select a grammar or vocabulary quiz and see how well you can
              perform! Perfect for students preparing for real-world English
              use.
            </p>
            <div class="cta-button-cont">
              <a href="courses.php" class="cta-button">Explore Our Courses</a>
            </div>
          </div>
        </div>
        <?php
        include 'assets/components/banner.php';
        ?>
      </div>
    </section>

    <!-- code for test cards section  -->
    <section id="test-page">
      <div class="test-container">
        <!-- Search Filter -->
        <div class="search-bar">
          <h2>Find Your Grammar Test</h2>
          <div class="underline"></div>

          <div class="search-wrapper">
            <i class="ri-search-line search-icon"></i>
            <input
              type="text"
              id="searchInput"
              placeholder="Search grammar topics..." />
          </div>
        </div>

        <!-- Code for Test Cards -->
        <div class="test-grid" id="testGrid">
          <div class="test-card">
            <h3>Tenses Practice Test</h3>
            <p>
              Test your understanding of verb tenses with practical questions
              covering present, past, and future tenses.
            </p>
            <div class="test-stats">
              <div class="stat">
                <i class="ri-question-line"></i>
                <span>10 Questions</span>
              </div>
              <div class="stat">
                <i class="ri-time-line"></i>
                <span>5-8 minutes</span>
              </div>
            </div>
            <a href="#" class="test-btn cta-button">Take Test <i class="ri-arrow-right-line"></i></a>
          </div>

          <div class="test-card">
            <h3>Prepositions Challenge</h3>
            <p>
              Master the use of prepositions in different contexts with this
              focused practice test.
            </p>
            <div class="test-stats">
              <div class="stat">
                <i class="ri-question-line"></i>
                <span>12 Questions</span>
              </div>
              <div class="stat">
                <i class="ri-time-line"></i>
                <span>6-9 minutes</span>
              </div>
            </div>
            <a href="#" class="test-btn cta-button">Take Test <i class="ri-arrow-right-line"></i></a>
          </div>

          <div class="test-card">
            <h3>Parts of Speech Quiz</h3>
            <p>
              Identify and classify different parts of speech to strengthen
              your grammar foundation.
            </p>
            <div class="test-stats">
              <div class="stat">
                <i class="ri-question-line"></i>
                <span>8 Questions</span>
              </div>
              <div class="stat">
                <i class="ri-time-line"></i>
                <span>4-7 minutes</span>
              </div>
            </div>
            <a href="#" class="test-btn cta-button">Take Test <i class="ri-arrow-right-line"></i></a>
          </div>

          <div class="test-card">
            <h3>Active & Passive Voice</h3>
            <p>
              Practice converting sentences between active and passive voice
              with clear examples.
            </p>
            <div class="test-stats">
              <div class="stat">
                <i class="ri-question-line"></i>
                <span>10 Questions</span>
              </div>
              <div class="stat">
                <i class="ri-time-line"></i>
                <span>5-8 minutes</span>
              </div>
            </div>
            <a href="#" class="test-btn cta-button">Take Test <i class="ri-arrow-right-line"></i></a>
          </div>

          <div class="test-card">
            <h3>Conditional Sentences</h3>
            <p>
              Test your knowledge of zero, first, second, third, and mixed
              conditionals.
            </p>
            <div class="test-stats">
              <div class="stat">
                <i class="ri-question-line"></i>
                <span>15 Questions</span>
              </div>
              <div class="stat">
                <i class="ri-time-line"></i>
                <span>8-12 minutes</span>
              </div>
            </div>
            <a href="#" class="test-btn cta-button">Take Test <i class="ri-arrow-right-line"></i></a>
          </div>

          <div class="test-card">
            <h3>Conjunctions & Connectors</h3>
            <p>
              Practice using conjunctions and connectors to link ideas
              smoothly in sentences.
            </p>
            <div class="test-stats">
              <div class="stat">
                <i class="ri-question-line"></i>
                <span>10 Questions</span>
              </div>
              <div class="stat">
                <i class="ri-time-line"></i>
                <span>6-9 minutes</span>
              </div>
            </div>
            <a href="#" class="test-btn cta-button">Take Test <i class="ri-arrow-right-line"></i></a>
          </div>
        </div>
      </div>
    </section>

    <?php
    include 'assets/components/footer.php';
    ?>
  </div>
  <script src="assets/js/script.js"></script>
</body>

</html>