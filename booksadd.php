<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "attendence");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $publication_date = $_POST['publication_date'];
    $isbn = $_POST['isbn'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO book (title, author, publisher, publication_date, isbn, quantity) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $author, $publisher, $publication_date, $isbn, $quantity);
    $stmt->execute();

    header("Location: dashboard.php");
    exit;
}
?>