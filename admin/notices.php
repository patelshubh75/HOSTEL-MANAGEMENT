<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Handle notice operations
if(isset($_POST['add'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    mysqli_query($conn, "INSERT INTO notices (title, category, description, publish_date) VALUES ('$title', '$category', '$description', NOW())");
    header("Location: notices.php");
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM notices WHERE id = $id");
    header("Location: notices.php");
}

// Get notices
$result = mysqli_query($conn, "SELECT * FROM notices ORDER BY publish_date DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Notice Management | K.D Hostel Admin</title>


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



<a href="notices.php" class="btn btn-primary w-100 mb-2">

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

Notice Management

</h2>


<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNoticeModal">

<i class="fa fa-plus"></i>

Add Notice

</button>


</div>


<hr>





<!-- Notice Table -->


<div class="card shadow">


<div class="card-body">


<h5 class="text-primary">

All Notices

</h5>


<table class="table table-bordered table-hover">


<thead class="table-primary">


<tr>

<th>
Title
</th>

<th>
Category
</th>

<th>
Description
</th>

<th>
Publish Date
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
<?php echo $row['title']; ?>
</td>

<td>
<?php echo $row['category']; ?>
</td>

<td>
<?php echo substr($row['description'], 0, 50); ?>...
</td>

<td>
<?php echo $row['publish_date']; ?>
</td>

<td>


<a href="notices.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">

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





<!-- Add Notice Modal -->
<div class="modal fade" id="addNoticeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Notice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category" class="form-select">
                            <option value="General">General</option>
                            <option value="Fee Notice">Fee Notice</option>
                            <option value="Exam">Exam</option>
                            <option value="Holiday">Holiday</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary">Publish Notice</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>