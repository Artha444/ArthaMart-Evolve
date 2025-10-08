<?php
session_start();
include "../../config/conn.php";
  $sql = "SELECT * FROM product";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
    echo "Error!: {$conn->$error}";
  } else {
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
  <ul>
  <li><a href="dashboard.php">Back</a></li>
  </ul>
  <table border="1" cellspacing="0">
    <thead>
      <tr>
        <th>Product Tittle</th>
        <th>Product Description</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Category Name</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_assoc($result)){

      ?>
      <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['stock'] ?></td>
        <td><img style="max-width: 150px;" src="../../img/<?php echo $row['image'] ?>" ></td>
        <td><?php echo $row['category_name'] ?></td>
        <td><a class="update" href="update-product.php?product_id=<?php echo $row['id'] ?>">Update</a></td>
        <td><a class="delete" href="delete-product.php?product_id=<?php echo $row['id'] ?>">Delete</a></td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</body>

</html>