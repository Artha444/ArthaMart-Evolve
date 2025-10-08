<?php
session_start();
include "../../config/conn.php";

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // 1. AMBIL NAMA FILE FOTO DULU
    $sql_select = "SELECT image FROM product WHERE id = '$product_id'";
    $result_select = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result_select);
    
    // Periksa apakah data ditemukan
    if ($row) {
        $image_name = $row['image'];
        // Tentukan path lengkap ke file
        $file_path = "../../img/" . $image_name; 

        // 2. HAPUS FILE FISIK DARI SERVER
        // Pastikan file ada dan bukan direktori sebelum menghapus
        if (file_exists($file_path) && !is_dir($file_path)) {
            // Fungsi unlink() digunakan untuk menghapus file
            unlink($file_path); 
        }
        
        // 3. HAPUS DATA DARI DATABASE
        $sql_delete = "DELETE FROM product WHERE id = '$product_id'";
        $result_delete = mysqli_query($conn, $sql_delete);
        
        if (!$result_delete) {
            // Jika gagal hapus database
            echo "Error saat menghapus data: {$conn->error}";
        } else {
            // Jika berhasil, redirect
            header("Location: display-product.php");
            exit(); // Penting untuk menghentikan eksekusi script setelah header()
        }
    } else {
        echo "Error: Produk dengan ID {$product_id} tidak ditemukan.";
    }
}
?>