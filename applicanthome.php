<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Portal - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
    .btn-verify {
        background-color: #272663;
        /* Bootstrap gray color */
        color: #ffffff;
    }

      /* Sidebar styling */
      .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #27263c;
            position: fixed;
            top: 56px; /* Adjusted to prevent overlap with the navbar */
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: #ffffff;
            padding: 15px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #575768;
            text-decoration: none;
        }

        .sidebar .active {
            background-color: #454554;
        }

        /* Main content styling */
        .main-content {
            margin-left: 250px; /* Adjust this to match the sidebar width */
            margin-top: 20px; /* Space for the navbar */
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="indexpage.html">College Admission Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- <h4 class="text-center text-light">User Dashboard</h4> -->
        <a href="profile.php">Profile</a>
        <a href="admissionform.php">Admission Form</a>
        <!-- <a href="applicationstatus.php">View Application Status</a> -->
        <a href="view_my_applications.php">View Application Status</a>

        <a href="merit_list.php">Merit List</a>
        <a href="courses.php">Courses</a>
        <a href="lecture_schedule.php">Lecture Shedule</a>
        <a href="gradebook.php">Grade Book</a>
        <a href="accountbook.php">Account Book</a>
        
        <a href="logout.php">Logout</a>
    </div>
    
    <!-- Main Content -->
    <!-- Main Content -->
<div class="main-content my-0">
    <h2 class="text-center fw-bold">Applicant Dashboard</h2>
    <p class="text-center">Welcome, <?php echo $_SESSION['name']; ?>!</p> <!-- Displaying the username applicant ka -->
    <p class="text-center">You have not applied for addmission.Please fill the admission form.</p>
    <div class="d-flex justify-content-center">
    <a href="admissionform.php" class="btn btn-primary btn-lg mt-3">Click to Apply</a>
</div>
    
    
    
</div>

    <!-- Footer -->
    <!-- <footer class="text-center mt-5">
        <p class="my-2">&copy; 2024 Evergreen Institute of Technology. All Rights Reserved.</p>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>