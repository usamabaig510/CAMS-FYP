<?php
// session_start();
// if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
//     header("Location: admin_login.php");
//     exit;
// }

include 'db_connection.php';

// Initialize message variable
$message = '';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['course_title'];
    $description = $_POST['course_description'];

    // Insert into the database
    $stmt = $conn->prepare("INSERT INTO courses (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> New course has been added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        $stmt->close();
    } else {
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Could not add the course. Please try again.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courses</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
                        <a class="nav-link" href="adminhome.php"> < Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>






    <div class="container mt-4">
        <h2 class="mb-4 text-center fw-bold">Add New Course</h2>

        <!-- Display success or error message -->
        <?php echo $message; ?>

        <!-- Form to Add Course -->
        <form method="POST" action="add_course.php">
            <div class="mb-3">
                <label for="course_title" class="form-label">Course Title</label>
                <input type="text" class="form-control" id="course_title" name="course_title" placeholder="Enter course title" required>
            </div>

            <div class="mb-3">
                <label for="course_description" class="form-label">Course Description</label>
                <textarea class="form-control" id="course_description" name="course_description" rows="4" placeholder="Enter course description" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Course</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
