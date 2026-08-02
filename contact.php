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


<!-- Custom CSS -->

<link rel="stylesheet" href="css/style.css">


</head>


<body>


<!-- ================= NAVBAR START ================= -->


<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top">


<div class="container">



<a class="navbar-brand d-flex align-items-center" href="index.php">


<i class="fa-solid fa-building fa-2x text-white me-3"></i>


<div>


<h5 class="text-white mb-0 fw-bold">

K.D Polytechnic Hostel Patan

</h5>


<small class="text-light">

Management System

</small>


</div>


</a>




<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#menu">


<span class="navbar-toggler-icon"></span>


</button>




<div class="collapse navbar-collapse" id="menu">


<ul class="navbar-nav ms-auto">



<li class="nav-item">

<a class="nav-link" href="index.php">

Home

</a>

</li>




<li class="nav-item">

<a class="nav-link" href="about.php">

About

</a>

</li>




<li class="nav-item">

<a class="nav-link" href="facilities.php">

Facilities

</a>

</li>




<li class="nav-item">

<a class="nav-link" href="gallery.php">

Gallery

</a>

</li>




<li class="nav-item">

<a class="nav-link active" href="contact.php">

Contact

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







<!-- ================= PAGE HEADER ================= -->


<section class="bg-primary text-white text-center py-5">


<div class="container">


<h1 class="display-4 fw-bold">

Contact Us

</h1>


<p class="lead">

We are here to help you.

</p>


</div>


</section>







<!-- ================= CONTACT SECTION ================= -->


<section class="container py-5">


<div class="row">


<!-- Contact Form -->


<div class="col-lg-7">


<div class="card shadow p-4">


<h3 class="mb-4 text-primary">

Send Us a Message

</h3>

<?php if(isset($success)): ?>
<div class="alert alert-success"><?php echo $success; ?></div>
<?php endif; ?>

<?php if(isset($error)): ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>



<form method="POST" action="">



<div class="mb-3">

<label class="form-label">

Full Name

</label>


<input type="text"
name="name"
class="form-control"
placeholder="Enter your name" required>


</div>





<div class="mb-3">

<label class="form-label">

Email Address

</label>


<input type="email"
name="email"
class="form-control"
placeholder="Enter your email" required>


</div>





<div class="mb-3">

<label class="form-label">

Phone Number

</label>


<input type="text"
name="phone"
class="form-control"
placeholder="Enter phone number" required>


</div>





<div class="mb-3">

<label class="form-label">

Subject

</label>


<input type="text"
name="subject"
class="form-control"
placeholder="Subject" required>


</div>





<div class="mb-3">

<label class="form-label">

Message

</label>


<textarea
name="message"
class="form-control"
rows="5"
placeholder="Write your message" required></textarea>


</div>





<button class="btn btn-primary">


<i class="fa-solid fa-paper-plane"></i>

Send Message


</button>



</form>


</div>


</div>







<!-- Contact Information -->


<div class="col-lg-5">


<div class="card shadow p-4">


<h3 class="text-primary">

Contact Information

</h3>


<hr>




<p>


<i class="fa-solid fa-location-dot text-danger"></i>


<strong> Address</strong>


<br>


K. D. Polytechnic, Patan

<br>


Opp. T. B. Hospital,

<br>


Hemchandracharya North Gujarat University Road,

<br>


Patan - 384265, Gujarat


</p>


<hr>




<p>


<i class="fa-solid fa-phone text-success"></i>


<strong> Phone</strong>


<br>


02766 220419


</p>




<hr>




<p>


<i class="fa-solid fa-envelope text-primary"></i>


<strong> Email</strong>


<br>


kdp-patan-dte@gujarat.gov.in


</p>




<hr>




<p>


<i class="fa-solid fa-clock text-warning"></i>


<strong> Office Hours</strong>


<br>


Monday - Saturday

<br>


9:00 AM - 5:00 PM


</p>


</div>


</div>


</div>


</section>





<!-- ================= GOOGLE MAP ================= -->


<section class="container pb-5">


<div class="card shadow">


<div class="card-body">


<h3 class="text-center mb-4">

Our Location

</h3>


<iframe

src="https://www.google.com/maps?q=KD%20Polytechnic%20Patan&output=embed"

width="100%"

height="450"

style="border:0;"

allowfullscreen=""

loading="lazy">


</iframe>


</div>


</div>


</section>





<!-- ================= FOOTER ================= -->


<footer class="bg-primary text-white text-center py-4">


<div class="container">



<h5>

K.D HOSTEL Management System

</h5>



<p>

K. D. Polytechnic, Patan

<br>

Opp. T. B. Hospital,
Hemchandracharya North Gujarat University Road,

<br>

Patan - 384265, Gujarat

</p>



<p>

© 2026 All Rights Reserved

</p>


</div>


</footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>