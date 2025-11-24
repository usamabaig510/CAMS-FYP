

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        footer {
            padding: 0px 0;
        }
        h3 {
            display: flex;
            justify-content: center;
        }
        .card-header {
            background-color: #084b91 !important;
            color: white;
        }
        .card-header h4 {
        color: white; /* Ensures the headings inside card headers are white */
    }
        .btn-primary {
            background-color: #084b91;
            border-color: #36454F;
        }
        form {
            margin-bottom: 13px;
        }
    </style>

    <!-- javascript validation for total marks is not greater then the obtained marks -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        form.addEventListener("submit", function (event) {
            const matricMarks = parseInt(document.getElementById("matricMarks").value, 10);
            const matricObtainedMarks = parseInt(document.getElementById("matricObtainedMarks").value, 10);
            const interMarks = parseInt(document.getElementById("interMarks").value, 10);
            const interObtainedMarks = parseInt(document.getElementById("interObtainedMarks").value, 10);

            let valid = true;

            if (matricObtainedMarks > matricMarks) {
                alert("Matric obtained marks cannot be greater than total marks.");
                valid = false;
            }

            if (interObtainedMarks > interMarks) {
                alert("Intermediate obtained marks cannot be greater than total marks.");
                valid = false;
            }

            if (!valid) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    });
</script>

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
                        <a class="nav-link" href="applicanthome.php"> < Back </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-4">
    <?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include 'db_connection.php';

// Start the session
session_start();

// Check if the user is logged in and has an ID
if (!isset($_SESSION['id'])) {
    echo 'User not logged in.';
    exit();
}

$user_id = $_SESSION['id'];

// Fetch user details from the database
$sql = "SELECT * FROM register WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo 'User details not found.';
    exit();
}


// Initialize variables to avoid undefined warnings
$matricMarks = $matricObtainedMarks = $interMarks = $interObtainedMarks = '';
$matricError = $interError = ''; // Variables to store error messages
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input data
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $fatherName = mysqli_real_escape_string($conn, $_POST['fatherName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $cnic = mysqli_real_escape_string($conn, $_POST['cnic']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $degreeProgram = mysqli_real_escape_string($conn, $_POST['degreeProgram']);
    $matricMarks = mysqli_real_escape_string($conn, $_POST['matricMarks']);
    $matricObtainedMarks = mysqli_real_escape_string($conn, $_POST['matricObtainedMarks']);
    $interMarks = mysqli_real_escape_string($conn, $_POST['interMarks']);
    $interObtainedMarks = mysqli_real_escape_string($conn, $_POST['interObtainedMarks']);

    // Define allowed file types and size
    $allowed_types = ['application/pdf', 'image/jpeg', 'image/png'];
    $max_size = 5 * 1024 * 1024; // 5MB
    $uploadDir = 'uploads/';

    // Handle file uploads
    $matricCertificate = $uploadDir . basename($_FILES['matricCertificate']['name']);
    $interCertificate = $uploadDir . basename($_FILES['interCertificate']['name']);

    // Move uploaded files
    if (in_array($_FILES['matricCertificate']['type'], $allowed_types) && $_FILES['matricCertificate']['size'] <= $max_size) {
        move_uploaded_file($_FILES['matricCertificate']['tmp_name'], $matricCertificate);
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Matric certificate file type or size not allowed.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        exit();
    }

    if (in_array($_FILES['interCertificate']['type'], $allowed_types) && $_FILES['interCertificate']['size'] <= $max_size) {
        move_uploaded_file($_FILES['interCertificate']['tmp_name'], $interCertificate);
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Intermediate certificate file type or size not allowed.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        exit();
    }

    // Insert data into the database
    $sql = "INSERT INTO admissionform (user_id, first_name, last_name, father_name, email, phone, dob, gender, cnic, address, degree_program, matric_marks, matric_obtained_marks, matric_certificate, inter_marks, inter_obtained_marks, inter_certificate, status, created_at) 
    VALUES ('$user_id', '$firstName', '$lastName', '$fatherName', '$email', '$phone', '$dob', '$gender', '$cnic', '$address', '$degreeProgram', '$matricMarks', '$matricObtainedMarks', '$matricCertificate', '$interMarks', '$interObtainedMarks', '$interCertificate', 'pending', current_timestamp())";
    

    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Application submitted successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


// Check if obtained marks are not greater than total marks
if ($matricObtainedMarks > $matricMarks) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Matric obtained marks cannot be greater than total marks.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    exit();
}

if ($interObtainedMarks > $interMarks) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Intermediate obtained marks cannot be greater than total marks.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    exit();
}


?>



<h3>Admission Form</h3>
        <div class="card">
            <div class="card-header">
                <h4>Personal Information</h4>
            </div>
            <div class="card-body">
            <div class="card-body">
                <form action="admissionform.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fatherName" class="form-label">Father's Name</label>
                            <input type="text" class="form-control" id="fatherName" name="fatherName" placeholder="Enter your father's name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" placeholder="Enter your phone number" maxlength="11" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" max="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="cnic" class="form-label">CNIC <small>(without dashes)</small></label>
                            <input type="text" class="form-control" id="cnic" name="cnic" placeholder="Enter your CNIC" maxlength="13" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <input class="form-control" id="address" name="address" rows="3" value="<?php echo htmlspecialchars($user['address']); ?>" placeholder="Enter your address" required>
                        </div>
                    </div>


</div>


<div class="card ">
            <div class="card-header">
                <h4>Academic Details</h4>
            </div>
            <div class="card-body">

            <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="degreeProgram" class="form-label">Degree Program</label>
                            <select class="form-select" id="degreeProgram" name="degreeProgram" required>
                                <!-- <option value="BSIT">BSIT</option>
                                <option value="BSCS">BSCS</option> -->
                                <option selected>Select Degree Program</option>
                                <option value="BS Software Engineering">BS Software Engineering(SE)</option>
                                <option value="BS Information Technology">BS Information Technology(IT)</option>
                                <option value="BS Computer Science">BS Computer Science(CS)</option>
                                <option value="BS Mass Comunication">BS Mass Comunication</option>
                                <option value="BS Bio Technology">BS Bio Technology</option>
                                <option value="BS Math">BS Math</option>
                                <!-- Add more programs as needed -->
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="matricMarks" class="form-label">Matriculation Total Marks</label>
                            <input type="number" class="form-control" id="matricMarks" name="matricMarks" placeholder="Enter total marks" maxlength="5" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="matricObtainedMarks" class="form-label">Matriculation Obtained Marks</label>
                            <input type="number" class="form-control" id="matricObtainedMarks" name="matricObtainedMarks" placeholder="Enter obtained marks" maxlength="5" required>
                        </div>
                        <div class="col-md-6">
                            <label for="matricCertificate" class="form-label">Matriculation Certificate (PDF/JPG/PNG)</label>
                            <input type="file" class="form-control" id="matricCertificate" name="matricCertificate" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="interMarks" class="form-label">Intermediate Total Marks</label>
                            <input type="number" class="form-control" id="interMarks" name="interMarks" placeholder="Enter total marks" maxlength="5" required>
                        </div>
                        <div class="col-md-6">
                            <label for="interObtainedMarks" class="form-label">Intermediate Obtained Marks</label>
                            <input type="number" class="form-control" id="interObtainedMarks" name="interObtainedMarks" placeholder="Enter obtained marks" maxlength="5" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="interCertificate" class="form-label">Intermediate Certificate (PDF/JPG/PNG)</label>
                            <input type="file" class="form-control" id="interCertificate" name="interCertificate" accept=".pdf,.jpg,.jpeg,.png" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

</div>



    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
