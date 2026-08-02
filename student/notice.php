<?php
require_once '../config/database.php';
session_start();

// Check if student is logged in
if(!isset($_SESSION['student_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Get all notices
$notices = mysqli_query($conn, "SELECT * FROM notices ORDER BY publish_date DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Notices | K.D Hostel Student</title>


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



<a href="fees.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-money-bill"></i>

Fees

</a>



<a href="complaint.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-comment"></i>

Complaint

</a>



<a href="notice.php" class="btn btn-primary w-100 mb-2">

<i class="fa fa-bell"></i>

Notice

</a>



</div>





<!-- Main Content -->


<div class="col-md-9 col-lg-10 p-4">



<h2 class="text-primary fw-bold">

Hostel Notices

</h2>


<hr>





<!-- Notices List -->


<div class="card shadow p-4">


<?php while($notice = mysqli_fetch_assoc($notices)): ?>


<div class="card mb-3 shadow-sm">


<div class="card-body">


<div class="d-flex justify-content-between align-items-center">


<h5 class="card-title text-primary">

<?php echo $notice['title']; ?>

</h5>


<span class="badge bg-info">

<?php echo $notice['category']; ?>

</span>


</div>


<h6 class="card-subtitle mb-2 text-muted">

<?php echo $notice['publish_date']; ?>

</h6>


<p class="card-text">

<?php echo $notice['description']; ?>

</p>


</div>


</div>

<?php endwhile; ?>



<?php if(mysqli_num_rows($notices) == 0): ?>


<p class="text-center text-muted">No notices available.</p>

<?php endif; ?>



</div>



</div>


</div>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>