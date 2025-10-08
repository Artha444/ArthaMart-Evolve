<?php
session_start();
include "../config/conn.php";

// Pastikan user sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo "<script>alert('Silakan login terlebih dahulu untuk menambahkan ke keranjang.'); window.location.href='../includes/login.php';</script>";
    exit;
}

$user_id = $_SESSION['name']; // pastikan ada id user di session
$product_id = $_POST['product_id'];

// Cek apakah produk sudah ada di keranjang
$check = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'");
if (mysqli_num_rows($check) > 0) {
    // Jika sudah ada, tambahkan quantity
    mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE user_id = '$user_id' AND product_id = '$product_id'");
} else {
    // Jika belum ada, tambahkan produk baru ke keranjang
    mysqli_query($conn, "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', 1)");
}

// Redirect kembali ke halaman utama
echo "<script>alert('Produk berhasil ditambahkan ke keranjang!'); window.location.href='../index.php';</script>";
