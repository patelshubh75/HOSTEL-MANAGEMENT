<?php
require_once '../config/database.php';
session_start();

// Check if student is logged in
if(!isset($_SESSION['student_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$student_id = $_SESSION['student_id'];
$student_name = $_SESSION['student_name'];

// Get student information
$student_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id = $student_id"));

// Get student fee info
$fee_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fees WHERE student_id = $student_id"));

// Get student complaints count
$complaints_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM complaints WHERE student_id = $student_id"))['count'];

// Get latest notices
$notices = mysqli_query($conn, "SELECT * FROM notices ORDER BY publish_date DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Dashboard | K.D Hostel</title>


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



<a href="dashboard.php" class="btn btn-primary w-100 mb-2">

<i class="fa fa-dashboard"></i>

Dashboard

</a>



<a href="profile.php" class="btn btn-dark text-white w-100 mb-2">

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

Student Dashboard

</h2>


<hr>





<!-- Cards -->


<div class="row">



<div class="col-md-4">


<div class="card shadow text-center p-3">


<i class="fa fa-bed fa-2x text-primary"></i>


<h3 class="mt-2">

<?php echo $student_info['room_no']; ?>

</h3>


<p>

Current Room

</p>


</div>


</div>





<div class="col-md-4">


<div class="card shadow text-center p-3">


<i class="fa fa-money-bill fa-2x text-success"></i>


<h3>

₹<?php echo number_format($fee_info['paid_amount']); ?>

</h3>


<p>

Fee Paid

</p>


</div>


</div>



<div class="col-md-4">


<div class="card shadow text-center p-3">


<i class="fa fa-comment fa-2x text-danger"></i>


<h3>

<?php echo $complaints_count; ?>

</h3>


<p>

Complaints

</p>


</div>


</div>



</div>





<!-- Student Information -->


<div class="card shadow mt-4">


<div class="card-body">


<h4 class="text-primary">

Student Information

</h4>


<hr>


<p>

<strong>Name:</strong> <?php echo $student_info['name']; ?>

</p>


<p>

<strong>Enrollment No:</strong> <?php echo $student_info['enrollment_no']; ?>

</p>


<p>

<strong>Course:</strong> <?php echo $student_info['course']; ?>

</p>


<p>

<strong>Semester:</strong> <?php echo $student_info['semester']; ?>

</p>


<p>

<strong>Mobile:</strong> <?php echo $student_info['mobile']; ?>

</p>



</div>


</div>





<!-- Latest Notice -->


<div class="card shadow mt-4">


<div class="card-body">


<h4 class="text-primary">

Latest Notice

</h4>


<hr>


<ul>

<?php while($notice = mysqli_fetch_assoc($notices)): ?>


<li>

<?php echo $notice['title']; ?> - <?php echo $notice['publish_date']; ?>

</li>

<?php endwhile; ?>



</ul>



</div>


</div>



</div>


</div>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>