<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $enrollment_no = mysqli_real_escape_string($conn, $_POST['enrollment_no']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $room_no = mysqli_real_escape_string($conn, $_POST['room_no']);
    
    $query = "INSERT INTO students (name, enrollment_no, course, semester, mobile, email, password, room_no) 
              VALUES ('$name', '$enrollment_no', '$course', '$semester', '$mobile', '$email', '$password', '$room_no')";
    
    if(mysqli_query($conn, $query)) {
        // Update room occupancy
        mysqli_query($conn, "UPDATE rooms SET occupied = occupied + 1 WHERE room_no = '$room_no'");
        header("Location: students.php?success=Student added successfully");
    } else {
        header("Location: students.php?error=Error adding student");
    }
}
?>