<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Handle complaint reply
if(isset($_POST['reply'])) {
    $id = $_POST['id'];
    $reply = mysqli_real_escape_string($conn, $_POST['reply_text']);
    mysqli_query($conn, "UPDATE complaints SET reply = '$reply', status = 'Resolved' WHERE id = $id");
    header("Location: complaints.php");
}

// Get complaints
$result = mysqli_query($conn, "SELECT c.*, s.name as student_name FROM complaints c JOIN students s ON c.student_id = s.id ORDER BY c.date DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Complaint Management | K.D Hostel Admin</title>


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



<a href="complaints.php" class="btn btn-primary w-100 mb-2">

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

Complaint Management

</h2>


<hr>





<!-- Complaint Table -->


<div class="card shadow">


<div class="card-body">


<h5 class="text-primary">

Student Complaints

</h5>


<table class="table table-bordered table-hover">


<thead class="table-primary">


<tr>

<th>
Student
</th>

<th>
Category
</th>

<th>
Complaint
</th>

<th>
Date
</th>

<th>
Status
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
<?php echo $row['category']; ?>
</td>

<td>
<?php echo $row['complaint']; ?>
</td>

<td>
<?php echo $row['date']; ?>
</td>

<td>

<?php if($row['status'] == 'Pending'): ?>
<span class="badge bg-warning">Pending</span>
<?php else: ?>
<span class="badge bg-success">Resolved</span>
<?php endif; ?>

</td>

<td>


<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#replyModal<?php echo $row['id']; ?>">

Reply

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

<?php 
mysqli_data_seek($result, 0);
while($row = mysqli_fetch_assoc($result)): 
?>
<!-- Reply Modal -->
<div class="modal fade" id="replyModal<?php echo $row['id']; ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reply to Complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Complaint:</strong> <?php echo $row['complaint']; ?></p>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label>Your Reply</label>
                        <textarea name="reply_text" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" name="reply" class="btn btn-primary">Send Reply</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>