<?php
require_once '../config/database.php';
session_start();

// Check if student is logged in
if(!isset($_SESSION['student_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Handle profile update
if(isset($_POST['update'])) {
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    
    // Verify current password
    $query = "SELECT * FROM students WHERE id = $student_id AND password = '$current_password'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        if($new_password) {
            mysqli_query($conn, "UPDATE students SET mobile = '$mobile', email = '$email', password = '$new_password' WHERE id = $student_id");
        } else {
            mysqli_query($conn, "UPDATE students SET mobile = '$mobile', email = '$email' WHERE id = $student_id");
        }
        $success = "Profile updated successfully!";
    } else {
        $error = "Current password is incorrect!";
    }
}

// Get student information
$student_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id = $student_id"));
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Profile | K.D Hostel</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>


<body>


<!-- Navbar -->

<nav class="navbar navbar-dark bg-primary">

<div class="container-fluid">


<a class="navbar-brand fw-bold">

<i class="fa-solid fa-building"></i>

K.D Hostel Student Panel

</a>


<a href="../logout.php" class="btn btn-warning">

Logout

</a>


</div>

</nav>





<div class="container-fluid">


<div class="row">



<!-- Sidebar -->


<div class="col-md-3 col-lg-2 bg-dark min-vh-100 p-3">


<h5 class="text-white text-center">

Student Menu

</h5>


<hr class="text-white">



<a href="dashboard.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-dashboard"></i>

Dashboard

</a>



<a href="profile.php" class="btn btn-primary w-100 mb-2">

<i class="fa fa-user"></i>

Profile

</a>



<a href="room.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-bed"></i>

My Room

</a>



<a href="fees.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-money-bill"></i>

Fees

</a>



<a href="complaint.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-comment"></i>

Complaint

</a>



<a href="notice.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-bell"></i>

Notice

</a>



</div>





<!-- Main Content -->


<div class="col-md-9 col-lg-10 p-4">



<h2 class="text-primary fw-bold">

Student Profile

</h2>


<hr>

<?php if(isset($success)): ?>
<div class="alert alert-success"><?php echo $success; ?></div>
<?php endif; ?>

<?php if(isset($error)): ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>





<div class="row">



<!-- Profile Card -->


<div class="col-md-4">


<div class="card shadow text-center p-4">


<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
width="120"
class="rounded-circle mx-auto mb-3">


<h4>

<?php echo $student_info['name']; ?>

</h4>


<p class="text-muted">

<?php echo $student_info['course']; ?> Student

</p>



<button class="btn btn-primary">

Change Photo

</button>


</div>


</div>





<!-- Student Details -->


<div class="col-md-8">


<div class="card shadow p-4">


<h4 class="text-primary">

Personal Information

</h4>


<hr>


<form method="POST">


<div class="row">


<div class="col-md-6 mb-3">


<label class="form-label">

Full Name

</label>


<input type="text"
name="name"
class="form-control"
value="<?php echo $student_info['name']; ?>" readonly>


</div>





<div class="col-md-6 mb-3">


<label class="form-label">

Enrollment Number

</label>


<input type="text"
name="enrollment_no"
class="form-control"
value="<?php echo $student_info['enrollment_no']; ?>" readonly>


</div>





<div class="col-md-6 mb-3">


<label class="form-label">

Course

</label>


<input type="text"
name="course"
class="form-control"
value="<?php echo $student_info['course']; ?>" readonly>


</div>





<div class="col-md-6 mb-3">


<label class="form-label">

Semester

</label>


<input type="text"
name="semester"
class="form-control"
value="<?php echo $student_info['semester']; ?>" readonly>


</div>





<div class="col-md-6 mb-3">


<label class="form-label">

Mobile Number

</label>


<input type="text"
name="mobile"
class="form-control"
value="<?php echo $student_info['mobile']; ?>" required>


</div>





<div class="col-md-6 mb-3">


<label class="form-label">

Email Address

</label>


<input type="email"
name="email"
class="form-control"
value="<?php echo $student_info['email']; ?>" required>


</div>





<div class="col-md-6 mb-3">


<label class="form-label">

Current Password

</label>


<input type="password"
name="current_password"
class="form-control" required>


</div>





<div class="col-md-6 mb-3">


<label class="form-label">

New Password (leave blank to keep current)

</label>


<input type="password"
name="new_password"
class="form-control">


</div>





</div>


<button type="submit" name="update" class="btn btn-success">

<i class="fa fa-save"></i>

Update Profile

</button>


</form>


</div>


</div>



</div>





<!-- Guardian Details -->


<div class="card shadow mt-4">


<div class="card-body">


<h4 class="text-primary">

Guardian Information

</h4>


<hr>


<div class="row">


<div class="col-md-6">


<p>

<strong>Guardian Name:</strong>

Patel Family

</p>


</div>





<div class="col-md-6">


<p>

<strong>Guardian Contact:</strong>

9876543211

</p>


</div>



</div>



</div>


</div>



</div>


</div>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>