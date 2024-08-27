<?php
// Check if user is logged in
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Issue</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>body{
 background:linear-gradient(to right, rgb(37, 37, 57),rgb(114, 128, 148));
color: white !important;
font-size: large !important;
font-weight: bold !important;
  
}
.form-control{
          background: transparent;
          border: none;
          border-bottom: 2px solid white;
         
        }
        h1{
        
          font-weight: bolder;
          font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
</style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Delete Issue</h2> <br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label for="enrollment">Student Enrollment Number:</label>
                        <input type="text" id="enrollment" name="enrollment" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="book_id">Book ID:</label>
                        <input type="text" id="book_id" name="book_id" class="form-control">
                    </div>
                    <button type="submit" name="delete_button" class="btn btn-danger">Delete Issue</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['delete_button'])) {
        $enrollment = $_POST['enrollment'];
        $book_id = $_POST['book_id'];

        // Connect to database
        $conn = mysqli_connect("localhost", "root", "", "attendence");

        // Check connection
        if (!$conn) {
            die("Connection failed: ". mysqli_connect_error());
        }

        // Delete row from "issue" table
        $query = "DELETE FROM issued WHERE book_code = '$book_id' AND student_enrollment = '$enrollment'";
        $result2 = mysqli_query($conn, $query);

        if ($result2) {
            header("Location: firstshow.php");
        } else {
            echo "Error deleting issue: ". mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>