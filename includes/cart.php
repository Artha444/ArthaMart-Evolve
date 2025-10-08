<?php
session_start();
include "../config/conn.php";

// Cek apakah user sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
  echo "<script>alert('Silakan login terlebih dahulu.'); window.location.href='../includes/login.php';</script>";
  exit;
}
$user_id = $_SESSION['name']; // sekarang aman

$result = mysqli_query($conn, "SELECT cart.*, product.name, product.price, product.image FROM cart JOIN product ON cart.product_id = product.id WHERE cart.user_id = '$user_id'");
?>

<h2>Keranjang Belanja</h2>
<table border="1">
  <tr>
    <th>Gambar</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Total</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><img src="../img/<?php echo $row['image']; ?>" width="70"></td>
      <td><?php echo $row['name']; ?></td>
      <td>Rp <?php echo number_format($row['price'], 0, ',', '.'); ?></td>
      <td>
        <form method="post" action="update_cart.php" class="update-form">
          <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
          <button type="submit" name="action" value="minus">−</button>
          <span class="qty"><?php echo $row['quantity']; ?></span>
          <button type="submit" name="action" value="plus">+</button>
        </form>
      </td>
      <td>Rp <?php echo number_format($row['price'] * $row['quantity'], 0, ',', '.'); ?></td>
    </tr>
  <?php } ?>
</table>