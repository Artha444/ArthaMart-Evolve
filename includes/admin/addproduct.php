<?php
session_start();
include "../../config/conn.php";
if(isset($_SESSION['user_id'])){
  if($_SESSION['user_role'] == 'admin'){
    $sql1 = "SELECT * FROM category";
    $result1 = mysqli_query($conn,$sql1);
    if(isset($_POST['submit'])){
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
      if(!$result){
        echo "Error!: {$conn->$error}";
      }
      else {
        echo "product added successfully!";
        move_uploaded_file($temp_location,
        $upload_location.$image);
      }
    }
  } else {
    echo "go for user dashoard";
  }
} else{
  header("Location: ../../index.php");
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
      <li><a href="addproduct.php">Add Product</a></li>
      <li><a href="">View Order</a></li>
      <li><a href="../../index.php">Home</a></li>
    </ul>
  </div>
  <div>
   <div class="form">
    <form action="addproduct.php" method="post" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="Enter product name" required>
      <textarea name="description" placeholder="Enter product description"></textarea>
      <input type="number" name="price" placeholder="Enter price" required>
      <input type="number" name="stock" placeholder="Enter stock" required>
      <h2>Upload image Here</h2>
      <input type="file" name="image" placeholder="Enter image">
      <?php while($row = mysqli_fetch_assoc($result1)) { ?>
      <select name="category_id">
        <option value="<?php echo $row['name'] ?>"><?php echo $row['id'] ?></option>
      </select>
      <select name="category_name">
        <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
      </select>
      <?php
      }
      ?>
      <input type="submit" name="submit" value="add product">
    </form>
   </div>
  </div>
</body>
</html> 