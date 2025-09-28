<?php
session_start();
include "../../config/conn.php";
$sql1 = "SELECT * FROM category";
$result1 = mysqli_query($conn, $sql1);
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $image = $_FILES['image']['name'];
  $temp_location = $_FILES['image']['tmp_name'];
  $upload_location = "../../img/";
  $category_name = $_POST['category_name'];
  $sql = "INSERT INTO product (name, description, price, stock, image, category_name) VALUES ('$name','$description','$price','$stock','$image','$category_name')";

  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo "Error!: {$conn->$error}";
  } else {
    echo "product added successfully!";
    move_uploaded_file(
      $temp_location,
      $upload_location . $image
    );
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  </style>
</head>

<body>
  <div>
    <ul>
      <li><a href="dashboard.php">Back</a></li>
    </ul>
  </div>
  <div>
    <div class="form">
      <form action="add-product.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Enter product name" required>
        <textarea name="description" placeholder="Enter product description"></textarea>
        <input type="number" name="price" placeholder="Enter price" required>
        <input type="number" name="stock" placeholder="Enter stock" required>
        <h2>Upload image Here</h2>
        <input type="file" name="image">

        <select name="category_name">
          <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
          <?php
          }
          ?>
        </select>
        <input type="submit" name="submit" value="add product">
      </form>
    </div>
  </div>
</body>

</html>