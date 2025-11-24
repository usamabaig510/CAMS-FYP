<?php
// merit_list.php
// session_start();
// if (!isset($_SESSION['admin']) && !isset($_SESSION['applicant'])) {
//     header("Location: admin_login.php");
//     exit();
// }

include 'db_connection.php';

// Fetch approved applications
$stmt = $conn->prepare("SELECT id, first_name, last_name, father_name, degree_program FROM admissionform WHERE status = 'approved'");
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merit List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        h2 {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
    <!-- Navbar -->
    <?php
// Determine the back button destination based on the session
$backDestination = isset($_SESSION['admin']) ? 'adminhome.php' : (isset($_SESSION['applicant']) ? 'applicanthome.php' : 'indexpage.html');
?>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="indexpage.html">College Admission Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?php echo $backDestination; ?>"> < Back</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Merit List Section -->
    <div class="container mt-4">
        <h2 class="fw-bold">Merit List</h2>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Application ID</th>
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Course</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['father_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['degree_program']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                No approved applications found.
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p class="my-2">&copy; 2024 Evergreen Institute of Technology. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
