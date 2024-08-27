<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="image" accept="image/*">
  <button type="submit">Upload Image</button>
</form>
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
  die("Connection failed: " . $conn->connect_error);
}

// Upload image
if (isset($_FILES['image'])) {
  $image = $_FILES['image'];
  $image_name = $image['name'];
  $image_tmp_name = $image['tmp_name'];
  $image_size = $image['size'];
  $image_type = $image['type'];

  // Check if image is valid
  if ($image_type == 'image/jpeg' || $image_type == 'image/png' || $image_type == 'image/gif') {
    // Upload image to server
    $upload_dir = 'uploads/';
    $image_path = $upload_dir . $image_name;
    move_uploaded_file($image_tmp_name, $image_path);

    // Insert image into database
    $sql = "INSERT INTO images (`image`) VALUES ('$image_path')";
    $conn->query($sql);

    echo "Image uploaded successfully!";
  } else {
    echo "Invalid image type. Only JPEG, PNG, and GIF are allowed.";
  }
}

// Retrieve images from database
$sql = "SELECT `image` FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?>
  <div id="carousel-example" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php
      $i = 0;
      while ($row = $result->fetch_assoc()) {
        ?>
        <li data-target="#carousel-example" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
        <?php
        $i++;
      }
      ?>
    </ol>
    <div class="carousel-inner">
      <?php
      $i = 0;
      while ($row = $result->fetch_assoc()) {
        ?>
        <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
          <img src="<?php echo $row['image_path']; ?>" alt="Image">
        </div>
        <?php
        $i++;
      }
      ?>
    </div>
    <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <?php
} else {
  echo "No images found.";
}

$conn->close();
?>