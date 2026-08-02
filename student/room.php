<?php
require_once '../config/database.php';
session_start();

// Check if student is logged in
if(!isset($_SESSION['student_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Get student room information
$student_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id = $student_id"));
$room_no = $student_info['room_no'];

// Get room details
$room_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rooms WHERE room_no = '$room_no'"));

// Get roommates
$roommates = mysqli_query($conn, "SELECT * FROM students WHERE room_no = '$room_no' AND id != $student_id");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Room | K.D Hostel Student</title>


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



<a href="room.php" class="btn btn-primary w-100 mb-2">

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

My Room Details

</h2>


<hr>





<!-- Room Information -->


<div class="card shadow p-4 mb-4">


<h4 class="text-primary">Room Information</h4>


<hr>


<div class="row">


<div class="col-md-6">


<p><strong>Room Number:</strong> <?php echo $room_info['room_no']; ?></p>


<p><strong>Block:</strong> <?php echo $room_info['block_name']; ?></p>


<p><strong>Floor:</strong> <?php echo $room_info['floor']; ?></p>


</div>


<div class="col-md-6">


<p><strong>Capacity:</strong> <?php echo $room_info['capacity']; ?> Students</p>


<p><strong>Occupied:</strong> <?php echo $room_info['occupied']; ?> Students</p>


<p><strong>Status:</strong> 
<?php if($room_info['status'] == 'Available'): ?>
<span class="badge bg-success">Available</span>
<?php else: ?>
<span class="badge bg-danger">Full</span>
<?php endif; ?>
</p>


</div>


</div>


</div>





<!-- Roommates -->


<div class="card shadow p-4">


<h4 class="text-primary">My Roommates</h4>


<hr>


<table class="table table-bordered table-hover">


<thead class="table-primary">


<tr>


<th>Name
</th>

<th>Enrollment No
</th>

<th>Course
</th>

<th>Mobile
</th>


</tr>


</thead>


<tbody>


<tr>


<td><?php echo $student_info['name']; ?> (You)</td>


<td><?php echo $student_info['enrollment_no']; ?></td>


<td><?php echo $student_info['course']; ?></td>


<td><?php echo $student_info['mobile']; ?></td>


</tr>

<?php while($roommate = mysqli_fetch_assoc($roommates)): ?>


<tr>


<td><?php echo $roommate['name']; ?></td>


<td><?php echo $roommate['enrollment_no']; ?></td>


<td><?php echo $roommate['course']; ?></td>


<td><?php echo $roommate['mobile']; ?></td>


</tr>

<?php endwhile; ?>



</tbody>


</table>


</div>



</div>


</div>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>