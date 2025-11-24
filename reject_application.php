<?php
include 'db_connection.php';

$id = $_GET['id'];
$query = "UPDATE admissionform  SET status = 'Rejected' WHERE id = $id";

if (mysqli_query($conn, $query)) {
    echo "Application rejected successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
