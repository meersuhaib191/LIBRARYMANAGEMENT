<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "attendence");

// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Retrieve the search query from the form
$search_query = $_POST['search'];

// Search query
$query = "SELECT * FROM book WHERE title LIKE '%$search_query%' OR author LIKE '%$search_query%' OR publisher LIKE '%$search_query%'";

// Execute the query
$result = mysqli_query($conn, $query); ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="stylee.css">
        </head>
        <body>

        <button><a href="books.php">back</a></button>

        <table border="1px">
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
            
        </body>
        </html>