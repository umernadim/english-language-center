<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hope English Language Center</title>
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!--Code for navbar -->
    <?php 
    include 'assets/components/navbar.php';
    ?>

    <div class="wrapper">
      <!-- code for hero section  -->
      <section id="hero-section">
        <img
          src="assets/images/carousel/img1.jpg"
          class="background-img desktop-img"
          style="opacity: 1"
          loading="lazy"
          alt="Celebration of English course completion"
        />
        <img
          src="assets/images/carousel/img2.jpg"
          class="background-img desktop-img"
          style="opacity: 0"
          loading="lazy"
          alt="Celebration of English course completion"
        />
        <img
          src="assets/images/carousel/img3.jpg"
          class="background-img desktop-img"
          style="opacity: 0"
          loading="lazy"
          alt="Celebration of English course completion"
        />
        <img
          src="assets/images/carousel/img4.jpg"
          class="background-img desktop-img"
          style="opacity: 0"
          loading="lazy"
          alt="Celebration of English course completion"
        />
        <img
          src="assets/images/carousel/img5.jpg"
          class="background-img desktop-img"
          style="opacity: 0"
          loading="lazy"
          alt="Celebration of English course completion"
        />
        <img
          src="assets/images/carousel/img6.jpg"
          class="background-img desktop-img"
          style="opacity: 0"
          loading="lazy"
          alt="Celebration of English course completion"
        />

        <img
          src="assets/images/carousel/img7.jpg"
          class="background-img mobile-img"
          style="opacity: 0"
          loading="lazy"
          alt="Teacher's giving motivational speech"
        />

        <img
          src="assets/images/carousel/img8.jpg"
          class="background-img mobile-img"
          style="opacity: 0"
          loading="lazy"
          alt="student is performing speech at Hope English language center"
        />
        <img
          src="assets/images/carousel/img9.jpg"
          class="background-img mobile-img"
          style="opacity: 0"
          loading="lazy"
          alt="student is performing speech at Hope English language center"
        />

        <img
          src="assets/images/carousel/img10.jpg"
          class="background-img mobile-img"
          style="opacity: 0"
          loading="lazy"
          alt="student is performing speech at Hope English language center"
        />
        <img
          src="assets/images/carousel/img11.jpg"
          class="background-img mobile-img"
          style="opacity: 0"
          loading="lazy"
          alt="student is performing speech at Hope language center"
        />

        <img
          src="assets/images/carousel/img12.jpg"
          class="background-img mobile-img"
          style="opacity: 0"
          loading="lazy"
          alt="Teacher's giving motivational speech"
        />

        <img
          src="assets/images/carousel/img13.jpg"
          class="background-img mobile-img"
          style="opacity: 0"
          loading="lazy"
          alt="Teacher's giving motivational speech"
        />

        <div class="text">
          <h2>Unlock Your Future with the Power of English.</h2>
          <p>
            <i class="ri-double-quotes-l quotes"></i>
            Join us at Hope English language center, where learning is an
            adventure. With our supportive community and personalized learning
            pathways, you will be amazed at how quickly you gain confidence and
            fluency. Join us today and unlock your full potential.
            <i class="ri-double-quotes-r quotes"></i>
          </p>
        </div>
      </section>

      <!-- Code for What you Learn section -->
      <section id="learn-section">
        <!-- Decorative elements -->
        <div class="decorative-circle circle-1"></div>
        <div class="decorative-circle circle-2"></div>
        <div class="section-header">
          <h2>What You'll Learn</h2>
          <div class="underline"></div>
          <p>
            Whether you're a beginner or improving your fluency — our course
            adjusts to your level.
          </p>
        </div>

        <div class="learn-cards">
          <!-- code is in javascript  -->
        </div>

        <div class="cta-btn-cont">
          <a href="courses.php" class="cta-button">Start your journey Today</a>
        </div>
      </section>

      <!-- code for level-test-section  -->
      <section class="test-sec-container">
        <section id="test-section">
          <!-- Decorative floating shapes -->
          <div class="floating-shape shape-1"></div>
          <div class="floating-shape shape-2"></div>

          <div class="section-header">
            <div class="target-icon">🎯</div>
            <div class="header-content">
              <h2>Find Your Level</h2>
              <p>
                Just take a quick 3-minute test to find the course that fits you
                best! You’ll get personalized recommendations based on your
                current language skills.
              </p>
            </div>
          </div>

          <div class="level-test-content">
            <div class="test-info">
              <p>
                Our smart assessment adjusts to your answers and helps you start
                learning at the level that’s right for you — no sign-up needed!
              </p>

              <ul class="test-features">
                <li>
                  <i class="ri-time-fill"></i> Only 3 minutes - 15 quick
                  questions
                </li>
                <li>
                  <i class="ri-line-chart-fill"></i> Adaptive testing for
                  accurate results
                </li>
                <li>
                  <i class="ri-graduation-cap-fill"></i> Personalized course
                  recommendations
                </li>
              </ul>

              <div class="level-badges">
                <div class="badge beginner">
                  <span class="badge-dot"></span>
                  Beginner (A1)
                </div>
                <div class="badge intermediate">
                  <span class="badge-dot"></span>
                  Intermediate (B1)
                </div>
                <div class="badge advanced">
                  <span class="badge-dot"></span>
                  Advanced (C1)
                </div>
                <div class="badge expert">
                  <span class="badge-dot"></span>
                  Expert (C2)
                </div>
              </div>
            </div>

            <div class="test-cta">
              <a href="quiz-cards.php" id="takeTest" class="test-button">
                <i class="ri-pencil-fill"></i> Take Level Test
              </a>
              <p style="margin-top: 15px; opacity: 0.8; font-size: 0.9rem">
                Free • No sign-up required
              </p>
            </div>
          </div>
        </section>
      </section>

      <!-- code for course section  -->
      <section id="course-section">
        <!-- Decorative elements -->
        <div class="decorative-circle circle-1"></div>
        <div class="decorative-circle circle-2"></div>

        <h2 class="section-title">Our Courses & Programs</h2>
        <div class="underline"></div>
        <p class="intro-text">
          Check out our thoughtfully designed courses that help you speak with
          confidence, think clearly, and lead with purpose. They're built to
          support real growth—both in learning and in life.
        </p>

        <div class="course-container">
          <!-- data is in javascript  -->
        </div>

        <div class="cta-btn-cont">
          <a href="courses.php" class="cta-button"
            >Explore All Courses <i class="ri-arrow-right-line"></i
          ></a>
        </div>
      </section>

      <!-- code for feature seciton  -->
      <section id="feature-section">
        <!-- Decorative elements -->
        <div class="decorative-dots dots-1"></div>
        <div class="decorative-dots dots-2"></div>

        <div class="container">
          <div class="section-title">
            <h2>Why Choose Our Institute</h2>
            <div class="underline"></div>
          </div>
          <div class="features-container">
            <!-- data is in javascript  -->
          </div>

          <div class="stats-container">
            <div class="stat-item">
              <div class="stat-number" data-count="15">0</div>
              <div class="stat-label">Expert Instructors</div>
            </div>
            <div class="stat-item">
              <div class="stat-number" data-count="3000">0</div>
              <div class="stat-label">Students Trained</div>
            </div>
            <div class="stat-item">
              <div class="stat-number" data-count="98">0</div>
              <div class="stat-label">Success Rate</div>
            </div>
            <div class="stat-item">
              <div class="stat-number" data-count="10">0</div>
              <div class="stat-label">Years Experience</div>
            </div>
          </div>
        </div>
      </section>

      <!-- code for the testimonial section  -->
      <section id="testimonial-sect">
        <h2>What Our Students Say</h2>
        <div class="underline"></div>
        <p class="subtitle">
          Hear from our learners about their experiences and growth with us.
        </p>

        <div class="tm-scroll-wrapper">
          <div class="tm-container">
            <div class="tm-card">
              <div class="tm-top">
                <img
                  src="https://i.pinimg.com/736x/2d/d5/a0/2dd5a0880d528f5fe704ebe825e503ee.jpg"
                  alt="Student photo"
                />
                <div class="intro">
                  <h4>ABC Name</h4>
                  <h5>Student</h5>
                </div>
              </div>
              <div class="tm-bottom">
                <p>
                  <i class="ri-double-quotes-l quotes"></i>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est,
                  ea quod earum cumque vel tenetur facilis obcaecati nemo
                  exercitationem eveniet facere deserunt tempora expedita
                  doloribus.
                  <i class="ri-double-quotes-r quotes"></i>
                </p>
              </div>
            </div>
            <div class="tm-card">
              <div class="tm-top">
                <img
                  src="https://i.pinimg.com/736x/2d/d5/a0/2dd5a0880d528f5fe704ebe825e503ee.jpg"
                  alt="Student photo"
                />
                <div class="intro">
                  <h4>ABC Name</h4>
                  <h5>Student</h5>
                </div>
              </div>
              <div class="tm-bottom">
                <p>
                  <i class="ri-double-quotes-l quotes"></i>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est,
                  ea quod earum cumque vel tenetur facilis obcaecati nemo
                  exercitationem eveniet facere deserunt tempora expedita
                  doloribus.
                  <i class="ri-double-quotes-r quotes"></i>
                </p>
              </div>
            </div>
            <div class="tm-card">
              <div class="tm-top">
                <img
                  src="https://i.pinimg.com/736x/2d/d5/a0/2dd5a0880d528f5fe704ebe825e503ee.jpg"
                  alt="Student photo"
                />
                <div class="intro">
                  <h4>ABC Name</h4>
                  <h5>Student</h5>
                </div>
              </div>
              <div class="tm-bottom">
                <p>
                  <i class="ri-double-quotes-l quotes"></i>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est,
                  ea quod earum cumque vel tenetur facilis obcaecati nemo
                  exercitationem eveniet facere deserunt tempora expedita
                  doloribus.
                  <i class="ri-double-quotes-r quotes"></i>
                </p>
              </div>
            </div>
            <div class="tm-card">
              <div class="tm-top">
                <img
                  src="https://i.pinimg.com/736x/2d/d5/a0/2dd5a0880d528f5fe704ebe825e503ee.jpg"
                  alt="Student photo"
                />
                <div class="intro">
                  <h4>ABC Name</h4>
                  <h5>Student</h5>
                </div>
              </div>
              <div class="tm-bottom">
                <p>
                  <i class="ri-double-quotes-l quotes"></i>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est,
                  ea quod earum cumque vel tenetur facilis obcaecati nemo
                  exercitationem eveniet facere deserunt tempora expedita
                  doloribus.
                  <i class="ri-double-quotes-r quotes"></i>
                </p>
              </div>
            </div>
            <div class="tm-card">
              <div class="tm-top">
                <img
                  src="https://i.pinimg.com/736x/2d/d5/a0/2dd5a0880d528f5fe704ebe825e503ee.jpg"
                  alt="Student photo"
                />
                <div class="intro">
                  <h4>ABC Name</h4>
                  <h5>Student</h5>
                </div>
              </div>
              <div class="tm-bottom">
                <p>
                  <i class="ri-double-quotes-l quotes"></i>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est,
                  ea quod earum cumque vel tenetur facilis obcaecati nemo
                  exercitationem eveniet facere deserunt tempora expedita
                  doloribus.
                  <i class="ri-double-quotes-r quotes"></i>
                </p>
              </div>
            </div>
            <div class="tm-card">
              <div class="tm-top">
                <img
                  src="https://i.pinimg.com/736x/2d/d5/a0/2dd5a0880d528f5fe704ebe825e503ee.jpg"
                  alt="Student photo"
                />
                <div class="intro">
                  <h4>ABC Name</h4>
                  <h5>Student</h5>
                </div>
              </div>
              <div class="tm-bottom">
                <p>
                  <i class="ri-double-quotes-l quotes"></i>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est,
                  ea quod earum cumque vel tenetur facilis obcaecati nemo
                  exercitationem eveniet facere deserunt tempora expedita
                  doloribus.
                  <i class="ri-double-quotes-r quotes"></i>
                </p>
              </div>
            </div>
            <div class="tm-card">
              <div class="tm-top">
                <img
                  src="https://i.pinimg.com/736x/2d/d5/a0/2dd5a0880d528f5fe704ebe825e503ee.jpg"
                  alt="Student photo"
                />
                <div class="intro">
                  <h4>ABC Name</h4>
                  <h5>Student</h5>
                </div>
              </div>
              <div class="tm-bottom">
                <p>
                  <i class="ri-double-quotes-l quotes"></i>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est,
                  ea quod earum cumque vel tenetur facilis obcaecati nemo
                  exercitationem eveniet facere deserunt tempora expedita
                  doloribus.
                  <i class="ri-double-quotes-r quotes"></i>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="scroll-hint">
          <i class="ri-arrow-left-s-line"></i>
          <span>Drag to see more</span>
          <i class="ri-arrow-right-s-line"></i>
        </div>
      </section>

      <!-- code for CTA section  -->
      <section id="join-journey">
        <div class="join-container">
          <h2>Ready to transform your English skills?</h2>
          <div class="underline"></div>
          <p>
            Join <span>Hope English Language Center</span> today and take the
            first step toward confidence, fluency, and a brighter future.
          </p>
          <a href="contact.php" class="cta-button">Contact us</a>
        </div>
      </section>

      <!-- code for footer section -->
        <?php 
    include 'assets/components/footer.php';
    ?>
      
    </div>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/home.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  </body>
</html>
