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
$query = "SELECT * FROM book";
$result = mysqli_query($conn, $query);

// Display book list
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Book List</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
<div><button><a href="add_book.php">Add Book</a></button></div> <br>
<div><button><a href="dashboard.php">Back</a></button></div>
<div class="container-fluid">
        <div class="row">
           
            <div class="col-md-12 bg-secondary">
              


            



                <div class="float-end d-inline">
    <form action="searchshow.php" method="post">
        <input type="text" id="search" name="search" style="width: 60%;" class="form-control me-2 d-inline mt-4" type="search" placeholder="Search Book" aria-label="Search">
        <input type="submit" value="Search" class="btn btn-outline-danger d-inline" type="submit">
        
    </form>
</div>



<h1>Books</h1>   
    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Publication Date</th>
                <th>ISBN</th>
                <th>Quantity</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['author'];?></td>
                <td><?php echo $row['publisher'];?></td>
                <td><?php echo $row['publication_date'];?></td>
                <td><?php echo $row['isbn'];?></td>
                <td><?php echo $row['quantity'];?></td>
            </tr>
            <?php }?>
        </table>
    </div> </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

 
</body>
</html>