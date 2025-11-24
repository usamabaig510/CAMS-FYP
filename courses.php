<?php
include 'db_connection.php';

// Fetch all courses from the database
$query = "SELECT * FROM courses";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Our Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        .course-card {
            background-color: #ffd700;
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .course-title {
            background-color: #00264d;
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: bold;
        }
        .course-description {
            padding: 15px;
            background-color: #004080;
            color: white;
            text-align: center;
        }
        .fabt{
font-weight:bold;
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
                        <a class="nav-link" href="applicanthome.php"> < Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>






    <h2 class="text-center fabt my-4">See Our Courses</h2>
<div class="container ">
    <!-- <h2 class="text-center my-4">See Our Courses</h2> -->
    <div class="row">
        <?php while ($course = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="course-card">
                    <div class="course-title"><?php echo htmlspecialchars($course['title']); ?></div>
                    <div class="course-description"><?php echo htmlspecialchars($course['description']); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
