<?php
include 'db_connection.php';

$id = $_GET['id'];
$query = "UPDATE admissionform  SET status = 'Documents Verified' WHERE id = $id";

if (mysqli_query($conn, $query)) {
    echo "Documents verified successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
