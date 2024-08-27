<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "attendence");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

// Get form data
$student_name = $_POST['student_name'];
$enrollment_number = $_POST['enrollment_number'];

// Check if enrollment number already exists
$check_sql = "SELECT enrollment FROM firstsem WHERE enrollment = '$enrollment_number'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
  header("Location: issue.html");

} else {
  // Insert data into database
  $sql = "INSERT INTO firstsem (student, enrollment) VALUES ('$student_name', '$enrollment_number')";

  if ($conn->query($sql) === TRUE) {
    header("Location: issue.html");
  } else {
    header("Location:dashboard.php");
  }
}


?>



