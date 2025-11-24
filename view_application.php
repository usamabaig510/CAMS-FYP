<?php

// view_application.php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connection.php';

$id = intval($_GET['id']); // Ensure $id is an integer

// Fetch application details securely
$stmt = $conn->prepare("SELECT * FROM admissionform WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Application not found.";
    exit();
}

$application = $result->fetch_assoc();







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
        h2{
            display:flex;
            justify-content:center;
        }
    </style>
</head>

<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">College Admission Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="admin_dashboard.php"> < Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<div class="container mt-3">
<h2>Application Details</h2>
    <div class="d-flex">
    <div class="col-md-6">
    <h4>Personal Information</h4>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($application['first_name'] . ' ' . $application['last_name']); ?></p>
        <p><strong>Father's Name:</strong> <?php echo htmlspecialchars($application['father_name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($application['email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($application['phone']); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($application['dob']); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($application['gender']); ?></p>
        <p><strong>CNIC:</strong> <?php echo htmlspecialchars($application['cnic']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($application['address']); ?></p>

    </div>
    <div class="col-md-6">
    <h4>Academic Information</h4>
        <p><strong>Degree Program:</strong> <?php echo htmlspecialchars($application['degree_program']); ?></p>
        <p><strong>Matric Marks:</strong> <?php echo htmlspecialchars($application['matric_obtained_marks'] . ' / ' . $application['matric_marks']); ?></p>
        <p><strong>Inter Marks:</strong> <?php echo htmlspecialchars($application['inter_obtained_marks'] . ' / ' . $application['inter_marks']); ?></p>

        <h4>Documents</h4>
<p><a href="download_document.php?id=<?php echo $application['id']; ?>&type=matric" target="_blank">Download Matric Certificate</a></p>
<p><a href="download_document.php?id=<?php echo $application['id']; ?>&type=inter" target="_blank">Download Inter Certificate</a></p>
    </div>


    </div>
        
        
        


        <!-- Back Button -->
        <a href="admin_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
    
    <!-- Footer
    <footer>
        <p>&copy; 2024 Evergreen Institute of Technology. All Rights Reserved.</p>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
