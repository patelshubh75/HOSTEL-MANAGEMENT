<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Handle room operations
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM rooms WHERE id = $id");
    header("Location: rooms.php");
}

// Get room statistics
$total_rooms = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM rooms"))['count'];
$available_rooms = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM rooms WHERE status = 'Available'"))['count'];
$occupied_rooms = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM rooms WHERE status = 'Occupied'"))['count'];

// Get all rooms
$result = mysqli_query($conn, "SELECT * FROM rooms");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Room Management | K.D Hostel Admin</title>


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



<a href="rooms.php" class="btn btn-primary w-100 mb-2">

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



<div class="d-flex justify-content-between">


<h2 class="text-primary fw-bold">

Room Management

</h2>


<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRoomModal">

<i class="fa fa-plus"></i>

Add Room

</button>


</div>


<hr>





<!-- Room Summary Cards -->


<div class="row mb-4">


<div class="col-md-4">


<div class="card shadow text-center p-3">


<h3 class="text-primary">

<?php echo $total_rooms; ?>

</h3>


<p>Total Rooms</p>


</div>


</div>





<div class="col-md-4">


<div class="card shadow text-center p-3">


<h3 class="text-success">

<?php echo $available_rooms; ?>

</h3>


<p>Available Rooms</p>


</div>


</div>





<div class="col-md-4">


<div class="card shadow text-center p-3">


<h3 class="text-danger">

<?php echo $occupied_rooms; ?>

</h3>


<p>Occupied Rooms</p>


</div>


</div>



</div>





<!-- Room Table -->


<div class="card shadow">


<div class="card-body">


<h5 class="text-primary">

Room Details

</h5>



<table class="table table-bordered table-hover">


<thead class="table-primary">


<tr>

<th>
Room No
</th>

<th>
Block
</th>

<th>
Capacity
</th>

<th>
Occupied
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
<?php echo $row['room_no']; ?>
</td>

<td>
<?php echo $row['block_name']; ?>
</td>

<td>
<?php echo $row['capacity']; ?> Students
</td>

<td>
<?php echo $row['occupied']; ?>
</td>

<td>

<?php if($row['status'] == 'Available'): ?>
<span class="badge bg-success">Available</span>
<?php else: ?>
<span class="badge bg-danger">Full</span>
<?php endif; ?>

</td>

<td>


<button class="btn btn-warning btn-sm">

<i class="fa fa-edit"></i>

</button>


<a href="rooms.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">

<i class="fa fa-trash"></i>

</a>


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





<!-- Add Room Modal -->
<div class="modal fade" id="addRoomModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="add_room.php">
                    <div class="mb-3">
                        <label>Room No</label>
                        <input type="number" name="room_no" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Block Name</label>
                        <input type="text" name="block_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Floor</label>
                        <input type="text" name="floor" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Capacity</label>
                        <input type="number" name="capacity" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="Available">Available</option>
                            <option value="Occupied">Occupied</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Room</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>