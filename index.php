<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.D Polytechnic Hostel Patan - Smart Hostel Management</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Modern CSS -->
    <link rel="stylesheet" href="css/modern.css">
</head>

<body>

    <!-- ===================== MODERN NAVBAR ===================== -->

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
                        <a class="nav-link nav-link-modern active" href="index.php">Home</a>
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

    <!-- ===================== MODERN HERO SECTION ===================== -->

    <section class="hero-modern">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <div class="hero-badge animate-fade-in-up">
                        <i class="fa-solid fa-sparkles"></i>
                        Smart Hostel Management
                    </div>
                    <h1 class="hero-title animate-fade-in-up animate-delay-1">
                        A Smarter Way to<br>Manage Hostel Life
                    </h1>
                    <p class="hero-subtitle animate-fade-in-up animate-delay-2">
                        Safe, secure and smart hostel management for students. Experience modern living with our comprehensive management system.
                    </p>
                    <div class="d-flex gap-3 flex-wrap animate-fade-in-up animate-delay-3">
                        <a href="login.php" class="btn btn-primary-modern">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Login Now
                        </a>
                        <a href="contact.php" class="btn btn-secondary-modern">
                            <i class="fa-solid fa-envelope"></i>
                            Contact Us
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 hero-visual animate-fade-in-up animate-delay-2">
                    <div class="hero-logo-circle">
                        <img src="https://kdppatan.ac.in/Admin/uploads/logo1_1766135259.png"
                             alt="K.D Polytechnic Logo">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== MODERN CONTACT CARDS ===================== -->
    
    <section class="py-5">
        <div class="container py-4">
            <div class="row justify-content-center g-4">
                <div class="col-md-4">
                    <div class="card-modern text-center">
                        <div class="card-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <h4 class="card-title">Address</h4>
                        <p class="card-text">
                            K.D Polytechnic<br>
                            Patan, Gujarat<br>
                            India - 384265
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-modern text-center">
                        <div class="card-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h4 class="card-title">Contact</h4>
                        <p class="card-text">
                            +91 98765 43210<br>
                            +91 87654 32109<br>
                            Mon-Sat: 9:00 AM - 5:00 PM
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-modern text-center">
                        <div class="card-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <h4 class="card-title">Email</h4>
                        <p class="card-text">
                            info@kdhostel.com<br>
                            admin@kdhostel.com<br>
                            admin@kdhostel.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== MODERN FOOTER ===================== -->
    
    <footer class="footer-modern">
        <div class="container">
            <div class="row">
                <!-- Brand Section -->
                <div class="col-lg-4 mb-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="logo-icon" style="width: 48px; height: 48px; font-size: 1.25rem;">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <div>
                            <h5 class="footer-title mb-0">K.D. POLYTECHNIC</h5>
                            <small class="text-white-50">Patan, Gujarat</small>
                        </div>
                    </div>
                    <p class="text-white-50 mb-4">
                        Providing quality education and hostel facilities for students since establishment. Your home away from home.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="#" class="social-link">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <a href="index.php" class="footer-link">Home</a>
                    <a href="about.php" class="footer-link">About Us</a>
                    <a href="facilities.php" class="footer-link">Facilities</a>
                    <a href="gallery.php" class="footer-link">Gallery</a>
                    <a href="contact.php" class="footer-link">Contact Us</a>
                </div>

                <!-- Departments -->
                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="footer-title">Departments</h5>
                    <a href="#" class="footer-link">Computer Engineering</a>
                    <a href="#" class="footer-link">Civil Engineering</a>
                    <a href="#" class="footer-link">Mechanical Engineering</a>
                    <a href="#" class="footer-link">Electrical Engineering</a>
                    <a href="#" class="footer-link">Electronics Engineering</a>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="footer-title">Contact Info</h5>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="fa-solid fa-location-dot text-white-50"></i>
                        <span class="text-white-50">Patan, Gujarat</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="fa-solid fa-phone text-white-50"></i>
                        <span class="text-white-50">+91 98765 43210</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-envelope text-white-50"></i>
                        <span class="text-white-50">info@kdppatan.ac.in</span>
                    </div>
                </div>
            </div>

            <hr class="border-secondary my-4">

            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0 text-white-50">© 2026 K.D Polytechnic, Patan. All Rights Reserved.</p>
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