<?php
// Connect to your database
include('db_connection.php');

// Function to calculate the merit score
function calculateMerit($matric_obtained, $matric_total, $inter_obtained, $inter_total) {
    $matric_percentage = ($matric_obtained / $matric_total) * 100;
    $inter_percentage = ($inter_obtained / $inter_total) * 100;
    return ($matric_percentage + $inter_percentage) / 2;  // Average of both
}

// Fetch all applicants
$query = "SELECT * FROM applicants"; 
$result = mysqli_query($conn, $query);

// Loop through applicants and calculate merit score
while ($row = mysqli_fetch_assoc($result)) {
    $merit_score = calculateMerit($row['matric_obtained_marks'], 1000, $row['inter_obtained_marks'], 1100);
    
    // Update the database with the calculated merit score
    $update_query = "UPDATE applicants SET merit_score = '$merit_score' WHERE id = '".$row['id']."'";
    mysqli_query($conn, $update_query);
}

// Close the connection
mysqli_close($conn);

echo "Merit scores updated successfully!";
?>
