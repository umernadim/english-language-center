<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About | Hope English Language Center</title>
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
    <!-- code for hero-section  -->
    <section id="B-hero-sec">
      <div class="about-header">
        <div class="inner-header flex">
          <div class="container">
            <h1>The Journey Behind Our Success</h1>
            <p>
              We believe learning English is more than grammar and vocabulary
              — it’s about confidence, communication, and connection. Our goal
              is to help students put forward their mind effortlessly and
              naturally in real-world situations.
            </p>
            <a href="#mission-vision" class="cta-button">Learn more</a>
          </div>
        </div>
        <?php
        include 'assets/components/banner.php';
        ?>

      </div>
    </section>

    <!-- Our Story Section -->
    <section id="mission-vision">
      <div class="mv-header">
        <h2>Our Mission & Vision</h2>
        <div class="underline"></div>
      </div>

      <div class="mv-container">
        <div class="mv-video">
          <video
            autoplay
            loop
            controls
            muted
            src="assets/videos/about-vdo.mp4"
            alt="about Hope English language center"></video>
        </div>
        <div class="mv-text">
          <p>
            <i class="ri-double-quotes-l quotes"></i> At Hope Language Center,
            our belief is that a language opens the door to a world of new
            opportunities, cultures, and connections. We aspire to provide
            high-quality, accessible language education that empowers
            individuals to communicate confidently in such an immensely
            connected world.
          </p>
          <p>
            We were founded in 2017, and since then, we have helped more than
            2,000 students to reach their goals in languages thanks to our
            innovative teaching methods, experienced instructors, and
            supportive learning environment.
          </p>
          <p>
            Our vision is to become the leading language education center in
            the region, loved for commitment to excellence and student
            success.
            <i class="ri-double-quotes-r quotes"></i>
          </p>
        </div>
      </div>
    </section>

    <!-- our values section  -->
    <section id="our-values">

      <h2>Our Core Values</h2>
      <div class="underline"></div>

      <div class="values-container">
        <!-- code is in Javascript  -->
      </div>
    </section>

    <!-- code for team members  -->
    <section id="our-team">

      <h2>Meet Our Team</h2>
      <div class="underline"></div>
      <p class="team-intro">
        <i class="ri-double-quotes-l quotes"></i>
        Our passionate and experienced instructors are the heart of Hope
        Language Center. They are dedicated to helping every student gain
        confidence and achieve fluency.
        <i class="ri-double-quotes-r quotes"></i>
      </p>

      <div class="team-container">
        <div class="team-card">
          <img src="assets/images/gallery/img1.jpg" alt="Instructor 1" />
          <h3>ABC Name</h3>
          <p class="role">Spoken English Instructor</p>
          <p class="desc">
            <i class="ri-double-quotes-l quotes"></i>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Distinctio quaerat odio veritatis.
            <i class="ri-double-quotes-r quotes"></i>
          </p>
        </div>

        <div class="team-card">
          <img src="assets/images/gallery/img1.jpg" alt="Instructor 3" />
          <h3>ABC Name</h3>
          <p class="role">IELTS Trainer</p>
          <p class="desc">
            <i class="ri-double-quotes-l quotes"></i>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias
            iste rem excepturi.
            <i class="ri-double-quotes-r quotes"></i>
          </p>
        </div>

        <div class="team-card">
          <img src="assets/images/gallery/img1.jpg" alt="Instructor 3" />
          <h3>ABC Name</h3>
          <p class="role">Creative Writing Coach</p>
          <p class="desc">
            <i class="ri-double-quotes-l quotes"></i>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi
            asperiores ratione voluptate.
            <i class="ri-double-quotes-r quotes"></i>
          </p>
        </div>

        <div class="team-card">
          <img src="assets/images/gallery/img1.jpg" alt="Instructor 4" />
          <h3>ABC Name</h3>
          <p class="role">Public Speaking Mentor</p>
          <p class="desc">
            <i class="ri-double-quotes-l quotes"></i>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi,
            aspernatur deserunt.
            <i class="ri-double-quotes-r quotes"></i>
          </p>
        </div>
      </div>
    </section>

    <!-- code for the achievement section  -->
    <section id="achievements">

      <div class="container">
        <h2>Our Achievements & Highlights</h2>
        <div class="underline"></div>

        <div class="achievements-grid">
           <?php
           include 'config.php';
           $sql = "SELECT * FROM achievements";
           $result = mysqli_query($connect, $sql);
           if (mysqli_num_rows($result)) {
            while($row = mysqli_fetch_assoc($result)){
          
           ?>
          <div class="achievement-card">
            <img
              src="<?php echo $row['image_url'] ?>"
              alt="Speech Contest"
              loading="lazy" />
            <div class="achievement-content">
              <h3><?php echo $row['title'] ?></h3>
              <p>
                <i class="ri-double-quotes-l quotes"></i> 
                <?php echo $row['description'] ?>
                <i class="ri-double-quotes-r quotes"></i>
              </p>
            </div>
          </div>
          <?php
            }
           }
          ?>

        </div>
      </div>
    </section>

    <!-- code for CTA section  -->
    <section id="join-journey">
      <div class="join-container">
        <h2>Join Our Journey</h2>
        <div class="underline"></div>
        <p>
          Become a part of <span>Hope English Language Center</span> and grow
          your confidence, communication, and future. Start learning with us
          today!
        </p>
        <a href="contact.php" class="cta-button">Contact us</a>
      </div>
    </section>

    <!-- code for the footer seciton  -->

    <?php
    include 'assets/components/footer.php';
    ?>
  </div>

  <script src="assets/js/script.js"></script>
  <script src="assets/js/about.js"></script>

</body>

</html>