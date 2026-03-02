<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Hope English Language Center</title>

  <meta name="description" content="Get in touch with Hope English Language Center in Baldia Town, Karachi for course details, admissions, and spoken English classes." />

  <meta name="keywords" content="Contact English institute Karachi, English classes Baldia Town, language center Karachi" />

  <!-- Open Graph -->
  <meta property="og:title" content="Contact Hope English Language Center | Baldia Town, Karachi" />
  <meta property="og:description" content="Get in touch with Hope English Language Center for admissions, course details, and spoken English classes in Baldia Town, Karachi." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://yourwebsite.com/contact.php" />
  <meta property="og:image" content="https://yourwebsite.com/assets/images/carousel/img1.jpg" />
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
      <div class="contact-header">
        <div class="inner-header flex">
          <div class="container">
            <h1>Get In Touch With Us</h1>
            <p>
              Have questions about our courses or need assistance? We're here
              to help you on your language learning journey.
            </p>
          </div>
        </div>
        <!-- code for the SVG waves -->
        <?php
        include 'assets/components/banner.php';
        ?>
      </div>
    </section>

    <!-- code for contact details -->
    <section id="contact-page">
      <div class="contact-wrapper">
        <!-- contact form -->
        <div class="contact-form">
          <h2>Get in touch</h2>
          <p>
            Feel free to reach out for inquiries, feedback, or collaborations.
            We’d love to hear from you.
          </p>

          <form>
            <div class="form-grid">
              <div class="form-group">
                <label>Name</label>
                <input type="text" placeholder="Your full name" required />
              </div>

              <div class="form-group">
                <label>Email Address</label>
                <input
                  type="email"
                  placeholder="Your email address"
                  required />
              </div>
            </div>

            <div class="form-group full">
              <label>Message</label>
              <textarea
                rows="5"
                placeholder="Write your message..."
                required></textarea>
            </div>

            <button type="submit" class="submit-btn cta-button">
              <i class="ri-send-plane-line"></i> Send Message
            </button>
          </form>
        </div>

        <!-- contact details -->
        <div class="contact-info">
          <div class="info-item">
            <i class="ri-phone-line info-icon"></i>
            <div>
              <h4>Call Us</h4>
              <p>+92 345 8385764</p>
            </div>
          </div>

          <div class="info-item">
            <i class="ri-map-pin-line info-icon"></i>
            <div>
              <h4>Visit Us</h4>
              <p>
                Street No. 1, Sector 8c Sector 5 Baldia, Karachi, Pakistan
              </p>
            </div>
          </div>

          <div class="info-item">
            <i class="ri-mail-open-line info-icon"></i>
            <div>
              <h4>Email</h4>
              <p>Rashid.afridi2014@gmail.com</p>
            </div>
          </div>
        </div>
      </div>

      <!-- MAP -->
      <div class="map-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.401774974416!2d66.96144927367138!3d24.918379342940717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb315e5e3656fc5%3A0x7867d98b383866a8!2sHope%20english%20language%20center%20Baldia!5e0!3m2!1sen!2s!4v1760458356775!5m2!1sen!2s"
          width="100%"
          height="300"
          style="border: 0"
          allowfullscreen=""
          loading="lazy">
        </iframe>
      </div>
    </section>

    <?php
    include 'assets/components/footer.php';
    ?>

  </div>
  <script src="assets/js/script.js"></script>
</body>

</html>