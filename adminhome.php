<?php
// admin_dashboard.php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
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
        <!-- <h4 class="text-center text-light">Admin Dashboard</h4> -->
        <a href="verify_application.php">View Applications</a>
        <!-- <a href="#">Add Courses</a> -->
        <!-- <a href="#">Application Status</a> -->
        <a href="merit_list.php">Merit List</a>
        <a href="add_course.php">Add Courses</a>
        <a href="add_notices.php">Add Notice</a>
        <a href="admin_view_queries.php">View Queries</a>
        <a href="#">Results</a>
        <a href="logout.php">Logout</a>
    </div>
    
    <!-- Main Content -->
    <!-- Main Content -->
<div class="main-content my-0">
    <h2 class="text-center fw-bold">Admin Dashboard</h2>
    
</div>

    <!-- Footer -->
    <!-- <footer>
        <p>&copy; 2024 Evergreen Institute of Technology. All Rights Reserved.</p>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>