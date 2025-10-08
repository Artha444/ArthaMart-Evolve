<?php
session_start();
include 'config/conn.php';
if (isset($_SESSION['login'])) {
  if (isset($_GET['user_id'], $_GET['product_id'], $_GET['product_price'])) {
    $user_id = $_GET['user_id'];
    $product_id = $_GET['product_id'];
    $total_amount = $_GET['product_price'];
    $sql = "INSERT INTO orders (user_id,product_id,total_amount) VALUES ('$user_id','$product_id','$total_amount')";
    $result = mysqli_query($conn, $sql);
    if(!$result){
      echo "Error: {$conn->$error}";
    }
    else {
      $order_id = mysqli_insert_id($conn);
      $payment_method = "cashon";
      $sql_payment = "INSERT INTO payment (order_id,user_id,payment_method) VALUES ('','$order_id','$payment_method')";
      $result_payment = mysqli_query($conn,$sql_payment);
      if(!$result_payment){
        echo "Error : {$conn->$error}";
      }
      echo "Order added successfully! <a href='index.php'>Buy More</a>";
    }
  }
} 
else {
  header("Location: index.php");
}
