<?php
// Connect to the database
// Check if user is logged in
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "attendence");

// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Insert data into table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $student_enrollment = $_POST["student_enrollment"];
  $book_name = $_POST["book_name"];
  $book_author = $_POST["book_author"];
  $book_code = $_POST["book_code"];

  // Check if student enrollment number exists in firstsem table
  $sql_check = "SELECT * FROM firstsem WHERE enrollment = '$student_enrollment'";
  $result_check = mysqli_query($conn, $sql_check);

  if (mysqli_num_rows($result_check) > 0) {
    // Student enrollment number exists, proceed with inserting data into issued table
    $sql = "INSERT INTO issued (student_enrollment, book_name, book_author, book_code)
            VALUES ('$student_enrollment', '$book_name', '$book_author', '$book_code')";

    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: ". $sql. "<br>". mysqli_error($conn);
    }
  } else {
    // Student enrollment number does not exist, redirect to student.html
    echo "<script>if(confirm('add student first')){window.location.href='firstb.html'};</script>";
    
    exit;
  }
}

// Close connection
mysqli_close($conn);
header("Location:dashboard.php");
?>