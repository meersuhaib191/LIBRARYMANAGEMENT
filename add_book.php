<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "attendence");

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $publication_date = $_POST['publication_date'];
    $isbn = $_POST['isbn'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO book (title, author, publisher, publication_date, isbn, quantity) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $title, $author, $publisher, $publication_date, $isbn, $quantity);
    $stmt->execute();

    header("Location: ibooks.php");
    exit;
}
?>
#i am updating this code 
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Add Book</title>
    <link rel="stylesheet" href="stylee.css">
    <style>
        body{
            background:linear-gradient(to right, rgb(37, 37, 57),rgb(114, 128, 148));
        }
        input{
            background-color: aqua;
        }
       .container{
            background:transparent;
            border: none;
            color: white;
        }
        .form-control{
          background: transparent;
           border: none !important;
           border-bottom: 2px groove white !important;
           width: 100% !important;
        }
        h1{
            font-size: large;
            font-weight: bold;
            font-family:'Courier New', Courier, monospace;
        }
    </style>
</head>
<body>
<a href="dashboard.php">
<button class="btn btn-outline-primary mt-2 ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16" >
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
</svg>

</button>
</a>
    <div class="container mt-0">
    

        <h1 style="color: white;">Add Book</h1>
        <form action="booksadd.php" method="post" class="form-horizontal">
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label">Title:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="title" name="title">
                </div>
            </div>
            <div class="form-group row">
                <label for="author" class="col-md-4 col-form-label">Author:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="author" name="author">
                </div>
            </div>
            <div class="form-group row">
                <label for="publisher" class="col-md-4 col-form-label">Publisher:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="publisher" name="publisher">
                </div>
            </div>
            <div class="form-group row">
                <label for="publication_date" class="col-md-4 col-form-label">Publication Date:</label>
                <div class="col-md-8">
                    <input type="date" class="form-control" id="publication_date" name="publication_date">
                </div>
            </div>
            <div class="form-group row">
                <label for="isbn" class="col-md-4 col-form-label">ISBN:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="isbn" name="isbn">
                </div>
            </div>
            <div class="form-group row">
                <label for="quantity" class="col-md-4 col-form-label">Quantity:</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <input type="submit" class="btn btn-primary" value="Add Book">
                </div>
            </div>
        </form>
    </div>
</body>

</html>
