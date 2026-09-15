<?php
require_once '../config/database.php';
session_start();

// Check if student is logged in
if(!isset($_SESSION['student_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Get student information
$student_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id = $student_id"));

// Get student fee information
$fee_query = mysqli_query($conn, "SELECT * FROM fees WHERE student_id = $student_id");
$fee_info = mysqli_fetch_assoc($fee_query);

// If fee record doesn't exist, create one with default values
if(!$fee_info) {
    $total_fee = 25000; // Default total fee
    $paid_amount = 0;
    $pending_amount = $total_fee;
    $payment_status = 'Pending';
    
    // Insert fee record for this student (payment_date NULL for pending payments)
    $insert_fee = "INSERT INTO fees (student_id, total_fee, paid_amount, pending_amount, payment_status) 
                   VALUES ($student_id, $total_fee, $paid_amount, $pending_amount, '$payment_status')";
    mysqli_query($conn, $insert_fee);
    
    // Re-fetch the fee info
    $fee_query = mysqli_query($conn, "SELECT * FROM fees WHERE student_id = $student_id");
    $fee_info = mysqli_fetch_assoc($fee_query);
}

// Helper function to safely format numbers
function safe_number_format($value) {
    if($value === NULL || $value === '') {
        return number_format(0);
    }
    return number_format(floatval($value));
}

// Helper function to safely get array value
function safe_array_value($array, $key, $default = '') {
    if(isset($array) && is_array($array) && isset($array[$key])) {
        return $array[$key];
    }
    return $default;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Fees | K.D Hostel Student</title>


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



<a href="profile.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-user"></i>

Profile

</a>



<a href="room.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-bed"></i>

My Room

</a>



<a href="fees.php" class="btn btn-primary w-100 mb-2">

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

My Fee Details

</h2>


<hr>





<!-- Fee Cards -->


<div class="row mb-4">


<div class="col-md-4">


<div class="card shadow text-center p-3">


<i class="fa fa-money-bill fa-3x text-primary"></i>


<h3 class="mt-3">

₹<?php echo safe_number_format(safe_array_value($fee_info, 'total_fee')); ?>

</h3>


<p>

Total Hostel Fee

</p>


</div>


</div>





<div class="col-md-4">


<div class="card shadow text-center p-3">


<i class="fa fa-check-circle fa-3x text-success"></i>


<h3 class="mt-3">

₹<?php echo safe_number_format(safe_array_value($fee_info, 'paid_amount')); ?>

</h3>


<p>

Paid Amount

</p>


</div>


</div>





<div class="col-md-4">


<div class="card shadow text-center p-3">


<i class="fa fa-clock fa-3x text-danger"></i>


<h3 class="mt-3">

₹<?php echo safe_number_format(safe_array_value($fee_info, 'pending_amount')); ?>

</h3>


<p>

Pending Amount

</p>


</div>


</div>



</div>





<!-- Payment Status -->


<div class="card shadow">


<div class="card-body">


<h4 class="text-primary">

Payment Information

</h4>


<hr>


<table class="table table-bordered">


<tr>

<th>
Student Name
</th>

<td>
<?php echo $student_info['name']; ?>
</td>

</tr>



<tr>

<th>
Enrollment No
</th>

<td>
<?php echo $student_info['enrollment_no']; ?>
</td>

</tr>



<tr>

<th>
Room Number
</th>

<td>
<?php echo $student_info['room_no']; ?>
</td>

</tr>



<tr>

<th>
Total Fee
</th>

<td>
₹<?php echo safe_number_format(safe_array_value($fee_info, 'total_fee')); ?>
</td>

</tr>



<tr>

<th>
Payment Status
</th>

<td>

<?php if(safe_array_value($fee_info, 'payment_status') == 'Paid'): ?>
<span class="badge bg-success">Paid</span>
<?php else: ?>
<span class="badge bg-warning">Pending</span>
<?php endif; ?>

</td>

</tr>



<tr>

<th>
Payment Date
</th>

<td>
<?php echo safe_array_value($fee_info, 'payment_date', 'Not Paid Yet'); ?>
</td>

</tr>



</table>


<button class="btn btn-primary">

<i class="fa fa-download"></i>

Download Receipt

</button>


</div>


</div>





<!-- Fee History -->


<div class="card shadow mt-4">


<div class="card-body">


<h4 class="text-primary">

Fee History

</h4>


<hr>


<table class="table table-bordered table-hover">


<thead class="table-primary">


<tr>

<th>
ID
</th>

<th>
Date
</th>

<th>
Amount
</th>

<th>
Payment Mode
</th>

<th>
Status
</th>

<th>
Receipt
</th>


</tr>


</thead>



<tbody>


<tr>


<td>
1
</td>


<td>
<?php echo safe_array_value($fee_info, 'payment_date', 'Not Paid Yet'); ?>
</td>


<td>
₹<?php echo safe_number_format(safe_array_value($fee_info, 'paid_amount')); ?>
</td>


<td>
Online
</td>


<td>

<span class="badge bg-success">Paid</span>

</td>


<td>


<button class="btn btn-info btn-sm">

<i class="fa fa-file"></i>

View

</button>


</td>


</tr>



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