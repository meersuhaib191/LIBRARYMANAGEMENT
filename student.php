<?php

$conn = mysqli_connect("localhost", "root", "", "attendence");

// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Retrieve the data from the form
$enrollment_number = $_POST['enrollment-number'];


// Join the two queries
$query = "SELECT fs.id, fs.student, fs.enrollment, i.date, i.book_name, i.book_author, i.book_code, DATEDIFF(CURDATE(), i.date) AS days_left
FROM firstsem fs
JOIN issued i ON fs.enrollment = i.student_enrollment
WHERE fs.enrollment = '$enrollment_number'";
$result = mysqli_query($conn, $query);

?>

<a href="bookshow.php">
<button class="btn btn-outline-primary mt-2 ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16" >
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
</svg>

</button>
</a>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Book List</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style> 
@media only screen and (max-width: 768px) {
   .table-responsive {
        overflow:scroll;
    }

   .table-responsive::-webkit-scrollbar {
        visibility: hidden;
    }

   .table-responsive {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }}
</style>
</head>
<body class="text-white" style=" background:linear-gradient(to right, rgb(37, 37, 57),rgb(114, 128, 148));
">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-responsive mt-4">
                    <tr>
                        <th>Issue ID</th>
                        <th>Name</th>
                        <th>Enrollment</th>
                        <th>Issue Date</th>
                        <th>Book Name</th>
                        <th>Book Author</th>
                        <th>Book Code</th>
                        <th>Days Since Issued</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['student'];?></td>
                        <td><?php echo $row['enrollment'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['book_name'];?></td>
                        <td><?php echo $row['book_author'];?></td>
                        <td><?php echo $row['book_code'];?></td>
                        <td><?php echo $row['days_left'];?></td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>