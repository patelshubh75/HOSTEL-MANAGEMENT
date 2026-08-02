<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Handle student operations
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM students WHERE id = $id");
    header("Location: students.php");
}

// Handle search
$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM students";
if($search) {
    $query .= " WHERE name LIKE '%$search%' OR enrollment_no LIKE '%$search%'";
}
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Students Management | K.D Hostel Admin</title>


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



<a href="students.php" class="btn btn-primary w-100 mb-2">

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


<div class="d-flex justify-content-between">


<h2 class="text-primary fw-bold">

Student Management

</h2>


<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStudentModal">

<i class="fa fa-plus"></i>

Add Student

</button>


</div>


<hr>





<!-- Search -->


<div class="row mb-3">


<div class="col-md-6">

<form method="GET" action="students.php">
<input type="text"
name="search"
class="form-control"
placeholder="Search Student"
value="<?php echo $search; ?>">
</div>


<div class="col-md-3">


<select class="form-select">


<option>
Select Year
</option>


<option>
First Year
</option>


<option>
Second Year
</option>


<option>
Third Year
</option>


</select>


</div>


<button type="submit" formaction="students.php" class="btn btn-primary col-md-2">

Search

</button>

</form>


</div>





<!-- Student Table -->


<div class="card shadow">


<div class="card-body">


<h5 class="text-primary">

Student List

</h5>


<table class="table table-bordered table-hover">


<thead class="table-primary">


<tr>


<th>
ID
</th>


<th>
Student Name
</th>


<th>
Enrollment No
</th>


<th>
Mobile
</th>


<th>
Room No
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
<?php echo $row['id']; ?>
</td>


<td>
<?php echo $row['name']; ?>
</td>


<td>
<?php echo $row['enrollment_no']; ?>
</td>


<td>
<?php echo $row['mobile']; ?>
</td>


<td>
<?php echo $row['room_no']; ?>
</td>


<td>


<button class="btn btn-sm btn-warning">

<i class="fa fa-edit"></i>

</button>


<a href="students.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">

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





<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="add_student.php">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Enrollment No</label>
                        <input type="text" name="enrollment_no" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Course</label>
                        <input type="text" name="course" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Semester</label>
                        <input type="text" name="semester" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Room No</label>
                        <input type="text" name="room_no" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>