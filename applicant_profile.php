<?php
// Connect to the database
include('db_connection.php');

// Get the logged-in applicant's ID (use the session or URL parameter)
$applicant_id = $_SESSION['applicant_id'];  // Adjust according to how you handle sessions

// Fetch the status for the logged-in applicant
$query = "SELECT status FROM applicants WHERE id = '$applicant_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Display the application status
echo "Your Application Status: " . $row['status'];

// Close the connection
mysqli_close($conn);
?>
