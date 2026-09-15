<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | K.D Hostel Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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
                        <a class="nav-link nav-link-modern" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern" href="facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern active" href="gallery.php">Gallery</a>
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

    <!-- ===================== MODERN PAGE HEADER ===================== -->

    <section class="hero-modern" style="min-height: 40vh;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="hero-badge animate-fade-in-up">
                        <i class="fa-solid fa-images"></i>
                        Photo Gallery
                    </div>
                    <h1 class="hero-title animate-fade-in-up animate-delay-1" style="font-size: 2.5rem;">
                        Hostel Gallery
                    </h1>
                    <p class="hero-subtitle animate-fade-in-up animate-delay-2" style="margin: 0 auto;">
                        Explore K.D Polytechnic Hostel
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== GALLERY START ===================== -->

    <section class="container py-5">

        <div class="row g-4">

            <!-- Image 1 -->

            <div class="col-lg-4 col-md-6 animate-fade-in-up">

                <div class="card-modern" style="padding: 0; overflow: hidden;">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1766560896_9692.jpg"
                        class="img-fluid w-100"
                        style="height: 250px; object-fit: cover; transition: var(--transition);"
                        alt="Hostel Building">

                    <div style="padding: 1.5rem;">
                        <h5 class="card-title mb-0">Hostel Building</h5>
                    </div>

                </div>

            </div>



            <!-- Image 2 -->

            <div class="col-lg-4 col-md-6 animate-fade-in-up animate-delay-1">

                <div class="card-modern" style="padding: 0; overflow: hidden;">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1778835390_2665.jpg"
                        class="img-fluid w-100"
                        style="height: 250px; object-fit: cover; transition: var(--transition);"
                        alt="Room">

                    <div style="padding: 1.5rem;">
                        <h5 class="card-title mb-0">Student Rooms</h5>
                    </div>

                </div>

            </div>



            <!-- Image 3 -->

            <div class="col-lg-4 col-md-6 animate-fade-in-up animate-delay-2">

                <div class="card-modern" style="padding: 0; overflow: hidden;">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1778835390_7166.jpeg"
                        class="img-fluid w-100"
                        style="height: 250px; object-fit: cover; transition: var(--transition);"
                        alt="Mess">

                    <div style="padding: 1.5rem;">
                        <h5 class="card-title mb-0">Dining Hall</h5>
                    </div>

                </div>

            </div>



            <!-- Image 4 -->

            <div class="col-lg-4 col-md-6 animate-fade-in-up">

                <div class="card-modern" style="padding: 0; overflow: hidden;">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1771392254_5499.jpeg"
                        class="img-fluid w-100"
                        style="height: 250px; object-fit: cover; transition: var(--transition);"
                        alt="Study Area">

                    <div style="padding: 1.5rem;">
                        <h5 class="card-title mb-0">Study Area</h5>
                    </div>

                </div>

            </div>



            <!-- Image 5 -->

            <div class="col-lg-4 col-md-6 animate-fade-in-up animate-delay-1">

                <div class="card-modern" style="padding: 0; overflow: hidden;">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1778835372_1871.jpeg"
                        class="img-fluid w-100"
                        style="height: 250px; object-fit: cover; transition: var(--transition);"
                        alt="Campus">

                    <div style="padding: 1.5rem;">
                        <h5 class="card-title mb-0">Hostel Campus</h5>
                    </div>

                </div>

            </div>



            <!-- Image 6 -->

            <div class="col-lg-4 col-md-6 animate-fade-in-up animate-delay-2">

                <div class="card-modern" style="padding: 0; overflow: hidden;">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1778835372_9388.jpeg"
                        class="img-fluid w-100"
                        style="height: 250px; object-fit: cover; transition: var(--transition);"
                        alt="Events">

                    <div style="padding: 1.5rem;">
                        <h5 class="card-title mb-0">Hostel Events</h5>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ===================== GALLERY END ===================== -->

    <!-- ===================== MODERN FOOTER ===================== -->

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