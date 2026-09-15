<?php
require_once 'config/database.php';

// Handle contact form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    $query = "INSERT INTO notices (title, category, description, publish_date) 
              VALUES ('$subject', 'Contact', '$message - Contact: $name, $email, $phone', NOW())";
    
    if(mysqli_query($conn, $query)) {
        $success = "Your message has been sent successfully!";
    } else {
        $error = "Error sending message. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Us | K.D Hostel Management System</title>

<!-- Bootstrap CSS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Font Awesome -->

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


<!-- Modern CSS -->
<link rel="stylesheet" href="css/modern.css">


</head>


<body>


<!-- ================= MODERN NAVBAR ================= -->


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
                    <a class="nav-link nav-link-modern" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern" href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern active" href="contact.php">Contact</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a href="login.php" class="btn btn-login-cta">
                        <i class="fa-solid fa-right-to-bracket me-2"></i>Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- ================= MODERN PAGE HEADER ================= -->


<section class="hero-modern" style="min-height: 40vh;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="hero-badge animate-fade-in-up">
                    <i class="fa-solid fa-envelope"></i>
                    Get in Touch
                </div>
                <h1 class="hero-title animate-fade-in-up animate-delay-1" style="font-size: 2.5rem;">
                    Contact Us
                </h1>
                <p class="hero-subtitle animate-fade-in-up animate-delay-2" style="margin: 0 auto;">
                    We are here to help you
                </p>
            </div>
        </div>
    </div>
</section>


<!-- ================= CONTACT SECTION ================= -->


<section class="container py-5">


<div class="row g-5">


<!-- Contact Form -->


<div class="col-lg-7 animate-fade-in-up">


<div class="form-modern">


<h3 class="mb-4 fw-bold" style="color: var(--text);">
    <i class="fa-solid fa-paper-plane me-2" style="color: var(--primary);"></i>
    Send Us a Message
</h3>

<?php if(isset($success)): ?>
<div class="alert alert-success" style="border-radius: var(--radius); border: none;">
    <i class="fa-solid fa-circle-check me-2"></i>
    <?php echo $success; ?>
</div>
<?php endif; ?>

<?php if(isset($error)): ?>
<div class="alert alert-danger" style="border-radius: var(--radius); border: none;">
    <i class="fa-solid fa-circle-exclamation me-2"></i>
    <?php echo $error; ?>
</div>
<?php endif; ?>



<form method="POST" action="">



<div class="mb-3">

<label class="form-label-modern">Full Name</label>


<input type="text"
name="name"
class="form-control form-control-modern"
placeholder="Enter your name" required>


</div>




<div class="mb-3">

<label class="form-label-modern">Email Address</label>


<input type="email"
name="email"
class="form-control form-control-modern"
placeholder="Enter your email" required>


</div>




<div class="mb-3">

<label class="form-label-modern">Phone Number</label>


<input type="text"
name="phone"
class="form-control form-control-modern"
placeholder="Enter phone number" required>


</div>




<div class="mb-3">

<label class="form-label-modern">Subject</label>


<input type="text"
name="subject"
class="form-control form-control-modern"
placeholder="Subject" required>


</div>




<div class="mb-4">

<label class="form-label-modern">Message</label>


<textarea
name="message"
class="form-control form-control-modern"
rows="5"
placeholder="Write your message" required></textarea>


</div>




<button type="submit" class="btn btn-primary-modern w-100">

<i class="fa-solid fa-paper-plane me-2"></i>
Send Message


</button>

</form>
</div>




<!-- Contact Information -->


<div class="col-lg-5 animate-fade-in-up animate-delay-1">


<div class="card-modern">


<h4 class="card-title mb-4">
    <i class="fa-solid fa-address-card me-2" style="color: var(--primary);"></i>
    Contact Information
</h4>


<div class="d-flex gap-3 mb-4">
    <div class="logo-icon" style="width: 48px; height: 48px; font-size: 1.25rem; flex-shrink: 0;">
        <i class="fa-solid fa-location-dot"></i>
    </div>
    <div>
        <h6 class="fw-bold mb-1" style="color: var(--text);">Address</h6>
        <p class="mb-0" style="color: var(--text-secondary); line-height: 1.6;">
            K. D. Polytechnic, Patan<br>
            Opp. T. B. Hospital,<br>
            Hemchandracharya North Gujarat University Road,<br>
            Patan - 384265, Gujarat
        </p>
    </div>
</div>


<div class="d-flex gap-3 mb-4">
    <div class="logo-icon" style="width: 48px; height: 48px; font-size: 1.25rem; flex-shrink: 0;">
        <i class="fa-solid fa-phone"></i>
    </div>
    <div>
        <h6 class="fw-bold mb-1" style="color: var(--text);">Phone</h6>
        <p class="mb-0" style="color: var(--text-secondary);">
            02766 220419
        </p>
    </div>
</div>


<div class="d-flex gap-3 mb-4">
    <div class="logo-icon" style="width: 48px; height: 48px; font-size: 1.25rem; flex-shrink: 0;">
        <i class="fa-solid fa-envelope"></i>
    </div>
    <div>
        <h6 class="fw-bold mb-1" style="color: var(--text);">Email</h6>
        <p class="mb-0" style="color: var(--text-secondary);">
            kdp-patan-dte@gujarat.gov.in
        </p>
    </div>
</div>


<div class="d-flex gap-3">
    <div class="logo-icon" style="width: 48px; height: 48px; font-size: 1.25rem; flex-shrink: 0;">
        <i class="fa-solid fa-clock"></i>
    </div>
    <div>
        <h6 class="fw-bold mb-1" style="color: var(--text);">Office Hours</h6>
        <p class="mb-0" style="color: var(--text-secondary);">
            Monday - Saturday<br>
            9:00 AM - 5:00 PM
        </p>
    </div>
</div>


</div>


</div>


</div>


</section>


<!-- ================= GOOGLE MAP ================= -->


<section class="container pb-5">


<div class="card-modern animate-fade-in-up">


<div class="card-body">


<h4 class="card-title mb-4 text-center">
    <i class="fa-solid fa-map-location-dot me-2" style="color: var(--primary);"></i>
    Our Location
</h3>


<iframe

src="https://www.google.com/maps?q=KD%20Polytechnic%20Patan&output=embed"

width="100%"

height="450"

style="border: 0; border-radius: var(--radius);"

allowfullscreen=""

loading="lazy">

</iframe>

</div>
</div>
</section>


<!-- ================= MODERN FOOTER ================= -->


<footer class="footer-modern">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0 text-white-50"> 2026 K.D Hostel Management System | All Rights Reserved</p>
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