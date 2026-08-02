<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Get fees data
$result = mysqli_query($conn, "SELECT f.*, s.name as student_name, s.enrollment_no FROM fees f JOIN students s ON f.student_id = s.id");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Fee Management | K.D Hostel Admin</title>


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



<a href="fees.php" class="btn btn-primary w-100 mb-2">

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

Fee Management

</h2>


<hr>





<!-- Fee Table -->


<div class="card shadow">


<div class="card-body">


<h5 class="text-primary">

Fee Records

</h5>


<table class="table table-bordered table-hover">


<thead class="table-primary">


<tr>

<th>
Student
</th>

<th>
Enrollment No
</th>

<th>
Total Fee
</th>

<th>
Paid
</th>

<th>
Pending
</th>

<th>
Status
</th>

<th>
Date
</th>

<th>
Action
</th>


</tr>


</thead>



<tbody>

<?php while($row = mysqli_fetch_assoc($result)): ?>


<tr>

<td>
<?php echo $row['student_name']; ?>
</td>

<td>
<?php echo $row['enrollment_no']; ?>
</td>

<td>
₹<?php echo number_format($row['total_fee']); ?>
</td>

<td>
₹<?php echo number_format($row['paid_amount']); ?>
</td>

<td>
₹<?php echo number_format($row['pending_amount']); ?>
</td>

<td>

<?php if($row['payment_status'] == 'Paid'): ?>
<span class="badge bg-success">Paid</span>
<?php else: ?>
<span class="badge bg-warning">Pending</span>
<?php endif; ?>

</td>

<td>
<?php echo $row['payment_date']; ?>
</td>

<td>


<button class="btn btn-sm btn-primary">

<i class="fa fa-edit"></i>

</button>


</td>


</tr>

<?php endwhile; ?>



</tbody>


</table>


</div>


</div>



</div>


</div>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>