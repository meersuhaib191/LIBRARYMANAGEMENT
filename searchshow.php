


<?php
// Check if user is logged in



// Connect to database
$conn = mysqli_connect("localhost", "root", "", "attendence");

// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Retrieve all books from database
$search_query = $_POST['search'];

// Search query
$query = "SELECT * FROM book WHERE title LIKE '%$search_query%' OR author LIKE '%$search_query%' OR publisher LIKE '%$search_query%'";

// Execute the query
$result = mysqli_query($conn, $query);
// Display book list
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
table tr {
  background: transparent;
}
.table td, .table th {
  background-color: transparent !important;
  border: none;
  color: white;
}
#search{
    background: transparent !important ;
    border: none;
    border-bottom: 2px solid white;
    color: white !important;
}
</style>
  </head>
<body style="background:linear-gradient(to right, rgb(37, 37, 57),rgb(114, 128, 148));">

<a href="library.php">
<button class="btn btn-outline-primary mt-2 ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16" >
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
</svg>
</button>
</a>




    
   <div class="container-fluid">
<div class="row">
<div class="col-md-12 ">
    

<svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
  <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
</svg>
  
    <div class="table-responsive mt-3" >
        <table  class="table table-striped table-bordered bg-transparent">
        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Publication Date</th>
                            <th>ISBN</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
        </table>
    </div> </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
