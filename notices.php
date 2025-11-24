<?php
include 'db_connection.php';

// Fetch notices from the database
$stmt = $conn->prepare("SELECT * FROM notices ORDER BY date_created DESC");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .notice-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .notice-title {
            font-weight: bold;
            font-size: 1.25rem;
            color: #333;
        }
        .notice-date {
            color: #777;
            font-size: 0.9rem;
        }
        .notice-desc {
            font-size: 1rem;
            color: #555;
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
                        <a class="nav-link" href="index.php"> < Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container mt-4">
        <h1 class="text-center mb-4 fw-bold">All Notices</h1>
        
        <div id="notices-list">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="notice-card">
                        <div class="p-3">
                            <h2 class="notice-title"><?php echo htmlspecialchars($row['title']); ?></h2>
                            <p class="notice-date"><?php echo htmlspecialchars($row['date_created']); ?></p>
                            <p class="notice-desc"><?php echo htmlspecialchars($row['description']); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="alert alert-info">No notices available.</div>
            <?php endif; ?>
        </div>
    </div>

    <footer class="text-center py-3 mt-4 bg-light">
        <p class="mb-0">&copy; 2024 College Admission System. All rights reserved.</p>
    </footer>
</body>
</html>
