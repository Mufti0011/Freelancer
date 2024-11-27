<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email configurations
    $admin_email = "youradminemail@example.com"; // Your email address
    $subject_to_admin = "New Contact Form Submission";
    $subject_to_sender = "Thank you for contacting us!";

    // Message for the admin
    $message_to_admin = "
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Message:</strong><br>$message</p>
    ";

    // Message for the sender
    $message_to_sender = "
    <h2>Thank you, $name!</h2>
    <p>We have received your message and will get back to you as soon as possible.</p>
    <p><strong>Your Message:</strong><br>$message</p>
    <p>Best regards,<br>Your Company</p>
    ";

    // Email headers for the admin email
    $headers_admin = "MIME-Version: 1.0" . "\r\n";
    $headers_admin .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers_admin .= "From: $email" . "\r\n";

    // Email headers for the sender email
    $headers_sender = "MIME-Version: 1.0" . "\r\n";
    $headers_sender .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers_sender .= "From: $admin_email" . "\r\n";

    // Send email to admin
    $admin_mail_sent = mail($admin_email, $subject_to_admin, $message_to_admin, $headers_admin);

    // Send confirmation email to sender
    $sender_mail_sent = mail($email, $subject_to_sender, $message_to_sender, $headers_sender);

    // Redirect user with success or failure message
    if ($admin_mail_sent && $sender_mail_sent) {
        echo json_encode(["status" => "success", "message" => "Message sent successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to send your message. Please try again later."]);
    }
// } else {
//     echo json_encode(["status" => "error", "message" => "Invalid request method."]);
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Freelancer Portfolio</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
  rel="stylesheet"
  />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">MyLogo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <a href="https://wa.me/1234567890" target="_blank" class="btn btn-success">Hire Me</a>
      </div>
    </div>
  </nav>

  <!-- Home Page Slider -->
  <header id="home">
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./images/code.jpeg" class="d-block w-100" alt="Welcome Slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>Welcome to My Portfolio</h1>
            <p>Creative Solutions for Your Ideas</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./images/stateov ai.jpg" class="d-block w-100" alt="Web Development Slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>Professional Web Development</h1>
            <p>Turning Your Vision into Reality</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./images/stateov ai.jpg" class="d-block w-100" alt="Work Together Slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>Let's Work Together</h1>
            <p>Delivering Excellence Every Time</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#slider" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#slider" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </header>
  
  

  <!-- About Section -->
  <section id="about" class="about-section">
    <div class="container">
      <h1 class="text-center mb-4">About Me</h1>
      <p class="text-center mb-5">I am a passionate Front-End Developer dedicated to building user-friendly and engaging web experiences.</p>
  
      <div class="row">
        <!-- Left Section: Image and Get to Know Me -->
        <div class="col-md-6 text-center">
          <img src="./images/geretrte44.JPG" alt="Profile Picture" class="profile-img mb-4">
          <h2>Get to Know Me</h2>
          <p>
            I'm a Frontend Focused Web Developer building and managing the Front-end of Websites and Web Applications that lead to the success of the overall product. I have several years of experience developing responsive and dynamic websites using modern tools and technologies.
          </p>
          <p>
            I'm always exploring new ideas and techniques to enhance my skills and contribute to the web development community. I love creating solutions that bridge design and functionality seamlessly.
          </p>
        </div>
  
        <!-- Right Section: My Skills -->
        <div class="col-md-6 skills-container">
          <h2>My Skills</h2>
          <div class="skills-grid">
            <div class="skill-item">HTML</div>
            <div class="skill-item">CSS</div>
            <div class="skill-item">JavaScript</div>
            <div class="skill-item">PHP</div>
            <div class="skill-item">GIT</div>
            <div class="skill-item">GitHub</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <!-- Portfolio Section -->
  <section id="projects" class="portfolio-section">
    <div class="container">
      <!-- Header Section -->
      <h1 class="text-center mb-3">PROJECTS</h1>
      <div class="title-underline text-center mb-4"></div>
      <p class="text-center mb-5">
        Here you will find some of the personal and clients' projects that I created, 
        each containing its own case study.
      </p>
  
      <!-- Projects Section -->
      <div class="row">
        <!-- Project 1 -->
        <div class="col-md-4 mb-4">
          <div class="project-card">
            <img src="./images/code.jpeg" alt="Project 1" class="img-fluid">
            <div class="project-content">
              <h3 class="project-title">Project One</h3>
              <p class="project-description">
                A responsive e-commerce website built with modern technologies. Includes features such as product catalogs, cart management, and payment integration.
              </p>
            </div>
          </div>
        </div>
  
        <!-- Project 2 -->
        <div class="col-md-4 mb-4">
          <div class="project-card">
            <img src="./images/code.jpeg" alt="Project 2" class="img-fluid">
            <div class="project-content">
              <h3 class="project-title">Project Two</h3>
              <p class="project-description">
                A portfolio website showcasing creative designs and case studies. Developed with HTML, CSS, JavaScript, and optimized for speed and SEO.
              </p>
            </div>
          </div>
        </div>
  
        <!-- Project 3 -->
        <div class="col-md-4 mb-4">
          <div class="project-card">
            <img src="./images/code.jpeg" alt="Project 3" class="img-fluid">
            <div class="project-content">
              <h3 class="project-title">Project Three</h3>
              <p class="project-description">
                A dynamic blog platform where users can create, edit, and share posts. Built with PHP, MySQL, and responsive design for all devices.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <!-- Contact Section -->
  <form id="contactForm" action="contact.php" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" required />
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" required />
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
  </form>
  <div id="responseMessage" class="mt-3"></div>
  <!-- section end -->

  <!-- footer -->
  <footer class="footer-section bg-dark text-white py-4">
  <div class="container">
    <div class="row text-center">
      <!-- Social Media Icons -->
      <div class="col-12 mb-3">
        <a href="https://www.facebook.com/yourprofile" target="_blank" class="social-icon mx-2">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.linkedin.com/in/yourprofile" target="_blank" class="social-icon mx-2">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="https://twitter.com/yourprofile" target="_blank" class="social-icon mx-2">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://discord.com/invite/yourprofile" target="_blank" class="social-icon mx-2">
          <i class="fab fa-discord"></i>
        </a>
      </div>

      <!-- Copyright -->
      <div class="col-12">
        <p class="mb-0">&copy; 2024 Muftawu Suhuyini. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JS Ajex -->
   <script src="./script.js"></script>
</body>
</html>

