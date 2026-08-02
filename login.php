<?php

session_start();
require_once 'config/database.php';

// Handle login form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if($role == "admin") {
        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_num_rows($result) > 0) {
            $admin = mysqli_fetch_assoc($result);
            // Verify password (supports both plain text for existing admin and hashed for new registrations)
            if(password_verify($password, $admin['password']) || $password === $admin['password']) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $username;
                header("Location: admin/dashboard.php");
                exit();
            } else {
                $error = "Invalid admin credentials";
            }
        } else {
            $error = "Invalid admin credentials";
        }
    } elseif($role == "student") {
        $query = "SELECT * FROM students WHERE enrollment_no = '$username'";
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_num_rows($result) > 0) {
            $student = mysqli_fetch_assoc($result);
            // Verify password (supports both plain text for existing students and hashed for new registrations)
            if(password_verify($password, $student['password']) || $password === $student['password']) {
                $_SESSION['student_logged_in'] = true;
                $_SESSION['student_id'] = $student['id'];
                $_SESSION['student_name'] = $student['name'];
                header("Location: student/dashboard.php");
                exit();
            } else {
                $error = "Invalid student credentials";
            }
        } else {
            $error = "Invalid student credentials";
        }
    } else {
        $error = "Please select a valid role";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | K.D Hostel Management System</title>


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





<!-- Login Section -->


<section class="container py-5">


<div class="row justify-content-center">


<div class="col-md-5">



<div class="card shadow p-4">



<div class="text-center mb-4">


<i class="fa-solid fa-user-lock fa-3x text-primary"></i>


<h2 class="mt-3 text-primary fw-bold">

Login

</h2>


<p>

K.D Hostel Management System

</p>


</div>




<?php if(isset($error)): ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>



<form method="POST" action="">



<!-- Role -->

<div class="mb-3">


<label class="form-label">

Select Role

</label>


<select name="role" class="form-select" required>


<option value="">

Choose Role

</option>


<option value="admin">

Admin

</option>


<option value="student">

Student

</option>


</select>


</div>





<!-- Username -->


<div class="mb-3">


<label class="form-label">

Username

</label>


<div class="input-group">


<span class="input-group-text">

<i class="fa fa-user"></i>

</span>


<input type="text"
name="username"
class="form-control"
placeholder="Enter Username"
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
placeholder="Enter Password"
required>


</div>


</div>





<button class="btn btn-primary w-100 fw-bold">


<i class="fa fa-right-to-bracket"></i>

Login


</button>



</form>



<hr>


<div class="text-center">


<p class="mb-1">New student? <a href="register.php" class="text-decoration-none">Register here</a></p>


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