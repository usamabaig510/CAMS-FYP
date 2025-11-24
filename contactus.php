<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    .contact-header {
      margin-top: 20px;
      text-align: center;
    }
    .contact-form {
      background: #f8f9fa;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .submit-btn {
      background-color: #007bff;
      color: #fff;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">College Admission Management System</a>
    </div>
  </nav> -->


  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="indexpage.html">College Admission Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"> < Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>







  <div class="contact-header">
        <h1 class="fw-bold">Contact Us</h1>
        <p>We’re here to assist you. Fill out the form below to reach us.</p>
    </div>

   



  <!-- Contact Us Section -->
  <div class="container my-5">
  <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
    <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
        Your message has been sent successfully. We will get back to you soon!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<div class="row justify-content-center mt-4">
      <div class="col-md-8">
        <div class="contact-form">
          <form action="contact_us_process.php" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Your Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Your Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required maxlength="11">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message here" required></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn submit-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <!-- <footer class="text-center py-3 mt-4 bg-light">
    <p class="mb-0">&copy; 2024 College Admission Management System. All Rights Reserved.</p>
  </footer> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
