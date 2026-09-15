<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Get dashboard statistics
$total_students = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM students"))['count'];
$total_rooms = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM rooms"))['count'];
$pending_fees = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM fees WHERE payment_status = 'Pending'"))['count'];
$complaints = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM complaints WHERE status = 'Pending'"))['count'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard | K.D Hostel</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- Modern CSS -->
<link rel="stylesheet" href="../css/modern.css">


</head>


<body>


<!-- Modern Navbar -->

<nav class="navbar navbar-modern" id="mainNavbar">
    <div class="container-fluid px-4">
        <a class="navbar-brand navbar-brand-modern" href="../index.php">
            <div class="logo-icon" style="width: 40px; height: 40px; font-size: 1rem;">
                <i class="fa-solid fa-building"></i>
            </div>
            <div class="brand-text">
                <span class="brand-primary" style="font-size: 1rem;">K.D Hostel</span>
                <span class="brand-secondary" style="font-size: 0.75rem;">Admin Panel</span>
            </div>
        </a>
        <a href="../logout.php" class="btn btn-login-cta" style="padding: 0.5rem 1rem; font-size: 0.9rem;">
            <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
        </a>
    </div>
</nav>





<div class="container-fluid">

<div class="row">


<!-- Modern Sidebar -->

<div class="col-md-3 col-lg-2 p-3" style="background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%); min-height: calc(100vh - 70px);">
    <div class="text-center mb-4">
        <div class="logo-icon mx-auto mb-2" style="width: 56px; height: 56px; font-size: 1.5rem;">
            <i class="fa-solid fa-user-shield"></i>
        </div>
        <h6 class="text-white mb-0">Administrator</h6>
        <small class="text-white-50">Admin Panel</small>
    </div>
    
    <hr class="border-secondary mb-3">

    <a href="dashboard.php" class="btn btn-primary w-100 mb-2 text-start" style="border-radius: var(--radius);">
        <i class="fa-solid fa-gauge-high me-2"></i> Dashboard
    </a>

    <a href="students.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-users me-2"></i> Students
    </a>

    <a href="rooms.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-bed me-2"></i> Rooms
    </a>

    <a href="hostel.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-building me-2"></i> Hostel
    </a>

    <a href="fees.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-money-bill-wave me-2"></i> Fees
    </a>

    <a href="complaints.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-comment-dots me-2"></i> Complaints
    </a>

    <a href="notices.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-bell me-2"></i> Notices
    </a>

    <a href="reports.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-chart-bar me-2"></i> Reports
    </a>

    <a href="profile.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-user me-2"></i> Profile
    </a>
</div>





<!-- Main Content -->


<div class="col-md-9 col-lg-10 p-4" style="background: var(--background);">


<h2 class="fw-bold mb-4" style="color: var(--text);">
    <i class="fa-solid fa-gauge-high me-2" style="color: var(--primary);"></i>
    Admin Dashboard
</h2>


<!-- Modern Stats Cards -->

<div class="row g-4 mb-4">


<div class="col-md-3">

<div class="card-modern">
    <div class="card-icon">
        <i class="fa-solid fa-users"></i>
    </div>
    <h4 class="card-title"><?php echo $total_students; ?></h4>
    <p class="card-text">Total Students</p>
</div>


</div>



<div class="col-md-3">

<div class="card-modern">
    <div class="card-icon">
        <i class="fa-solid fa-bed"></i>
    </div>
    <h4 class="card-title"><?php echo $total_rooms; ?></h4>
    <p class="card-text">Total Rooms</p>
</div>


</div>



<div class="col-md-3">

<div class="card-modern">
    <div class="card-icon">
        <i class="fa-solid fa-clock"></i>
    </div>
    <h4 class="card-title"><?php echo $pending_fees; ?></h4>
    <p class="card-text">Pending Fees</p>
</div>


</div>



<div class="col-md-3">

<div class="card-modern">
    <div class="card-icon">
        <i class="fa-solid fa-comment-dots"></i>
    </div>
    <h4 class="card-title"><?php echo $complaints; ?></h4>
    <p class="card-text">Complaints</p>
</div>


</div>



</div>


</div>



</div>



</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<!-- Navbar Scroll Effect -->
<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>


</body>

</html>