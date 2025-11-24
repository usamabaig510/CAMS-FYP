
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Portal - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    
</head>

<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">College Admission Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
    <?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    // Validate name
    if (empty($_POST['name'])) {
        $errors[] = "Name is required.";
    } else {
        $username = $_POST['name'];
    }

    // Validate email
    if (empty($_POST['email'])) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    } else {
        $email = $_POST['email'];
    }

    // Validate phone
    if (empty($_POST['phone'])) {
        $errors[] = "Phone number is required.";
    } else {
        $phone = $_POST['phone'];
    }

    // Validate address
    if (empty($_POST['address'])) {
        $errors[] = "Address is required.";
    } else {
        $address = $_POST['address'];
    }

    // Validate password
    if (empty($_POST['password'])) {
        $errors[] = "Password is required.";
    } else {
        // yeh code with harry php mein bhi yeh concept kiya tha password hashed and password default wala 
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    // If there are no validation errors
    if (empty($errors)) {
        // Check if the email is already registered
        $sql = "SELECT * FROM register WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> This email is already registered.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            // Insert the data into the database
            $sql = "INSERT INTO `register` (`name`, `email`, `password`, `phone`, `address`) 
                    VALUES ('$username', '$email', '$password', '$phone', '$address')";

            if (mysqli_query($conn, $sql)) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulations!</strong> Registration Successful.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Registration failed. ' . mysqli_error($conn) . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> ' . $error . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }
}
?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        <!-- Form Start -->
                        <form action="register.php" method="POST">
                            <div class="form-group mb-1">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" maxlength="11" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>

                            <div class="card-footer text-center">
                        <a href="login.php">Already have an account? Login</a>
                    </div>
                        </form>
                        <!-- Form End -->
                        
                    </div>
                    <div class="card-footer text-center">
                        <a href="login.php">Already have an account? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-4">
        <p>&copy; 2024 Evergreen Institute of Technology. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
