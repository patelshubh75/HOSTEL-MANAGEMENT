<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Handle profile update
if(isset($_POST['update'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    
    // Verify current password
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$current_password'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        if($new_password) {
            mysqli_query($conn, "UPDATE admin SET password = '$new_password', email = '$email' WHERE username = '$username'");
        } else {
            mysqli_query($conn, "UPDATE admin SET email = '$email' WHERE username = '$username'");
        }
        $success = "Profile updated successfully!";
    } else {
        $error = "Current password is incorrect!";
    }
}

// Get admin info
$admin_username = $_SESSION['admin_username'];
$admin_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE username = '$admin_username'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Profile | K.D Hostel Admin</title>


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



<a href="reports.php" class="btn btn-dark text-white w-100 mb-2">

<i class="fa fa-chart-bar"></i>
Reports

</a>



<a href="profile.php" class="btn btn-primary w-100 mb-2">

<i class="fa fa-user"></i>
Profile

</a>


</div>





<!-- Main Content -->


<div class="col-md-9 col-lg-10 p-4">


<h2 class="text-primary fw-bold">

Admin Profile

</h2>


<hr>

<?php if(isset($success)): ?>
<div class="alert alert-success"><?php echo $success; ?></div>
<?php endif; ?>

<?php if(isset($error)): ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>





<div class="card shadow p-4">


<form method="POST">


<div class="mb-3">


<label>Username</label>


<input type="text" name="username" class="form-control" value="<?php echo $admin_info['username']; ?>" readonly>


</div>





<div class="mb-3">


<label>Email</label>


<input type="email" name="email" class="form-control" value="<?php echo $admin_info['email']; ?>" required>


</div>





<div class="mb-3">


<label>Current Password</label>


<input type="password" name="current_password" class="form-control" required>


</div>





<div class="mb-3">


<label>New Password (leave blank to keep current)</label>


<input type="password" name="new_password" class="form-control">


</div>





<button type="submit" name="update" class="btn btn-primary">


Update Profile

</button>


</form>


</div>



</div>


</div>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>