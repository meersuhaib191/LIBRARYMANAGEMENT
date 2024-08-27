<?php
// Check if user is logged in
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: bookshow.php");
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
    <title>Library Management System - Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylee.css">
    <style>table tr {
  background: transparent;
}
.table td, .table th {
  background-color: transparent !important;
  border: none;
  color: white;
}</style>
</head>
<body style=" background:linear-gradient(to right, rgb(37, 37, 57),rgb(114, 128, 148));">

<nav class="navbar navbar-expand-lg   w-100" style="background:transparent;">
        <div class="container-fluid " style="width: 100%;">
          <a class="navbar-brand"  href="bookshow.php" style="color: white;">Log out </a></>
          <button  class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon" style="color:white;">📃</span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
              <a href="add_book.php" class="nav-link active" style="color: white;">Add Book</a>
                
              </li>
              <li class="nav-item">
              <a href="issue.html" class="nav-link active" style="color: white;">Issue Book</a></li>
              <li class="nav-item">
                <a class="nav-link" href="return.php">Return</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown link
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
   




    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-2 h-100% ">
                <div class="nav flex-column">

                  
                    <ul class="nav flex-column ">
                        <li class="nav-item">
                        <h4 class="mt-2" style="color: white;">Department</h4>
                            <div class="dropdown">
  <button style="background: transparent; border:none;border-bottom:1px solid white" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Btech
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="firstshow.php">First sem</a></li>
    <li><a class="dropdown-item" href="firstshow.php">Second sem</a></li>
    <li><a class="dropdown-item" href="firstshow.php">Third sem</a></li>
    <li><a class="dropdown-item" href="firstshow.php">Fourth sem</a></li>
    
  </ul>
</div>
                            <div class="dropdown">
  <button style="background: transparent; border:none;border-bottom:1px solid white" class="btn btn-secondary dropdown-toggle mt-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    IMBA
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="firstshow.php">First sem</a></li>
    <li><a class="dropdown-item" href="firstshow.php">Second sem</a></li>
    <li><a class="dropdown-item" href="firstshow.php">Third sem</a></li>
    <li><a class="dropdown-item" href="firstshow.php">Fourth sem</a></li>
    
  </ul>
</div>
                            <div class="dropdown">
  <button style="background: transparent; border:none;border-bottom:1px solid white" class="btn btn-secondary dropdown-toggle mt-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    English
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="firstshow.php">First sem</a></li>
    <li><a class="dropdown-item" href="firstshow.php">Second sem</a></li>
    <li><a class="dropdown-item" href="firstshow.php">Third sem</a></li>
    <li><a class="dropdown-item" href="firstshow.php">Fourth sem</a></li>
    
  </ul>
</div>

                         
                        </li>
                    </ul>
                </div>
            </div>



            <div class="col-md-10 h-100  mt-4">
                <!-- Add content here -->
              
<div class="container-fluid">
        <div class="row">
           
            <div class="col-md-12 " >
              


            



                <div class="float-end d-inline" >
    <form action="searchshow.php" method="post" >
        <input type="text" id="search" name="search" style="width: 60%;background: transparent;border:none; border-bottom:2px solid white;box-shadow:1px 1px 5px wheat;color:white;" class="form-control me-2 d-inline mt-4" type="search" placeholder="Search Book" aria-label="Search">
        <input type="submit" value="Search" class="btn btn-outline-danger d-inline" type="submit">
        
    </form>
</div>



<h1 style="color: white;">Books</h1>   
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
    
 


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>