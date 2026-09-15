<?php
require_once '../config/database.php';
session_start();

// Check if student is logged in
if(!isset($_SESSION['student_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$student_id = $_SESSION['student_id'];
$student_name = $_SESSION['student_name'];

// Get student information
$student_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id = $student_id"));

// Get student fee info
$fee_query = mysqli_query($conn, "SELECT * FROM fees WHERE student_id = $student_id");
$fee_info = mysqli_fetch_assoc($fee_query);

// If fee info doesn't exist, set default values
if(!$fee_info) {
    $fee_info = [
        'paid_amount' => 0,
        'pending_amount' => 0,
        'total_fee' => 0,
        'payment_status' => 'Pending'
    ];
}

// Get student complaints count
$complaints_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM complaints WHERE student_id = $student_id"))['count'];

// Get latest notices
$notices = mysqli_query($conn, "SELECT * FROM notices ORDER BY publish_date DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Dashboard | K.D Hostel</title>


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
                <span class="brand-secondary" style="font-size: 0.75rem;">Student Panel</span>
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
            <i class="fa-solid fa-user-graduate"></i>
        </div>
        <h6 class="text-white mb-0"><?php echo htmlspecialchars($student_name); ?></h6>
        <small class="text-white-50">Student</small>
    </div>
    
    <hr class="border-secondary mb-3">

    <a href="dashboard.php" class="btn btn-primary w-100 mb-2 text-start" style="border-radius: var(--radius);">
        <i class="fa-solid fa-gauge-high me-2"></i> Dashboard
    </a>

    <a href="profile.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-user me-2"></i> Profile
    </a>

    <a href="room.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-bed me-2"></i> My Room
    </a>

    <a href="fees.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-money-bill-wave me-2"></i> Fees
    </a>

    <a href="complaint.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-comment-dots me-2"></i> Complaint
    </a>

    <a href="notice.php" class="btn w-100 mb-2 text-start" style="background: rgba(255, 255, 255, 0.05); color: white; border-radius: var(--radius); border: 1px solid rgba(255, 255, 255, 0.1);">
        <i class="fa-solid fa-bell me-2"></i> Notice
    </a>
</div>





<!-- Main Content -->


<div class="col-md-9 col-lg-10 p-4" style="background: var(--background);">


<h2 class="fw-bold mb-4" style="color: var(--text);">
    <i class="fa-solid fa-gauge-high me-2" style="color: var(--primary);"></i>
    Student Dashboard
</h2>



<!-- Modern Cards -->


<div class="row g-4 mb-4">



<div class="col-md-4">


<div class="card-modern">
    <div class="card-icon">
        <i class="fa-solid fa-bed"></i>
    </div>
    <h4 class="card-title"><?php echo htmlspecialchars($student_info['room_no'] ?? 'Not Assigned'); ?></h4>
    <p class="card-text">Current Room</p>
</div>


</div>



<div class="col-md-4">


<div class="card-modern">
    <div class="card-icon">
        <i class="fa-solid fa-money-bill-wave"></i>
    </div>
    <h4 class="card-title">₹<?php echo number_format($fee_info['paid_amount'] ?? 0); ?></h4>
    <p class="card-text">Fee Paid</p>
</div>


</div>



<div class="col-md-4">


<div class="card-modern">
    <div class="card-icon">
        <i class="fa-solid fa-comment-dots"></i>
    </div>
    <h4 class="card-title"><?php echo $complaints_count; ?></h4>
    <p class="card-text">Complaints</p>
</div>


</div>

</div>



<!-- Student Information -->


<div class="card-modern mt-4">


<div class="card-body">


<h4 class="card-title mb-3">
    <i class="fa-solid fa-user-circle me-2" style="color: var(--primary);"></i>
    Student Information
</h4>


<div class="row g-3">
    <div class="col-md-6">
        <p class="mb-0"><strong style="color: var(--text);">Name:</strong> <span style="color: var(--text-secondary);"><?php echo htmlspecialchars($student_info['name']); ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="mb-0"><strong style="color: var(--text);">Enrollment No:</strong> <span style="color: var(--text-secondary);"><?php echo htmlspecialchars($student_info['enrollment_no']); ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="mb-0"><strong style="color: var(--text);">Course:</strong> <span style="color: var(--text-secondary);"><?php echo htmlspecialchars($student_info['course']); ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="mb-0"><strong style="color: var(--text);">Semester:</strong> <span style="color: var(--text-secondary);"><?php echo htmlspecialchars($student_info['semester']); ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="mb-0"><strong style="color: var(--text);">Mobile:</strong> <span style="color: var(--text-secondary);"><?php echo htmlspecialchars($student_info['mobile']); ?></span></p>
    </div>
    <div class="col-md-6">
        <p class="mb-0"><strong style="color: var(--text);">Email:</strong> <span style="color: var(--text-secondary);"><?php echo htmlspecialchars($student_info['email']); ?></span></p>
    </div>
</div>


</div>


</div>



<!-- Latest Notice -->


<div class="card-modern mt-4">


<div class="card-body">


<h4 class="card-title mb-3">
    <i class="fa-solid fa-bell me-2" style="color: var(--primary);"></i>
    Latest Notice
</h4>


<?php if(mysqli_num_rows($notices) > 0): ?>
<div class="list-group list-group-flush">
    <?php while($notice = mysqli_fetch_assoc($notices)): ?>
    <div class="list-group-item" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.05); padding: 1rem 0;">
        <div class="d-flex align-items-center gap-3">
            <div class="logo-icon" style="width: 40px; height: 40px; font-size: 1rem; flex-shrink: 0;">
                <i class="fa-solid fa-bullhorn"></i>
            </div>
            <div>
                <h6 class="mb-1" style="color: var(--text);"><?php echo htmlspecialchars($notice['title']); ?></h6>
                <small style="color: var(--text-muted);"><?php echo htmlspecialchars($notice['publish_date']); ?></small>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
<?php else: ?>
<p class="text-secondary mb-0">No notices available at the moment.</p>
<?php endif; ?>



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