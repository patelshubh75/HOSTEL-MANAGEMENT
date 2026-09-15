<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | K.D Hostel Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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
                    <a class="nav-link nav-link-modern active" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern" href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern" href="contact.php">Contact</a>
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
                    <i class="fa-solid fa-info-circle"></i>
                    About Us
                </div>
                <h1 class="hero-title animate-fade-in-up animate-delay-1" style="font-size: 2.5rem;">
                    About K.D Hostel
                </h1>
                <p class="hero-subtitle animate-fade-in-up animate-delay-2" style="margin: 0 auto;">
                    Safe • Secure • Comfortable Hostel
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= ABOUT SECTION ================= -->

<section class="container py-5">
    <div class="row align-items-center g-5">
        <div class="col-lg-6 animate-fade-in-up">
            <div class="hero-logo-circle mx-auto" style="width: 300px; height: 300px;">
                <img src="https://kdppatan.ac.in/Admin/uploads/logo1_1766135259.png"
                     alt="K.D Polytechnic Logo">
            </div>
        </div>
        <div class="col-lg-6 animate-fade-in-up animate-delay-1">
            <h2 class="fw-bold mb-4" style="color: var(--text);">
                <i class="fa-solid fa-graduation-cap me-2" style="color: var(--primary);"></i>
                About Our Hostel
            </h2>
            <p class="mb-3" style="color: var(--text-secondary); line-height: 1.8;">
                K.D Hostel Management System is designed to provide students with a safe, secure and comfortable environment. The hostel offers modern facilities including WiFi, library, mess, parking, laundry and 24×7 security.
            </p>
            <p class="mb-4" style="color: var(--text-secondary); line-height: 1.8;">
                Our goal is to create a friendly atmosphere where students can focus on their education while enjoying excellent hostel facilities.
            </p>
            <div class="d-flex gap-3 flex-wrap">
                <div class="d-flex align-items-center gap-2">
                    <div class="logo-icon" style="width: 40px; height: 40px; font-size: 1rem;">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <span style="color: var(--text);">Safe Environment</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="logo-icon" style="width: 40px; height: 40px; font-size: 1rem;">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <span style="color: var(--text);">Modern Facilities</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="logo-icon" style="width: 40px; height: 40px; font-size: 1rem;">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <span style="color: var(--text);">24/7 Security</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= MISSION & VISION ================= -->

<section class="py-5" style="background: var(--background);">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 animate-fade-in-up">
                <div class="card-modern">
                    <div class="card-icon">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h4 class="card-title">Our Mission</h4>
                    <p class="card-text">
                        To provide students with safe accommodation, excellent facilities and a disciplined environment for learning.
                    </p>
                </div>
            </div>
            <div class="col-md-6 animate-fade-in-up animate-delay-1">
                <div class="card-modern">
                    <div class="card-icon">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h4 class="card-title">Our Vision</h4>
                    <p class="card-text">
                        To become one of the best student hostels by offering quality services and modern management.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= WHY CHOOSE US ================= -->

<section class="container py-5">
    <h2 class="text-center fw-bold mb-5" style="color: var(--text);">
        Why Choose K.D Hostel?
    </h2>
    <div class="row g-4">
        <div class="col-md-3 animate-fade-in-up">
            <div class="card-modern text-center">
                <div class="card-icon">
                    <i class="fa-solid fa-wifi"></i>
                </div>
                <h4 class="card-title">Free WiFi</h4>
                <p class="card-text">High-speed internet connectivity throughout the campus</p>
            </div>
        </div>
        <div class="col-md-3 animate-fade-in-up animate-delay-1">
            <div class="card-modern text-center">
                <div class="card-icon">
                    <i class="fa-solid fa-book"></i>
                </div>
                <h4 class="card-title">Library</h4>
                <p class="card-text">Well-stocked library for study and research</p>
            </div>
        </div>
        <div class="col-md-3 animate-fade-in-up animate-delay-2">
            <div class="card-modern text-center">
                <div class="card-icon">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h4 class="card-title">24×7 Security</h4>
                <p class="card-text">Round-the-clock security for your safety</p>
            </div>
        </div>
        <div class="col-md-3 animate-fade-in-up animate-delay-3">
            <div class="card-modern text-center">
                <div class="card-icon">
                    <i class="fa-solid fa-utensils"></i>
                </div>
                <h4 class="card-title">Healthy Mess</h4>
                <p class="card-text">Nutritious and hygienic food facilities</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= MODERN FOOTER ================= -->

<footer class="footer-modern">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0 text-white-50">© 2026 K.D Hostel Management System | All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
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