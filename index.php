<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- ===================== NAVBAR START ===================== -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top">

        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fa-solid fa-hotel"></i> K.D Polytechnic Hostel Patan
            </a>

            <!-- Mobile Menu Button -->
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">HOME</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">ABOUT</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">CONTACT</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>
<!-- Logo -->

    <!-- ===================== NAVBAR END ===================== -->


    <!-- ================= HERO SECTION START ================= -->

    <section class="hero">

        <div class="container text-center">

            <img src="https://kdppatan.ac.in/Admin/uploads/logo1_1766135259.png"
                 alt="K.D Polytechnic Logo"
                 class="hero-logo">

            <h1 class="display-3 fw-bold text-white mt-4">
                K.D HOSTEL
            </h1>

            <h4 class="text-warning mb-3">
                Management System
            </h4>

            <p class="lead text-light">
                Safe, Secure & Smart Hostel Management for Students
            </p>

            <a href="login.php" class="btn btn-warning btn-lg me-2">
                Login
            </a>

            <a href="contact.php" class="btn btn-outline-light btn-lg">
                Contact Us
            </a>

        </div>

    </section>

    <!-- ================= HERO SECTION END ================= -->

    <!-- ================= CONTACT CARDS SECTION START ================= -->
    
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow text-center p-4 h-100">
                        <div class="card-body">
                            <i class="fa-solid fa-location-dot fa-3x text-primary mb-3"></i>
                            <h4 class="card-title fw-bold">Address</h4>
                            <p class="card-text">
                                K.D Polytechnic,<br>
                                Patan, Gujarat,<br>
                                India
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow text-center p-4 h-100">
                        <div class="card-body">
                            <i class="fa-solid fa-phone fa-3x text-success mb-3"></i>
                            <h4 class="card-title fw-bold">Contact</h4>
                            <p class="card-text">
                                +91 98765 43210<br>
                                +91 87654 32109<br>
                                Mon-Sat: 9:00 AM - 5:00 PM
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow text-center p-4 h-100">
                        <div class="card-body">
                            <i class="fa-solid fa-envelope fa-3x text-danger mb-3"></i>
                            <h4 class="card-title fw-bold">Email</h4>
                            <p class="card-text">
                                info@kdhostel.com<br>
                                admin@kdhostel.com<br>
                                support@kdhostel.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= CONTACT CARDS SECTION END ================= -->

    <!-- ================= FOOTER START ================= -->
    
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <!-- Brand Section -->
                <div class="col-md-4 mb-4">
                    <h4 class="fw-bold mb-3">K.D. POLYTECHNIC, PATAN</h4>
                    <p class="text-white-50">Providing quality education and hostel facilities for students since establishment.</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3 fs-4"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-white me-3 fs-4"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="text-white me-3 fs-4"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="text-white fs-4"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.php" class="text-white-50 text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="about.php" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="facilities.php" class="text-white-50 text-decoration-none">Facilities</a></li>
                        <li class="mb-2"><a href="gallery.php" class="text-white-50 text-decoration-none">Gallery</a></li>
                        <li class="mb-2"><a href="contact.php" class="text-white-50 text-decoration-none">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Departments -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold mb-3">Departments</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Computer Engineering</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Civil Engineering</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Mechanical Engineering</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Electrical Engineering</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Electronics Engineering</a></li>
                    </ul>
                </div>

                <!-- Contact Us -->
                <div class="col-md-2 mb-4">
                    <h5 class="fw-bold mb-3">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <span class="text-white-50">Patan, Gujarat</span>
                        </li>
                        <li class="mb-2">
                            <i class="fa-solid fa-phone me-2"></i>
                            <span class="text-white-50">+91 98765 43210</span>
                        </li>
                        <li class="mb-2">
                            <i class="fa-solid fa-envelope me-2"></i>
                            <span class="text-white-50">info@kdppatan.ac.in</span>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="border-secondary">

            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-0 text-white-50">© 2026 K.D Polytechnic, Patan. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ================= FOOTER END ================= -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>