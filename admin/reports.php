<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Get report statistics
$students_by_course = mysqli_query($conn, "SELECT course, COUNT(*) as count FROM students GROUP BY course");
$fee_status = mysqli_query($conn, "SELECT payment_status, COUNT(*) as count FROM fees GROUP BY payment_status");
$room_status = mysqli_query($conn, "SELECT status, COUNT(*) as count FROM rooms GROUP BY status");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Reports | K.D Hostel Admin</title>


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

<a href="dashboard.php" class="btn btn-dark text-white w-100 mb-2">

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



<a href="reports.php" class="btn btn-primary w-100 mb-2">

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

Reports & Statistics

</h2>


<hr>





<div class="row">


<div class="col-md-6">


<div class="card shadow p-4 mb-4">


<h5 class="text-primary">Students by Course</h5>


<table class="table">


<thead>


<tr>


<th>Course</th>


<th>Count</th>


</tr>


</thead>


<tbody>

<?php while($row = mysqli_fetch_assoc($students_by_course)): ?>


<tr>


<td><?php echo $row['course']; ?></td>


<td><?php echo $row['count']; ?></td>


</tr>

<?php endwhile; ?>



</tbody>


</table>


</div>


</div>





<div class="col-md-6">


<div class="card shadow p-4 mb-4">


<h5 class="text-success">Fee Status</h5>


<table class="table">


<thead>


<tr>


<th>Status</th>


<th>Count</th>


</tr>


</thead>


<tbody>

<?php while($row = mysqli_fetch_assoc($fee_status)): ?>


<tr>


<td><?php echo $row['payment_status']; ?></td>


<td><?php echo $row['count']; ?></td>


</tr>

<?php endwhile; ?>



</tbody>


</table>


</div>


</div>





<div class="col-md-6">


<div class="card shadow p-4 mb-4">


<h5 class="text-warning">Room Status</h5>


<table class="table">


<thead>


<tr>


<th>Status</th>


<th>Count</th>


</tr>


</thead>


<tbody>

<?php while($row = mysqli_fetch_assoc($room_status)): ?>


<tr>


<td><?php echo $row['status']; ?></td>


<td><?php echo $row['count']; ?></td>


</tr>

<?php endwhile; ?>



</tbody>


</table>


</div>


</div>


</div>



</div>


</div>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>