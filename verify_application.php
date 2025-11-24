<?php
// admin_dashboard.php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connection.php';

$stmt = $conn->prepare("SELECT * FROM admissionform");
$stmt->execute();
$result = $stmt->get_result();

// At the top of the file
$message = '';
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script>
        function confirmAction(message) {
            return confirm(message);
        }

        function showRejectModal(id) {
            document.getElementById('rejectModalId').value = id;
            new bootstrap.Modal(document.getElementById('rejectModal')).show();
        }
    </script>
    <style>
        h2 {
            display: flex;
            justify-content: center;
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
                        <a class="nav-link" href="adminhome.php"> < Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Success/ Error Message -->
    <?php if ($message): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>


    <div class="my-4"><h2 class="fw-bold">Applications</h2></div>
    
    <!-- Main Content -->
    <div class="container mt-3">
        
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Applicant</th>
                    <th>Degree Program</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['degree_program']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td>
                        <a href="view_application.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View Details</a>
                        <!-- Approve Form -->
                        <form action="update_application_status.php" method="post" style="display:inline-block;" onsubmit="return confirmAction('Are you sure you want to approve this application?');">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="action" value="approve">
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <!-- Reject Form Trigger -->
                        <button type="button" class="btn btn-danger" onclick="showRejectModal(<?php echo $row['id']; ?>)">Reject</button>
                        <!-- Verify Documents Form -->
                        <form action="update_application_status.php" method="post" style="display:inline-block;" onsubmit="return confirmAction('Are you sure you want to verify the documents for this application?');">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="action" value="verify_documents">
                            <button type="submit" class="btn btn-warning">Observation</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <!-- <footer>
        <p>&copy; 2024 Evergreen Institute of Technology. All Rights Reserved.</p>
    </footer> -->

    <!-- Reject Modal -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reject Application</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="update_application_status.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="rejectModalId">
                        <input type="hidden" name="action" value="reject">
                        <div class="mb-3">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea class="form-control" id="remarks" name="remarks" rows="3" required></textarea>
                        </div>
                        <p>Are you sure you want to reject this application?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
