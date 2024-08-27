<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'attendence';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Upload image
if (isset($_FILES['image'])) {
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];

    // Check if image is valid
    if ($image_type == 'image/jpeg' || $image_type == 'image/png' || $image_type == 'image/gif') {
        // Insert image into database
        $query = "INSERT INTO images (image) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("b", $image_data);
        $fp = fopen($image_tmp, 'rb');
        $image_data = fread($fp, $image_size);
        fclose($fp);
        $stmt->execute();
        $stmt->close();
        echo "Image uploaded successfully!";
    } else {
        echo "Invalid image type!";
    }
}

// Close connection
$conn->close();
?>