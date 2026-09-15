<?php
require_once '../config/database.php';
session_start();

// Check if student is logged in
if(!isset($_SESSION['student_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Handle complaint submission
if(isset($_POST['submit'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $complaint = mysqli_real_escape_string($conn, $_POST['complaint']);
    
    $query = "INSERT INTO complaints (student_id, category, complaint, date, status, reply) 
              VALUES ($student_id, '$category', '$complaint', NOW(), 'Pending', 'Waiting For Reply')";
    
    if(mysqli_query($conn, $query)) {
        $success = "Complaint submitted successfully!";
    } else {
        $error = "Error submitting complaint. Please try again.";
    }
}

// Get student complaints
$complaints = mysqli_query($conn, "SELECT * FROM complaints WHERE student_id = $student_id ORDER BY date DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Complaint | K.D Hostel Student</title>


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



<a href="complaint.php" class="btn btn-primary w-100 mb-2">

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

File Complaint

</h2>


<hr>

<?php if(isset($success)): ?>
<div class="alert alert-success"><?php echo $success; ?></div>
<?php endif; ?>

<?php if(isset($error)): ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>





<!-- Complaint Form -->


<div class="card shadow p-4 mb-4">


<h4 class="text-primary">Submit New Complaint</h4>


<hr>


<form method="POST">


<div class="mb-3">


<label class="form-label">Category</label>


<select name="category" class="form-select" required>


<option value="">Select Category</option>


<option value="Room Issue">Room Issue</option>


<option value="Mess Issue">Mess Issue</option>


<option value="Electricity">Electricity</option>


<option value="Water">Water</option>


<option value="Security">Security</option>


<option value="Other">Other</option>


</select>


</div>





<div class="mb-3">


<label class="form-label">Complaint Details</label>


<textarea name="complaint" class="form-control" rows="5" required></textarea>


</div>





<button type="submit" name="submit" class="btn btn-primary">


<i class="fa fa-paper-plane"></i>

Submit Complaint

</button>


</form>


</div>





<!-- Complaint History -->


<div class="card shadow p-4">


<h4 class="text-primary">My Complaints</h4>


<hr>


<table class="table table-bordered table-hover">


<thead class="table-primary">


<tr>


<th>Category
</th>

<th>Complaint
</th>

<th>Date
</th>

<th>Status
</th>

<th>Reply
</th>


</tr>


</thead>


<tbody>

<?php while($row = mysqli_fetch_assoc($complaints)): ?>


<tr>


<td><?php echo $row['category']; ?></td>


<td><?php echo $row['complaint']; ?></td>


<td><?php echo $row['date']; ?></td>


<td>

<?php if($row['status'] == 'Pending'): ?>
<span class="badge bg-warning">Pending</span>
<?php else: ?>
<span class="badge bg-success">Resolved</span>
<?php endif; ?>

</td>


<td><?php echo $row['reply']; ?></td>


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