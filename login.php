<?php

session_start();
require_once 'config/database.php';

// Handle login form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if($role == "admin") {
        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_num_rows($result) > 0) {
            $admin = mysqli_fetch_assoc($result);
            // Verify password (supports both plain text for existing admin and hashed for new registrations)
            if(password_verify($password, $admin['password']) || $password === $admin['password']) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $username;
                header("Location: admin/dashboard.php");
                exit();
            } else {
                $error = "Invalid admin credentials";
            }
        } else {
            $error = "Invalid admin credentials";
        }
    } elseif($role == "student") {
        $query = "SELECT * FROM students WHERE enrollment_no = '$username'";
        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_num_rows($result) > 0) {
            $student = mysqli_fetch_assoc($result);
            // Verify password (supports both plain text for existing students and hashed for new registrations)
            if(password_verify($password, $student['password']) || $password === $student['password']) {
                $_SESSION['student_logged_in'] = true;
                $_SESSION['student_id'] = $student['id'];
                $_SESSION['student_name'] = $student['name'];
                header("Location: student/dashboard.php");
                exit();
            } else {
                $error = "Invalid student credentials";
            }
        } else {
            $error = "Invalid student credentials";
        }
    } else {
        $error = "Please select a valid role";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | K.D Hostel Management System</title>


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

<nav class="navbar navbar-expand-lg navbar-modern" id="mainNavbar">
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

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-2">
                <li class="nav-item">
                    <a class="nav-link nav-link-modern" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




<!-- Modern Login Section -->


<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6">
            <div class="form-modern animate-fade-in-up">
                <div class="text-center mb-4">
                    <div class="logo-icon mx-auto mb-3" style="width: 64px; height: 64px; font-size: 1.75rem;">
                        <i class="fa-solid fa-user-lock"></i>
                    </div>
                    <h2 class="fw-bold" style="color: var(--text);">Welcome Back</h2>
                    <p class="text-secondary">Sign in to your account</p>
                </div>

                <?php if(isset($error)): ?>
                <div class="alert alert-danger" style="border-radius: var(--radius); border: none;">
                    <i class="fa-solid fa-circle-exclamation me-2"></i>
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <!-- Role -->
                    <div class="mb-3">
                        <label class="form-label-modern">Select Role</label>
                        <select name="role" class="form-select form-select-modern" required>
                            <option value="">Choose Role</option>
                            <option value="admin">Admin</option>
                            <option value="student">Student</option>
                        </select>
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label class="form-label-modern">Username / Enrollment No</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border: 2px solid rgba(0, 0, 0, 0.08); border-right: none; border-radius: var(--radius) 0 0 var(--radius); background: var(--background);">
                                <i class="fa fa-user" style="color: var(--text-secondary);"></i>
                            </span>
                            <input type="text"
                            name="username"
                            class="form-control form-control-modern"
                            style="border-left: none; border-radius: 0 var(--radius) var(--radius) 0;"
                            placeholder="Enter Username"
                            required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="form-label-modern">Password</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border: 2px solid rgba(0, 0, 0, 0.08); border-right: none; border-radius: var(--radius) 0 0 var(--radius); background: var(--background);">
                                <i class="fa fa-lock" style="color: var(--text-secondary);"></i>
                            </span>
                            <input type="password"
                            name="password"
                            class="form-control form-control-modern"
                            style="border-left: none; border-radius: 0 var(--radius) var(--radius) 0;"
                            placeholder="Enter Password"
                            required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary-modern w-100">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Login
                    </button>
                </form>

                <hr class="my-4" style="border-color: rgba(0, 0, 0, 0.1);">

                <div class="text-center">
                    <p class="mb-2" style="color: var(--text-secondary);">
                        New student? <a href="register.php" style="color: var(--primary); font-weight: 600;">Register here</a>
                    </p>
                    <a href="index.php" style="color: var(--text-secondary); font-size: 0.9rem;">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Back to Home
                    </a>
                </div>
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