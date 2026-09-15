<?php
require_once '../config/database.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_no = mysqli_real_escape_string($conn, $_POST['room_no']);
    $block_name = mysqli_real_escape_string($conn, $_POST['block_name']);
    $floor = mysqli_real_escape_string($conn, $_POST['floor']);
    $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    $query = "INSERT INTO rooms (room_no, block_name, floor, capacity, occupied, status) 
              VALUES ('$room_no', '$block_name', '$floor', '$capacity', 0, '$status')";
    
    if(mysqli_query($conn, $query)) {
        header("Location: rooms.php?success=Room added successfully");
    } else {
        header("Location: rooms.php?error=Error adding room");
    }
}
?>