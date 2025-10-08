<?php
session_start();
include "../config/conn.php";

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo json_encode(["success" => false, "message" => "Silakan login terlebih dahulu."]);
    exit;
}

$user_id = $_SESSION['name'];
$product_id = $_POST['product_id'];
$action = $_POST['action']; // plus / minus

// Ambil data keranjang
$query = "SELECT quantity FROM cart WHERE user_id='$user_id' AND product_id='$product_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $quantity = $row['quantity'];
    if ($action === "plus") {
        $quantity++;
    } elseif ($action === "minus" && $quantity > 1) {
        $quantity--;
    }

    mysqli_query($conn, "UPDATE cart SET quantity='$quantity' WHERE user_id='$user_id' AND product_id='$product_id'");
}

echo json_encode(["success" => true, "new_quantity" => $quantity]);
?>
