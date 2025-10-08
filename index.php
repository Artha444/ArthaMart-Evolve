<?php
session_start();
include "config/conn.php";

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

// Ambil data keranjang user jika login
$cart_items = [];
$cart_count = 0;

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
  $user_id = $_SESSION['name'];
  $cart_query = "SELECT c.*, p.name, p.image, p.price FROM cart c JOIN product p ON c.product_id = p.id WHERE c.user_id = '$user_id'";
  $cart_result = mysqli_query($conn, $cart_query);
  while ($row = mysqli_fetch_assoc($cart_result)) {
    $cart_items[] = $row;
  }
  $cart_count = count($cart_items);
}


$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>K-MART | Luxury Ecommerce</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="cart.css">
</head>

<body>

  <header class="main-header">
    <div class="logo">K MART</div>
    <nav>
      <a href="#">Home</a>
      <a href="#">Category</a>
      <a href="#">Jual</a>
      <a href="#">About Us</a>
    </nav>
    <div class="header-icons">
      <a href="#"><i class="fas fa-search"></i></a>

      <!-- Cart -->
      <div class="cart-dropdown-wrapper">
        <a href="#">
          <i class="fas fa-shopping-cart"></i>
          <?php if ($cart_count > 0): ?>
            <span class="cart-count"><?php echo $cart_count; ?></span>
          <?php endif; ?>
        </a>

        <div class="cart-dropdown-menu">
          <?php if ($cart_count === 0): ?>
            <p class="empty-cart">Keranjang masih kosong.</p>
          <?php else: ?>
            <ul class="cart-items">
              <?php foreach ($cart_items as $item): ?>
                <li class="cart-item">
                  <img src="img/<?php echo $item['image']; ?>" alt="" class="cart-item-image">
                  <div class="cart-item-details">
                    <p class="cart-item-name"><?php echo htmlspecialchars($item['name']); ?></p>
                    <div class="cart-item-controls">
                      <form action="includes/update_cart.php" method="post" class="update-form">
                        <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                        <button class="qty-btn minus" type="submit" name="action" value="minus">−</button>
                        <span class="qty"><?php echo $item['quantity']; ?></span>
                        <button class="qty-btn plus" type="submit" name="action" value="plus">+</button>
                      </form>
                    </div>

                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
            <div class="cart-actions"><br>
              <a href="includes/cart.php" class="btn-view-cart">Lihat Keranjang</a>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <!-- End Cart -->
       

      <div class="account-dropdown-wrapper">
        <a href="#" class="account-icon"><i class="fas fa-user"></i></a>

        <div class="account-dropdown-menu">
          <div class="user-info-header">
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
              <p>Halo, <?php echo htmlspecialchars($_SESSION['name']); ?></p>
          </div>

          <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="includes/admin/dashboard.php">Dashboard</a>
            <a href=""><i class="fas fa-user-circle"></i> Profil Saya</a>
            <a href=""><i class="fas fa-box"></i> Pesanan</a>
            <a href=""><i class="fas fa-cog"></i> Pengaturan</a>
            <hr>

          <?php else: ?>
            <a href=""><i class="fas fa-user-circle"></i> Profil Saya</a>
            <a href=""><i class="fas fa-box"></i> Pesanan Saya</a>
            <a href=""><i class="fas fa-cog"></i> Pengaturan</a>
            <hr>
          <?php endif; ?>

          <a href="includes/logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Logout</a>

        <?php else: ?>
          <a href="includes/login.php" class="login-link"><i class="fas fa-sign-in-alt"></i> Login</a>
          <a href="includes/register.php" class="register-link"><i class="fas fa-user-plus"></i> Daftar</a>

        <?php endif; ?>
        </div>

      </div>
  </header>

  <section class="cta-banner-section">
    <div class="cta-container">
      <div class="cta-content">
        <p class="cta-subhead">Organik & Premium</p>
        <h2 class="cta-title">Mobil Mewah 100% Original</h2>
        <p class="cta-tagline">Temukan koleksi mobil yang terjamin kualitas dan keasliannya.</p>
        <a href="#" class="btn-shop-now">Lihat Semua Koleksi</a>
      </div>
    </div>
  </section>
  </section>

  <section class="product-section">
    <h2 class="section-title">Our Product</h2>
    <div class="product-grid">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="product-card ogani-style">
          <div class="product-image-container">
            <img src="img/<?php echo $row['image']; ?>" alt="images">

            <ul class="product-icon-actions">
              <li><a href="#"><i class="fas fa-heart"></i></a></li>
              <li><a href="#"><i class="fas fa-retweet"></i></a></li>
              <form action="includes/add_to_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="submit" style="border:none; background:none;">
                  <li><a><i class="fas fa-shopping-cart"></i></a></li>
                </button>
              </form>
            </ul>

            <div class="product-tag">-50%</div>
          </div>

          <div class="card-content">
            <p class="product-category"><?php echo $row['category_name'] ?></p>
            <h5 class="product-name"><?php echo $row['name'] ?></h5>
            <div class="product-price-rating">
              <span class="product-price-new"><?php echo number_format($row['price'], 0, ',', '.') ?></span>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </section>

  <footer class="main-footer">
    <div class="footer-container">
      <div class="footer-contact">
        <h3>Contact Us</h3>
        <p><i class="fas fa-map-marker-alt"></i>Indonesia, Jawa Barat, Kota Cianjur</p>
        <p><i class="fas fa-envelope"></i>artha@gmail.com</p>
        <p><i class="fas fa-phone-alt"></i> +62 852 9530 4912</p>
      </div>

      <div class="footer-form">
        <h3>Send Message</h3>
        <form>
          <input type="text" placeholder="Name">
          <input type="email" placeholder="Email">
          <textarea placeholder="Enter your message..."></textarea>
          <button type="submit" class="btn-submit">Send</button>
        </form>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; 2025 K Mart. All Rights Reserved.</p>
    </div>
  </footer>

</body>

</html>