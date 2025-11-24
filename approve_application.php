<?php
include 'db_connection.php';

$id = $_GET['id'];
$query = "UPDATE admissionform  SET status = 'Approved' WHERE id = $id";

if (mysqli_query($conn, $query)) {
    echo "Application approved successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
