<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Get dashboard statistics
$total_students = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM students"))['count'];
$total_rooms = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM rooms"))['count'];
$pending_fees = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM fees WHERE payment_status = 'Pending'"))['count'];
$complaints = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM complaints WHERE status = 'Pending'"))['count'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard | K.D Hostel</title>


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

K.D Hostel Admin Panel

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

Admin Menu

</h5>


<hr class="text-white">



<a href="dashboard.php" class="btn btn-primary w-100 mb-2">

<i class="fa fa-dashboard"></i>

Dashboard

</a>



<a href="students.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-users"></i>

Students

</a>



<a href="rooms.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-bed"></i>

Rooms

</a>



<a href="hostel.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-building"></i>

Hostel

</a>



<a href="fees.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-money-bill"></i>

Fees

</a>



<a href="complaints.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-comment"></i>

Complaints

</a>



<a href="notices.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-bell"></i>

Notices

</a>



<a href="reports.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-chart-bar"></i>

Reports

</a>



<a href="profile.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-user"></i>

Profile

</a>


</div>





<!-- Main Content -->


<div class="col-md-9 col-lg-10 p-4">


<h2 class="text-primary fw-bold">

Admin Dashboard

</h2>


<hr>



<div class="row">



<div class="col-md-3">


<div class="card shadow text-center p-3">


<h3 class="text-primary">

<?php echo $total_students; ?>

</h3>


<p>

Total Students

</p>


</div>


</div>





<div class="col-md-3">


<div class="card shadow text-center p-3">


<h3 class="text-success">

<?php echo $total_rooms; ?>

</h3>


<p>

Total Rooms

</p>


</div>


</div>





<div class="col-md-3">


<div class="card shadow text-center p-3">


<h3 class="text-warning">

<?php echo $pending_fees; ?>

</h3>


<p>

Pending Fees

</p>


</div>


</div>





<div class="col-md-3">


<div class="card shadow text-center p-3">


<h3 class="text-danger">

<?php echo $complaints; ?>

</h3>


<p>

Complaints

</p>


</div>


</div>



</div>


</div>



</div>



</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>