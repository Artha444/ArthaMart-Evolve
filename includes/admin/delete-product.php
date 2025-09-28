<?php
session_start();
include "../../config/conn.php";
if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $sql = "DELETE FROM product WHERE id= '$product_id'";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo "Error: {$conn->$error}";
  } else {
    echo "Deleted successfully <a href='display-product.php'>Go back</a>";
  }
}
