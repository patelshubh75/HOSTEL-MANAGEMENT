<?php

session_start();
require_once 'config/database.php';

$error = "";
$success = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $enrollment_no = mysqli_real_escape_string($conn, trim($_POST['enrollment_no']));
    $course = mysqli_real_escape_string($conn, trim($_POST['course']));
    $semester = mysqli_real_escape_string($conn, trim($_POST['semester']));
    $mobile = mysqli_real_escape_string($conn, trim($_POST['mobile']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Input validation
    if(empty($name) || empty($enrollment_no) || empty($course) || empty($semester) || 
       empty($mobile) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required";
    } elseif(!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = "Name should only contain letters and spaces";
    } elseif(strlen($enrollment_no) < 5 || strlen($enrollment_no) > 20) {
        $error = "Enrollment number must be between 5-20 characters";
    } elseif(!preg_match("/^[0-9]{10}$/", $mobile)) {
        $error = "Mobile number must be exactly 10 digits";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } elseif(strlen($password) < 6) {
        $error = "Password must be at least 6 characters long";
    } elseif($password !== $confirm_password) {
        $error = "Passwords do not match";
    } else {
        // Check for duplicate enrollment number
        $check_enrollment = mysqli_query($conn, "SELECT id FROM students WHERE enrollment_no = '$enrollment_no'");
        if(mysqli_num_rows($check_enrollment) > 0) {
            $error = "Enrollment number already registered";
        } else {
            // Check for duplicate email
            $check_email = mysqli_query($conn, "SELECT id FROM students WHERE email = '$email'");
            if(mysqli_num_rows($check_email) > 0) {
                $error = "Email already registered";
            } else {
                // Hash the password securely
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert student data into database
                $query = "INSERT INTO students (name, enrollment_no, course, semester, mobile, email, password, room_no) 
                          VALUES ('$name', '$enrollment_no', '$course', '$semester', '$mobile', '$email', '$hashed_password', NULL)";
                
                $result = mysqli_query($conn, $query);
                
                if($result) {
                    $success = "Registration successful! Redirecting to login...";
                    // Redirect to login page after 2 seconds
                    header("refresh:2;url=login.php");
                } else {
                    $error = "Registration failed: " . mysqli_error($conn);
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Registration | K.D Hostel Management System</title>


<!-- Bootstrap CSS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Font Awesome -->

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


<!-- CSS -->

<link rel="stylesheet" href="css/style.css">


</head>


<body class="bg-light">



<!-- Navbar -->

<nav class="navbar navbar-dark bg-primary shadow">

<div class="container">


<a class="navbar-brand d-flex align-items-center" href="index.php">


<i class="fa-solid fa-building fa-2x text-white me-3"></i>


<div>

<h5 class="mb-0 fw-bold text-white">

K.D Polytechnic Hostel Patan

</h5>

<small class="text-white">

Management System

</small>

</div>


</a>



</div>

</nav>




<!-- Registration Section -->


<section class="container py-5">


<div class="row justify-content-center">


<div class="col-md-6">



<div class="card shadow p-4">



<div class="text-center mb-4">


<i class="fa-solid fa-user-plus fa-3x text-primary"></i>


<h2 class="mt-3 text-primary fw-bold">

Student Registration

</h2>


<p>

K.D Hostel Management System

</p>


</div>



<?php if(isset($error) && $error != ""): ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<?php if(isset($success) && $success != ""): ?>
<div class="alert alert-success"><?php echo $success; ?></div>
<?php endif; ?>



<form method="POST" action="">


<!-- Name -->

<div class="mb-3">

<label class="form-label">

Full Name

</label>


<div class="input-group">


<span class="input-group-text">

<i class="fa fa-user"></i>

</span>


<input type="text"
name="name"
class="form-control"
placeholder="Enter Full Name"
required
pattern="[a-zA-Z ]+"
title="Name should only contain letters and spaces">


</div>


</div>



<!-- Enrollment Number -->

<div class="mb-3">

<label class="form-label">

Enrollment Number

</label>


<div class="input-group">


<span class="input-group-text">

<i class="fa fa-id-card"></i>

</span>


<input type="text"
name="enrollment_no"
class="form-control"
placeholder="Enter Enrollment Number"
required
minlength="5"
maxlength="20"
title="Enrollment number must be between 5-20 characters">


</div>


</div>



<!-- Course -->

<div class="mb-3">

<label class="form-label">

Course

</label>


<div class="input-group">


<span class="input-group-text">

<i class="fa fa-graduation-cap"></i>

</span>


<input type="text"
name="course"
class="form-control"
placeholder="Enter Course"
required>


</div>


</div>



<!-- Semester -->

<div class="mb-3">

<label class="form-label">

Semester

</label>


<div class="input-group">


<span class="input-group-text">

<i class="fa fa-book"></i>

</span>


<select name="semester" class="form-select" required>


<option value="">Select Semester</option>


<option value="1st Semester">1st Semester</option>


<option value="2nd Semester">2nd Semester</option>


<option value="3rd Semester">3rd Semester</option>


<option value="4th Semester">4th Semester</option>


<option value="5th Semester">5th Semester</option>


<option value="6th Semester">6th Semester</option>


<option value="7th Semester">7th Semester</option>


<option value="8th Semester">8th Semester</option>


</select>


</div>


</div>



<!-- Mobile -->

<div class="mb-3">

<label class="form-label">

Mobile Number

</label>


<div class="input-group">


<span class="input-group-text">

<i class="fa fa-phone"></i>

</span>


<input type="tel"
name="mobile"
class="form-control"
placeholder="Enter 10-digit Mobile Number"
required
pattern="[0-9]{10}"
maxlength="10"
title="Mobile number must be exactly 10 digits">


</div>


</div>



<!-- Email -->

<div class="mb-3">

<label class="form-label">

Email Address

</label>


<div class="input-group">


<span class="input-group-text">

<i class="fa fa-envelope"></i>

</span>


<input type="email"
name="email"
class="form-control"
placeholder="Enter Email Address"
required>


</div>


</div>



<!-- Password -->

<div class="mb-3">

<label class="form-label">

Password

</label>


<div class="input-group">


<span class="input-group-text">

<i class="fa fa-lock"></i>

</span>


<input type="password"
name="password"
class="form-control"
placeholder="Enter Password (min 6 characters)"
required
minlength="6"
title="Password must be at least 6 characters long">


</div>


</div>



<!-- Confirm Password -->

<div class="mb-3">

<label class="form-label">

Confirm Password

</label>


<div class="input-group">


<span class="input-group-text">

<i class="fa fa-lock"></i>

</span>


<input type="password"
name="confirm_password"
class="form-control"
placeholder="Confirm Password"
required
minlength="6">


</div>


</div>



<button class="btn btn-primary w-100 fw-bold">


<i class="fa fa-user-plus"></i>

Register


</button>



</form>



<hr>

<div class="text-center">


<p class="mb-1">Already have an account?</p>

<a href="login.php" class="text-decoration-none">

Login Here

</a>


</div>


<div class="text-center mt-2">

<a href="index.php" class="text-decoration-none">

← Back To Home

</a>


</div>



</div>


</div>


</section>




<!-- Footer -->


<footer class="bg-primary text-white text-center py-3">


<p class="mb-0">

© 2026 K.D Hostel Management System

</p>


</footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
