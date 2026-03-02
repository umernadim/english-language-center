<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daily English Vocabulary | Hope English Language Center</title>

  <meta name="description" content="Learn daily English vocabulary, word meanings, and improve language skills with Hope English Language Center in Baldia Town, Karachi." />

  <meta name="keywords" content="English vocabulary, daily English words, word meanings practice, vocabulary improvement course Karachi" />

  <!-- Open Graph -->
  <meta property="og:title" content="Daily English Vocabulary & Word Meanings | Hope English Language Center Karachi" />
  <meta property="og:description" content="Improve your English vocabulary with daily words and meanings. Practice and build confidence with Hope English Language Center in Baldia Town, Karachi." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://yourwebsite.com/vocabulary.php" />
  <meta property="og:image" content="https://yourwebsite.com/assets/images/gallery/carousel/img3.jpg" />
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body class="v-banner">
  <!--Code for navbar -->
  <?php
  include 'assets/components/navbar.php';
  ?>
  <div class="wrapper">
    <!-- code for hero-section-banner  -->
    <section id="B-hero-sec" class="v-banner">
      <div class="vocab-header">
        <div class="inner-header flex">
          <div class="container">
            <h1>Learn New Words. Speak with Confidence.</h1>
            <p>
              Find the right words, enrich your mind, and speak with
              confidence and clarity.
            </p>
            <a href="#vocab-container" class="cta-button">Explore Words</a>
          </div>
        </div>
        <?php
        include 'assets/components/banner.php';
        ?>
      </div>
    </section>

    <!-- Main Content -->
    <section id="vocab-container">
      <!-- Main Content -->
      <div class="vocab-main">
        <!-- Word of the Day -->
        <div class="word-of-day" id="wordOfDay">
          <h3><i class="ri-lightbulb-flash-line"></i> Word of the Day</h3>
          <div class="loading">
            <div class="loading-spinner"></div>
            <p>Loading word of the day...</p>
          </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="search-section">
          <form class="search-form" id="searchForm">
            <input
              type="text"
              class="search-input"
              id="searchInput"
              placeholder="Search for any English word..." />
            <button type="submit" class="search-button">
              <i class="ri-search-line"></i> Search
            </button>
          </form>
        </div>

        <!-- Vocabulary List -->
        <div class="vocab-list" id="vocabList">
          <div class="loading">
            <div class="loading-spinner"></div>
            <p>Loading vocabulary words...</p>
          </div>
        </div>
        <div class="load-more-container">
          <button id="loadMoreBtn" class="cta-button">Load More Words</button>
        </div>
      </div>

      <!-- Sidebar -->
      <aside class="vocab-sidebar">
        <!-- Recent Words Widget -->
        <div class="sidebar-widget">
          <h3 class="widget-title">Recently Searched</h3>
          <ul class="recent-words" id="recentWords">
            <li class="recent-word">
              <a href="#" data-word="language">
                <span>Language</span>
              </a>
            </li>
            <li class="recent-word">
              <a href="#" data-word="communication">
                <span>Communication</span>
              </a>
            </li>
            <li class="recent-word">
              <a href="#" data-word="fluency">
                <span>Fluency</span>
              </a>
            </li>
          </ul>
        </div>

        <!-- Categories Widget -->
        <!-- <div class="sidebar-widget">
          <h3 class="widget-title">Word Categories</h3>
          <ul class="categories-list">
            <li>
              <a href="#" data-category="education"
                >Education <span class="category-count">24</span></a
              >
            </li>
            <li>
              <a href="#" data-category="business"
                >Business <span class="category-count">18</span></a
              >
            </li>
            <li>
              <a href="#" data-category="technology"
                >Technology <span class="category-count">12</span></a
              >
            </li>
            <li>
              <a href="#" data-category="travel"
                >Travel <span class="category-count">15</span></a
              >
            </li>
          </ul>
        </div> -->

        <!-- Tips Widget -->
        <div class="sidebar-widget">
          <h3 class="widget-title">Learning Tips</h3>
          <p class="learning-tips">
            Try to learn 5 new words each day and use them in sentences. This
            helps with retention and practical application.
          </p>
        </div>
      </aside>
    </section>

    <?php
    include 'assets/components/footer.php';
    ?>
  </div>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/vocabulary.js"></script>
</body>

</html>