<?php
session_start();
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "attendence");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get login credentials
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['username'] = $_POST['username'];
// Query to check if user exists
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // User exists, redirect to dashboard
    header("Location: dashboard.php");
    exit;
} else {
    // User doesn't exist, display error message
    header("Location:bookshow.php");
}

// Close connection
mysqli_close($conn);
?>