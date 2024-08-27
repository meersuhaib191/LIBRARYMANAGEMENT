<?php
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

// Retrieve all books from database
$query = "SELECT * FROM firstsem 
          INNER JOIN issued 
          ON firstsem.enrollment = issued.student_enrollment 
          GROUP BY issued.id";
$result = mysqli_query($conn, $query);

// Display book list
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Book List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <style>
        /* Add scroll to table on smaller screens */
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            .table td, .table th {
                white-space: nowrap;
            }
            .table-responsive table {
                width: 100%;
                margin-bottom: 0;
            }
            .table-responsive thead th {
                border: none;
            }
            .table-responsive tbody th {
                border: none;
            }
        }
        .btn-3d {
    position: relative;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.btn-3d:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
}

.btn-3d-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    transform: translateY(10px);
    transition: all 0.3s ease;
}

.btn-3d:hover .btn-3d-overlay {
    transform: translateY(0);
    background-color: rgba(255, 255, 255, 0.4);
}
body{
 background:linear-gradient(to right, rgb(37, 37, 57),rgb(114, 128, 148));
color: white !important;
font-size: large !important;
font-weight: bold !important;
  
}
    </style>
</head>
<body>
    <nav style="background:transparent !important;" class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="dashboard.php"><button class="btn btn-primary btn-3d">
    <i class="fas fa-arrow-left"></i> Back
    <span class="btn-3d-overlay"></span>
</button></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="return.php">Return<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="firstb.html" style="color:gainsboro;">Add Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="issue.html">Issue Book</a>
                </li>
               
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1 class="text-center">First Semester List</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Issue ID</th>
                        <th>Name</th>
                        <th>Enrollment</th>
                        <th>Issued On</th>
                        <th>Book Name</th>
                        <th>Book Author</th>
                        <th>Book Code</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><?php echo $row['id'];?></td> 
                        <td><?php echo $row['student'];?></td>
                        <td><?php echo $row['enrollment'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['book_name'];?></td>
                        <td><?php echo $row['book_author'];?></td>
                        <td><?php echo $row['book_code'];?></td>
                        <td><?php echo $row['dateissued'];?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>