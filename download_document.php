<?php

// download_document.php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connection.php';

$doc_type = $_GET['type']; // 'matric' or 'inter'
$id = intval($_GET['id']);

// Fetch application
$stmt = $conn->prepare("SELECT * FROM admissionform WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Application not found.";
    exit();
}

$application = $result->fetch_assoc();

if ($doc_type == 'matric') {
    $file_path = $application['matric_certificate'];
} elseif ($doc_type == 'inter') {
    $file_path = $application['inter_certificate'];
} else {
    echo "Invalid document type.";
    exit();
}

// Serve the file
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
readfile($file_path);
exit();










?>