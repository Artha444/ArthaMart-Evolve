<?php
session_start();
include "config/conn.php";
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Shop</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="styles/dropdown.css">
  <link rel="stylesheet" href="styles/card.css">
  <link rel="stylesheet" href="styles/1.css">
</head>

<body>
  <header class="navbar">
    <div class="container">
      <div class="logo">KMART</div>
      <nav class="nav-links">
        <ul>
          <li><a href="#">HOME</a></li>
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#product">PRODUCTS</a></li>
          <li><a href="#">CONTACT</a></li>
        </ul>
      </nav>
      <div class="nav-icons">
        <a href="#"><i class="fas fa-search"></i></a>
        <a><i class="fas fa-user" id="userBtn"></i></a>
      </div>

      <!-- Dropdown -->
      <div class="dropdown" id="dropdownMenu">
        <div class="profile">
          <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
            <h3>
              <?php echo htmlspecialchars($_SESSION['name']); ?><br>
            </h3>
            <p>
              <?php echo htmlspecialchars($_SESSION['email']); ?>
              Role: <?php echo htmlspecialchars($_SESSION['role']); ?><br>
            </p>
            <hr>
        </div>
        <?php if ($_SESSION['role'] === 'admin'): ?>
          <a href="includes/admin/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
          <a href=""><i class="fas fa-pencil-alt"></i> Customize Profile</a>
          <a href=""><i class="fas fa-cog"></i> Settings & Privacy</a>
          <a href=""><i class="fas fa-question-circle"></i> Help & Support</a>
        <?php endif; ?>
        <a href="includes/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <div class="profile">
        <?php else: ?>
          <h3>Guest</h3>
          <p>You don't have account</p>
        </div>
        <hr>
        <a href="includes/login.php">Login</a>
      <?php endif; ?>
      </div>
      <!-- End Dropdown -->
    </div>
  </header>

  <div class="hero-section">
    <div class="background-overlay" id="scrollOverlay"></div>
    <div class="hero-content">
      <p class="tagline-small">Sell / Buy</p>
      <h1>MAKE THINGS HAPPEN</h1>
      <a href="#main" class="btn-learn-more">Buy Now</a>
    </div>
  </div>

  <div class="scroll-indicator">
    <span></span>
  </div>

  <div class="tittle">
    <h1>Product</h1>
  </div>
  <div class="gallery" id="product">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="content">
        <img src="img/<?php echo $row['image']; ?>" alt="images">
        <h3><?php echo $row['name'] ?></h3>
        <p><?php echo $row['description'] ?></p>
        <div class="price">
          <h1 id="price">$<?php echo number_format($row['price'], 0, ',', '.') ?></h1>
          <h5 id="stock">Stock: <?php echo $row['stock'] ?></h5>
        </div>
        <?php if (isset($_SESSION['login'])) { ?>
          <a class="buy" href="order.php?user_id=<?php echo $_SESSION['login']; ?>&product_id=<?php echo $row['id']; ?>&product_price=<?php echo $row['price']; ?>"><i class="fas fa-shopping-cart"></i>Buy Now</a>
        <?php } ?>
      </div>
    <?php } ?>
  </div>

  <div class="tittle">
  <h1>About Us</h1>
        </div>
  <section id="about" class="about-us-section">
    <div class="about-container">

      <div class="about-image-side">
        <img src="img/Lamborghini-Urus.webp" alt="Gambar Tim Kami" class="about-image">
      </div>

      <div class="about-text-side">
        <span class="sub-heading">Get to Know Us Better</span>
        <h2>Your Global Marketplace for Buying and Selling</h2>

        <p>Welcome to KMART, where connection meets commerce. We are a dynamic e-commerce platform dedicated to bridging the gap between sellers and buyers worldwide, creating a versatile and trusted online marketplace. Our foundation is built on the belief that everyone should have access to a global audience to sell their unique products, and, conversely, to a diverse array of goods from around the world.
          <br><br>
          At KMART, we facilitate seamless transactions, offering a secure, intuitive, and feature-rich environment. Whether you are an entrepreneur looking to scale your business, a craftsman seeking a wider reach, or a customer searching for the perfect item, we are your comprehensive solution for engaging in digital trade.
        </p>

        <div class="mission-vision">
          <div class="box-mv">
            <h3>Our Mission 🚀</h3>
            <p>To be the world's most trusted and inclusive e-commerce platform, empowering individuals and businesses globally to connect, transact, and thrive in the digital economy.</p>
          </div>
          <div class="box-mv">
            <h3>Our Vision ✨</h3>
            <p>Our mission is driven by three core pillars:
              <br><br>
              1. Empowerment and Opportunity <br>
              To provide sellers, regardless of their size or location, with the essential tools, secure infrastructure, and wide customer base necessary to start, manage, and expand their businesses successfully.
              <br><br>
              2. Trust and Security <br>
              To maintain the highest standards of safety and transparency in every transaction, ensuring a trustworthy experience for both buyers and sellers through robust security protocols and fair dispute resolution processes.
              <br><br>
              3. Excellence in Experience <br>
              To continuously innovate and optimize our platform to deliver a seamless, intuitive, and engaging user experience, making the process of buying and selling online easy, enjoyable, and efficient.
            </p>
          </div>
        </div>
  </section>

  <div class="contact-section">
    <div class="contact-container">
      <div class="contact-info">
        <div>
          <h2>Contact Us</h2>
          <ul class="info">
            <li>
              <span><i class="fas fa-map-marker-alt"></i></span>
              <span>Jawa Barat<br> Kota Cianjur, Rancagoong</span>
            </li>
            <li>
              <span><i class="fas fa-envelope"></i></span>
              <span>artha@gmail.com</span>
            </li>
            <li>
              <span><i class="fas fa-phone-alt"></i></span>
              <span>+62 852 9530 4912</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="contact-form">
        <form action="#">
          <h2>Send Message</h2>
          <div class="inputBox">
            <input type="text" name="name" required="required">
            <span>Name</span>
          </div>
          <div class="inputBox">
            <input type="email" name="email" required="required">
            <span>Email</span>
          </div>
          <div class="inputBox">
            <textarea name="message" required="required"></textarea>
            <span>Enter your message...</span>
          </div>
          <div class="inputBox">
            <input type="submit" value="Send" class="submit-btn">
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer>
    <div class="footer-content">
      <h3>K Mart</h3>
      <p>&copy; 2025 kenMart. All Rights Reserved</p>

      <ul class="socials">
        <li><a href="https://web.facebook.com/artha.keandre.52/"><i class="fab fa-facebook-square"></i></a></li>
        <li><a href="https://www.google.com/?hl=id"><i class="fab fa-google"></i> </a></li>
        <li><a href="https://www.youtube.com/@jstkn_s"><i class="fab fa-youtube"></i> </a></li>
        <li><a href="https://github.com/Artha444"><i class="fab fa-github"></i></a></li>
        <li><a href="https://www.figma.com/files/team/1493862641099328262/user/1493862637163153385?fuid=1493862637163153385"> <i class="fab fa-figma"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>Design By - <a href="#">Ken</a></p>
    </div>
  </footer>
  <script src="scripts/script.js"></script>
</body>

</html>