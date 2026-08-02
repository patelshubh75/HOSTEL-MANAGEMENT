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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- ===================== NAVBAR START ===================== -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top">

        <div class="container">

            <!-- Logo -->

            <a class="navbar-brand d-flex align-items-center" href="index.php">

                <img src="https://kdppatan.ac.in/Admin/uploads/logo1_1766135259.png"
                    width="50"
                    height="50"
                    class="rounded-circle bg-white p-1 me-2">

                <div>

                    <h5 class="text-white mb-0 fw-bold">
                        K.D HOSTEL
                    </h5>

                    <small class="text-light">
                        Management System
                    </small>

                </div>

            </a>

            <!-- Mobile Menu -->

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fa-solid fa-house"></i> Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">
                            <i class="fa-solid fa-circle-info"></i> About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="facilities.php">
                            <i class="fa-solid fa-building"></i> Facilities
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="gallery.php">
                            <i class="fa-solid fa-image"></i> Gallery
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">
                            <i class="fa-solid fa-phone"></i> Contact
                        </a>
                    </li>

                    <li class="nav-item ms-lg-3">

                        <a class="btn btn-warning fw-bold" href="login.php">

                            <i class="fa-solid fa-right-to-bracket"></i>

                            Login

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- ===================== NAVBAR END ===================== -->



    <!-- ===================== PAGE HEADER ===================== -->

    <section class="bg-primary text-white text-center py-5">

        <div class="container">

            <h1 class="display-4 fw-bold">

                Hostel Gallery

            </h1>

            <p class="lead">

                Explore K.D Polytechnic Hostel

            </p>

        </div>

    </section>



    <!-- ===================== GALLERY START ===================== -->

    <section class="container py-5">

        <div class="row g-4">

            <!-- Image 1 -->

            <div class="col-lg-4 col-md-6">

                <div class="gallery-card">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1766560896_9692.jpg"
                        class="img-fluid rounded shadow"
                        alt="Hostel Building">

                    <h5 class="text-center mt-3">

                        Hostel Building

                    </h5>

                </div>

            </div>



            <!-- Image 2 -->

            <div class="col-lg-4 col-md-6">

                <div class="gallery-card">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1778835390_2665.jpg"
                        class="img-fluid rounded shadow"
                        alt="Room">

                    <h5 class="text-center mt-3">

                        Student Rooms

                    </h5>

                </div>

            </div>



            <!-- Image 3 -->

            <div class="col-lg-4 col-md-6">

                <div class="gallery-card">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1778835390_7166.jpeg"
                        class="img-fluid rounded shadow"
                        alt="Mess">

                    <h5 class="text-center mt-3">

                        Dining Hall

                    </h5>

                </div>

            </div>



            <!-- Image 4 -->

            <div class="col-lg-4 col-md-6">

                <div class="gallery-card">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1771392254_5499.jpeg"
                        class="img-fluid rounded shadow"
                        alt="Study Area">

                    <h5 class="text-center mt-3">

                        Study Area

                    </h5>

                </div>

            </div>



            <!-- Image 5 -->

            <div class="col-lg-4 col-md-6">

                <div class="gallery-card">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1778835372_1871.jpeg"
                        class="img-fluid rounded shadow"
                        alt="Campus">

                    <h5 class="text-center mt-3">

                        Hostel Campus

                    </h5>

                </div>

            </div>



            <!-- Image 6 -->

            <div class="col-lg-4 col-md-6">

                <div class="gallery-card">

                    <img src="https://kdppatan.ac.in/Admin/uploads/hostel/hostel_1778835372_9388.jpeg"
                        class="img-fluid rounded shadow"
                        alt="Events">

                    <h5 class="text-center mt-3">

                        Hostel Events

                    </h5>

                </div>

            </div>

        </div>

    </section>

    <!-- ===================== GALLERY END ===================== -->



    <!-- ===================== FOOTER ===================== -->

    <footer class="bg-primary text-white text-center py-4">

        <div class="container">

            <h5>K.D HOSTEL Management System</h5>

            <p>

                K.D Polytechnic Campus, Patan, Gujarat

            </p>

            <p>

                © 2026 All Rights Reserved

            </p>

        </div>

    </footer>

    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>