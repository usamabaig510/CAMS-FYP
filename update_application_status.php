<?php
session_start();
if (!isset($_SESSION['admin'])) {
    die("Unauthorized access.");
}

include 'db_connection.php';

// Check if the necessary form data is present
if (isset($_POST['id'], $_POST['action'])) {
    // Fetch the form data
    $id = $_POST['id'];         // Get the applicant ID
    $action = $_POST['action']; // Get the action (approve, reject, observation)
    $remarks = $_POST['remarks'] ?? ''; // Get the remarks (if provided, otherwise set as empty string)

    // Ensure the action is a valid one
    $valid_actions = ['approve', 'reject', 'observation']; // Define valid actions
    if (!in_array($action, $valid_actions)) {
        die("Invalid action"); // Stop if the action is not valid
    }

    // Define SQL queries based on the action
    if ($action == 'approve') {
        // Approve the application
        
        $stmt = $conn->prepare("UPDATE admissionform SET status = 'approved', remarks = ? WHERE id = ?");
        $stmt->bind_param("si", $remarks, $id); // Bind remarks as string and ID as integer
        $stmt->execute(); // Execute the query
        $stmt->close();  // Close the prepared statement
        header("Location: admin_dashboard.php?message=Application approved"); // Redirect with success message
    } elseif ($action == 'reject') {
        // Reject the application and save the rejection remarks
        $stmt = $conn->prepare("UPDATE admissionform SET status = 'rejected', remarks = ? WHERE id = ?");
        $stmt->bind_param("si", $remarks, $id); // Bind remarks as string and ID as integer
        $stmt->execute(); // Execute the query
        $stmt->close(); // Close the prepared statement
        header("Location: admin_dashboard.php?message=Application rejected with remarks"); // Redirect with rejection message
    } elseif ($action == 'observation') {
        // Mark the application as observation and save the observation remarks
        $stmt = $conn->prepare("UPDATE admissionform SET status = 'observation', remarks = ? WHERE id = ?");
        $stmt->bind_param("si", $remarks, $id); // Bind remarks as string and ID as integer
        $stmt->execute(); // Execute the query
        $stmt->close(); // Close the prepared statement
        header("Location: admin_dashboard.php?message=Observation added to application"); // Redirect with observation message
    }
} else {
    // If required form data is missing, show an error message
    die("Invalid request. Missing form data.");
}
?>
