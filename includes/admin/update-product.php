<?php
session_start();
include "../../config/conn.php";
$sql1 = "SELECT * FROM category";
$result1 = mysqli_query($conn, $sql1);

if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $sql2 = "SELECT * FROM product WHERE id='$product_id'";
  $result2 = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_assoc($result2);
}
if (isset($_POST['submit'])) {
  $product_id = $_GET['product_id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $sql3 = "UPDATE product SET name='$name',description='$description',price='$price',stock='$stock' WHERE id='$product_id'";
  $result3 = mysqli_query($conn, $sql3);
  if ($result3) {
    header("Location: display-product.php");
  } else {
    echo "Error: ($conn->$error)";
  }

  $image = $_FILES['image']['name'];
  if ($image) {
    $temp_location = $_FILES['image']['tmp_name'];
    $upload_location = "../../img/";
    $sql4 = "UPDATE product SET name='$name',description='$description',price='$price',stock='$stock',image='$image' WHERE id='$product_id'";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4) {
      move_uploaded_file($temp_location, $upload_location.$image);
      header("Location: display-product.php");
    } else {
      echo "Error: ($conn->$error)";
    }
  }

  $category_name = $_POST['category_name'];
  if ($category_name) {
    $sql5 = "UPDATE product SET name='$name',description='$description',price='$price',stock='$stock',category_name='$category_name' WHERE id='$product_id'";
    $result5 = mysqli_query($conn, $sql5);
    if ($result5) {
      header("Location: display-product.php");
    } else {
      echo "Error: ($conn->$error)";
    }
  }

  if (!$result) {
    echo "Error!: {$conn->$error}";
  } else {
    echo "product update successfully!";
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
</head>

<body>
  <div>
    <ul>
      <li><a href="dashboard.php">Back</a></li>
    </ul>
  </div>
  <div>
    <form action="update-product.php?product_id=<?php echo $product_id; ?>" method="post" enctype="multipart/form-data">
      <input type="text" name="name" value="<?php echo $row['name'] ?>">
      <textarea name="description"><?php echo $row['description'] ?></textarea>
      <input type="number" name="price" value="<?php echo $row['price'] ?>">
      <input type="number" name="stock" value="<?php echo $row['stock'] ?>">
      <img src="../../img/<?php echo $row['image'] ?>">
      <input type="file" name="image">
      <h1>Category Name Is: <?php echo $row['category_name'] ?></h1>
      <select name="category_name">
        <?php
        while ($row = mysqli_fetch_assoc($result1)) {
        ?>
          <option value="<?php echo $row['name'] ?>">
            <?php echo $row['name'] ?>
          </option>
        <?php } ?>
      </select>

      <input type="submit" name="submit" value="update product">
    </form>
  </div>
</body>

</html>