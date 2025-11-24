<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Portal - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        .carousel-img {
      width: 100%;
      /* Make the image fill the container's width */
      height: 500px;
      /* Set a fixed height for the images */
      object-fit: cover;
      /* Ensures the image covers the container without stretching */
    }
    </style>
    
    
</head>
<body>
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="courses.php">Courses</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="notices.php">Notices</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_login.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login/Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<!-- slider/crousal start  -->

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
     
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active carousel-img">
        <img src="bimg/1.jpg" class="d-block w-100" alt="...">

      </div>
      <div class="carousel-item carousel-img">
        <img src="bimg/2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item carousel-img">
        <img src="bimg/6.jpg" class="d-block w-100" alt="...">

      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    
  </div>
  <!-- slider/crousal end  -->





   
    <!-- Main Content -->
    <div class="container text-center mt-2">
        <h1 class="lead fs-1 fw-bold">Welcome to Collage Admission Management System Portal</h1>
        <p>Apply through this portal easily through our online application portal.
            Our system allows you to submit your application, upload required documents,
            and track your application status online.</p>
        <a href="login.php" class="btn btn-primary btn-lg mt-3">Click to Apply</a>
    </div>

      <!-- coursal element start  -->
 <div class="container my-5  fabt">
        <div class="row featurette d-flex justify-content-center align-items-center">
        
            <div class="col-md-7">
                
                <h2 class="fw-bold">About CAMS</h2>
                <p class="lead">College Admissions Management System (CAMS) is built to provide easy, convenient, efficient and reliable access to students for Bachelors and Intermediate admissions in the public colleges of Punjab. Colleges will offer programs (BS, ADP, ICS, F.A, FSC etc) to the students. Key features: 24/7 availability. One can apply from any place with internet access by logging online Nominal application fee (Rs 25 per programme), paid via a network of bank branches across the country Admissions application tracking via OCAS website Integration with BISE results, minimizing data entry and reducing errors Dedicated helpline and online help guides to facilitate students.</p>
            </div>
            
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded" src="bimg/6.jpg" width="500px" alt="">
            </div>
        </div>
    </div>




<!-- Content Section -->
    <div class="container content-section">

 <div class="row ">
            <div class="col-md-6">
                <img src="bimg/ourmission.jpg" alt="Our Mission" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold">Our Mission</h2>
                <p class="lead">
                Our mission is to transform the admission process by leveraging cutting-edge technology. We are dedicated to empowering students to pursue their aspirations seamlessly while enabling colleges and universities to manage admissions with unparalleled efficiency and ease. Through innovation and commitment, we aim to bridge the gap between students and their educational goals, fostering a future of opportunities.
                </p>
            </div>
        </div>




 <div class="row my-5">
            <div class="col-md-6">
                <h2 class="fw-bold">Who We Are</h2>
                <p class="lead">
                    Welcome to the College Admission Management System, your one-stop solution for managing the college admission process efficiently and effectively. 
                    We aim to bridge the gap between students and educational institutions by providing a streamlined platform for application submissions, document verification, merit list generation, and application tracking.
                </p>
            </div>
            <div class="col-md-6">
                <img src="bimg/weare.jpg" alt="About Us" class="img-fluid rounded" >
            </div>
        </div>
</div>

    <!-- Footer -->
    <!-- <footer>
        <p class="py-2">&copy; 2024 Evergreen Institute of Technology. All Rights Reserved.</p>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
