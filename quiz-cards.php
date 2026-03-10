<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>English Grammar Quiz | Hope English Language Center</title>

  <meta name="description" content="Practice with our English grammar quiz. Test your knowledge, improve accuracy, and build confidence with Hope English Language Center." />
  <meta name="keywords" content="English grammar quiz, online English test, English practice quiz, language center online test" />

  <!-- Open Graph -->
  <meta property="og:title" content="English Grammar Quiz | Hope English Language Center" />
  <meta property="og:description" content="Take our online English grammar quiz and test your skills. Improve confidence and fluency with Hope English Language Center in Baldia Town, Karachi." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://yourwebsite.com/quiz.php" />
  <meta property="og:image" content="https://yourwebsite.com/assets/images/gallery/14.jpg" />
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
          <?php
          include 'config.php';
          $sql = "SELECT * FROM tests";
          $result = mysqli_query($connect, $sql);
          if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {

          ?>
              <div class="test-card">
                <h3><?= $row['title'] ?> </h3>
                <p>
                <?= $row['description'] ?> 
                </p>
                <div class="test-stats">
                  <div class="stat">
                    <i class="ri-question-line"></i>
                    <span>10-15 Questions</span>
                  </div>
                  <div class="stat">
                    <i class="ri-time-line"></i>
                    <span>4-6 minutes</span>
                  </div>
                </div>
                <a href="<?= $row['test_url'] ?> " class="test-btn cta-button">Take Test <i class="ri-arrow-right-line"></i></a>
              </div>
          <?php
            }
          }

          ?>
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