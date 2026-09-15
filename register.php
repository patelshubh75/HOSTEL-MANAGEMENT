<?php

session_start();
require_once 'config/database.php';

$error = "";
$success = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $enrollment_no = mysqli_real_escape_string($conn, trim($_POST['enrollment_no']));
    $course = mysqli_real_escape_string($conn, trim($_POST['course']));
    $semester = mysqli_real_escape_string($conn, trim($_POST['semester']));
    $mobile = mysqli_real_escape_string($conn, trim($_POST['mobile']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Input validation
    if(empty($name) || empty($enrollment_no) || empty($course) || empty($semester) || 
       empty($mobile) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required";
    } elseif(!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = "Name should only contain letters and spaces";
    } elseif(strlen($enrollment_no) < 5 || strlen($enrollment_no) > 20) {
        $error = "Enrollment number must be between 5-20 characters";
    } elseif(!preg_match("/^[0-9]{10}$/", $mobile)) {
        $error = "Mobile number must be exactly 10 digits";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } elseif(strlen($password) < 6) {
        $error = "Password must be at least 6 characters long";
    } elseif($password !== $confirm_password) {
        $error = "Passwords do not match";
    } else {
        // Check for duplicate enrollment number
        $check_enrollment = mysqli_query($conn, "SELECT id FROM students WHERE enrollment_no = '$enrollment_no'");
        if(mysqli_num_rows($check_enrollment) > 0) {
            $error = "Enrollment number already registered";
        } else {
            // Check for duplicate email
            $check_email = mysqli_query($conn, "SELECT id FROM students WHERE email = '$email'");
            if(mysqli_num_rows($check_email) > 0) {
                $error = "Email already registered";
            } else {
                // Hash the password securely
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert student data into database
                $query = "INSERT INTO students (name, enrollment_no, course, semester, mobile, email, password, room_no) 
                          VALUES ('$name', '$enrollment_no', '$course', '$semester', '$mobile', '$email', '$hashed_password', NULL)";
                
                $result = mysqli_query($conn, $query);
                
                if($result) {
                    $student_id = mysqli_insert_id($conn);
                    $allocated_room = null;
                    
                    // Auto-allocate room to new student
                    $room_query = "SELECT room_no FROM rooms WHERE status = 'Available' AND occupied < capacity ORDER BY room_no ASC LIMIT 1";
                    $room_result = mysqli_query($conn, $room_query);
                    
                    if($room_result && mysqli_num_rows($room_result) > 0) {
                        $room_row = mysqli_fetch_assoc($room_result);
                        $allocated_room = $room_row['room_no'];
                        
                        // Update student with allocated room
                        $update_student = "UPDATE students SET room_no = '$allocated_room' WHERE id = $student_id";
                        mysqli_query($conn, $update_student);
                        
                        // Update room occupied count
                        $get_occupied = "SELECT occupied FROM rooms WHERE room_no = '$allocated_room'";
                        $occupied_result = mysqli_query($conn, $get_occupied);
                        if($occupied_result) {
                            $occupied_row = mysqli_fetch_assoc($occupied_result);
                            $new_occupied = $occupied_row['occupied'] + 1;
                            
                            // Check if room is now full
                            $get_capacity = "SELECT capacity FROM rooms WHERE room_no = '$allocated_room'";
                            $capacity_result = mysqli_query($conn, $get_capacity);
                            if($capacity_result) {
                                $capacity_row = mysqli_fetch_assoc($capacity_result);
                                $new_status = ($new_occupied >= $capacity_row['capacity']) ? 'Occupied' : 'Available';
                                
                                $update_room = "UPDATE rooms SET occupied = $new_occupied, status = '$new_status' WHERE room_no = '$allocated_room'";
                                mysqli_query($conn, $update_room);
                            }
                        }
                        
                        // Add to room allocation history
                        $allocation_date = date('Y-m-d');
                        $history_query = "INSERT INTO room_allocation_history (student_id, room_no, allocation_date, status) 
                                       VALUES ($student_id, '$allocated_room', '$allocation_date', 'Allocated')";
                        mysqli_query($conn, $history_query);
                    }
                    
                    // Create fee entry for new student (pending status)
                    $total_fee = 25000; // Default total fee
                    $paid_amount = 0;
                    $pending_amount = $total_fee;
                    $payment_status = 'Pending';
                    
                    $fee_query = "INSERT INTO fees (student_id, total_fee, paid_amount, pending_amount, payment_status) 
                                 VALUES ($student_id, $total_fee, $paid_amount, $pending_amount, '$payment_status')";
                    mysqli_query($conn, $fee_query);
                    
                    $room_message = $allocated_room ? "Room allocated: $allocated_room" : "No rooms available - please contact admin";
                    $success = "Registration successful! $room_message. Redirecting to login...";
                    // Redirect to login page after 2 seconds
                    header("refresh:2;url=login.php");
                } else {
                    $error = "Registration failed: " . mysqli_error($conn);
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Registration | K.D Hostel Management System</title>


<!-- Bootstrap CSS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Font Awesome -->

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


<!-- Modern CSS -->
<link rel="stylesheet" href="css/modern.css">


</head>


<body class="bg-light">



<!-- Modern Navbar -->

<nav class="navbar navbar-modern" id="mainNavbar">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand navbar-brand-modern" href="index.php">
            <div class="logo-icon">
                <i class="fa-solid fa-building"></i>
            </div>
            <div class="brand-text">
                <span class="brand-primary">K.D Polytechnic Hostel</span>
                <span class="brand-secondary">Patan</span>
            </div>
        </a>
    </div>
</nav>




<!-- Registration Section -->


<section class="container py-5">


<div class="row justify-content-center">


<div class="col-md-6">



<div class="form-modern animate-fade-in-up">



<div class="text-center mb-4">

<div class="logo-icon mx-auto mb-3" style="width: 64px; height: 64px; font-size: 1.75rem;">
    <i class="fa-solid fa-user-plus"></i>
</div>

<h2 class="fw-bold" style="color: var(--text);">
    Student Registration
</h2>

<p style="color: var(--text-secondary);">
    Join K.D Hostel Management System
</p>


</div>



<?php if(isset($error) && $error != ""): ?>
<div class="alert alert-danger" style="border-radius: var(--radius); border: none;">
    <i class="fa-solid fa-circle-exclamation me-2"></i>
    <?php echo $error; ?>
</div>
<?php endif; ?>

<?php if(isset($success) && $success != ""): ?>
<div class="alert alert-success" style="border-radius: var(--radius); border: none;">
    <i class="fa-solid fa-circle-check me-2"></i>
    <?php echo $success; ?>
</div>
<?php endif; ?>



<form method="POST" action="">



<!-- Name -->

<div class="mb-3">

<label class="form-label-modern">Full Name</label>


<div class="input-group">


<span class="input-group-text" style="border: 2px solid rgba(0, 0, 0, 0.08); border-right: none; border-radius: var(--radius) 0 0 var(--radius); background: var(--background);">

<i class="fa fa-user" style="color: var(--text-secondary);"></i>

</span>


<input type="text"
name="name"
class="form-control form-control-modern"
style="border-left: none; border-radius: 0 var(--radius) var(--radius) 0;"
placeholder="Enter Full Name"
required
pattern="[a-zA-Z ]+"
title="Name should only contain letters and spaces">


</div>


</div>



<!-- Enrollment Number -->

<div class="mb-3">

<label class="form-label-modern">Enrollment Number</label>


<div class="input-group">


<span class="input-group-text" style="border: 2px solid rgba(0, 0, 0, 0.08); border-right: none; border-radius: var(--radius) 0 0 var(--radius); background: var(--background);">

<i class="fa fa-id-card" style="color: var(--text-secondary);"></i>

</span>


<input type="text"
name="enrollment_no"
class="form-control form-control-modern"
style="border-left: none; border-radius: 0 var(--radius) var(--radius) 0;"
placeholder="Enter Enrollment Number"
required
minlength="5"
maxlength="20"
title="Enrollment number must be between 5-20 characters">


</div>


</div>



<!-- Course -->

<div class="mb-3">

<label class="form-label-modern">Course</label>


<div class="input-group">


<span class="input-group-text" style="border: 2px solid rgba(0, 0, 0, 0.08); border-right: none; border-radius: var(--radius) 0 0 var(--radius); background: var(--background);">

<i class="fa fa-graduation-cap" style="color: var(--text-secondary);"></i>

</span>


<input type="text"
name="course"
class="form-control form-control-modern"
style="border-left: none; border-radius: 0 var(--radius) var(--radius) 0;"
placeholder="Enter Course"
required>


</div>


</div>



<!-- Semester -->

<div class="mb-3">

<label class="form-label-modern">Semester</label>


<div class="input-group">


<span class="input-group-text" style="border: 2px solid rgba(0, 0, 0, 0.08); border-right: none; border-radius: var(--radius) 0 0 var(--radius); background: var(--background);">

<i class="fa fa-book" style="color: var(--text-secondary);"></i>

</span>


<select name="semester" class="form-select form-select-modern" style="border-left: none; border-radius: 0 var(--radius) var(--radius) 0;" required>


<option value="">Select Semester</option>


<option value="1st Semester">1st Semester</option>


<option value="2nd Semester">2nd Semester</option>


<option value="3rd Semester">3rd Semester</option>


<option value="4th Semester">4th Semester</option>


<option value="5th Semester">5th Semester</option>


<option value="6th Semester">6th Semester</option>


<option value="7th Semester">7th Semester</option>


<option value="8th Semester">8th Semester</option>


</select>


</div>


</div>



<!-- Mobile -->

<div class="mb-3">

<label class="form-label-modern">Mobile Number</label>


<div class="input-group">


<span class="input-group-text" style="border: 2px solid rgba(0, 0, 0, 0.08); border-right: none; border-radius: var(--radius) 0 0 var(--radius); background: var(--background);">

<i class="fa fa-phone" style="color: var(--text-secondary);"></i>

</span>


<input type="tel"
name="mobile"
class="form-control form-control-modern"
style="border-left: none; border-radius: 0 var(--radius) var(--radius) 0;"
placeholder="Enter 10-digit Mobile Number"
required
pattern="[0-9]{10}"
maxlength="10"
title="Mobile number must be exactly 10 digits">


</div>


</div>



<!-- Email -->

<div class="mb-3">

<label class="form-label-modern">Email Address</label>


<div class="input-group">


<span class="input-group-text" style="border: 2px solid rgba(0, 0, 0, 0.08); border-right: none; border-radius: var(--radius) 0 0 var(--radius); background: var(--background);">

<i class="fa fa-envelope" style="color: var(--text-secondary);"></i>

</span>


<input type="email"
name="email"
class="form-control form-control-modern"
style="border-left: none; border-radius: 0 var(--radius) var(--radius) 0;"
placeholder="Enter Email Address"
required>


</div>


</div>



<!-- Password -->

<div class="mb-3">

<label class="form-label-modern">Password</label>


<div class="input-group">


<span class="input-group-text" style="border: 2px solid rgba(0, 0, 0, 0.08); border-right: none; border-radius: var(--radius) 0 0 var(--radius); background: var(--background);">

<i class="fa fa-lock" style="color: var(--text-secondary);"></i>

</span>


<input type="password"
name="password"
class="form-control form-control-modern"
style="border-left: none; border-radius: 0 var(--radius) var(--radius) 0;"
placeholder="Enter Password (min 6 characters)"
required
minlength="6"
title="Password must be at least 6 characters long">


</div>


</div>



<!-- Confirm Password -->

<div class="mb-4">

<label class="form-label-modern">Confirm Password</label>


<div class="input-group">


<span class="input-group-text" style="border: 2px solid rgba(0, 0, 0, 0.08); border-right: none; border-radius: var(--radius) 0 0 var(--radius); background: var(--background);">

<i class="fa fa-lock" style="color: var(--text-secondary);"></i>

</span>


<input type="password"
name="confirm_password"
class="form-control form-control-modern"
style="border-left: none; border-radius: 0 var(--radius) var(--radius) 0;"
placeholder="Confirm Password"
required
minlength="6">


</div>


</div>



<button type="submit" class="btn btn-primary-modern w-100">

<i class="fa-solid fa-user-plus me-2"></i>
Register


</button>



</form>



<hr style="border-color: rgba(0, 0, 0, 0.1);">
<div class="text-center">

<p class="mb-2" style="color: var(--text-secondary);">
    Already have an account? <a href="login.php" style="color: var(--primary); font-weight: 600;">Login here</a>
</p>

<a href="index.php" style="color: var(--text-secondary); font-size: 0.9rem;">
    <i class="fa-solid fa-arrow-left me-1"></i>
    Back to Home
</a>


</div>



</div>


</div>


</section>




<!-- Modern Footer -->


<footer class="footer-modern">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0 text-white-50"> 2026 K.D Hostel Management System</p>
            </div>
        </div>
    </div>
</footer>




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
