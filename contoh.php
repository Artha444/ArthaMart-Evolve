<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Shop</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/dropdown.css">
</head>
<body>
  <header class="navbar">
    <div class="container">
      <div class="logo">KMART</div>
      <nav class="nav-links">
        <ul>
          <li><a href="#">HOME</a></li>
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#">PRODUCTS</a></li>
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
          <hr>
          <p>
          <?php echo htmlspecialchars($_SESSION['role']); ?><br>
          <?php echo htmlspecialchars($_SESSION['email']); ?>
          </p>
            </div>
            <hr>
            <?php if ($_SESSION['role'] === 'admin'): ?>
              <a href="includes/admin/dashboard.php">Dashboard</a>
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
    </div>
  </header>

  <div class="hero-section">
    <div class="background-overlay" id="scrollOverlay"></div>
    <div class="hero-content">
      <p class="tagline-small">SELL / BUY</p>
      <h1>MAKE THINGS HAPPEN</h1>
      <a href="#main" class="btn-learn-more">BUY NOW</a>
    </div>
  </div>

  <div class="fixed-icons">
    <a href="#" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
  </div>

  <div class="scroll-indicator">
    <span></span>
  </div>

  <div class="main" id="main">
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#"><i class="fas fa-shopping-cart"></i> Add to cart</a>
    </div>
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#"><i class="fas fa-shopping-cart"></i> Add to cart</a>
    </div>
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#"><i class="fas fa-shopping-cart"></i> Add to cart</a>
    </div>
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#"><i class="fas fa-shopping-cart"></i> Add to cart</a>
    </div>
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#"><i class="fas fa-shopping-cart"></i> Add to cart</a>
    </div>
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#"><i class="fas fa-shopping-cart"></i> Add to cart</a>
    </div>
  </div>
  <div id="about">
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla voluptatibus tenetur debitis sunt autem officia modi, enim numquam? Ullam nisi accusamus alias quasi, veritatis assumenda fugiat, velit magni pariatur laudantium itaque aperiam eaque consectetur blanditiis nesciunt impedit quisquam ratione veniam doloribus voluptate dolorem dolore nulla porro. Dignissimos nesciunt, cupiditate tempora doloremque sequi veniam id in libero labore odit incidunt numquam unde reprehenderit, minima est excepturi tempore, eveniet dolore quasi perspiciatis voluptates ex eos. Sint reprehenderit provident sapiente. Blanditiis at, magnam dolores ducimus delectus consequatur illo commodi voluptatibus fugit, molestiae architecto ipsam ipsa doloremque. Iusto doloremque, quidem voluptas harum quas pariatur numquam molestiae suscipit magni, rerum libero, veniam reprehenderit exercitationem magnam esse aut quia animi odit ut alias. Hic sapiente corporis culpa eum nam dolorem expedita architecto autem vero voluptatum, distinctio animi, quo tempora a labore corrupti aliquam aspernatur. Architecto, pariatur nisi ducimus voluptatem commodi repellat voluptas, eius expedita nobis quas aliquam, hic nulla voluptatibus. Sapiente explicabo libero fuga quaerat nostrum, iusto iste numquam ab dignissimos quo aliquam nesciunt possimus ex unde blanditiis tenetur voluptatibus. Consequuntur dignissimos deserunt laboriosam id blanditiis esse quisquam totam, cum, tempora est corrupti rem! Totam voluptatibus quibusdam amet exercitationem quam. Velit itaque vero consequuntur, praesentium, facilis asperiores eius ut atque impedit maiores tempora earum ab explicabo eaque aliquid repellat necessitatibus harum sequi. Deleniti nulla pariatur nostrum. Laboriosam distinctio minima animi illo dolores inventore nobis cumque atque reiciendis facere sunt, quae excepturi voluptates, tempora rem mollitia? Quae architecto recusandae aspernatur pariatur praesentium quasi ab maxime? Atque incidunt sunt nam quis, pariatur eaque enim laudantium, natus, ipsa ex sint. Sit illum nisi laboriosam nobis fugit hic laborum, perspiciatis architecto, possimus deleniti pariatur corrupti id ducimus ullam recusandae modi optio esse eaque dignissimos mollitia incidunt officiis facere. Sed ratione ex aperiam esse praesentium fugiat voluptate beatae rerum repellat? Aliquam maxime amet, dolor pariatur quia odit, sint ut consequuntur accusamus porro repudiandae. Doloremque vitae est sit quasi consequatur libero voluptates dolorum sequi rem. Qui, delectus perferendis? Vel, quaerat aperiam, exercitationem accusamus asperiores quam ex obcaecati ipsa cupiditate aut repellendus, iure quisquam similique illo ratione tenetur eum. Laudantium minus sint mollitia temporibus, iure, voluptas alias voluptates cumque provident itaque a repellendus ullam, velit vitae fuga! Quia pariatur odit exercitationem magnam repudiandae consectetur dignissimos aliquid soluta assumenda deleniti unde omnis dolorum ipsum, accusantium veritatis temporibus at quo a. Voluptatum commodi aut maiores quo velit ad cumque, voluptas nisi vero perferendis sapiente ipsa dignissimos consequatur corrupti eius consectetur, obcaecati ex eligendi enim, sit et distinctio tempore? Fuga sint vero amet, nihil aut eaque illum! Aspernatur, atque accusantium pariatur voluptate harum accusamus cupiditate dolore amet rerum nobis quam facere autem hic assumenda eligendi, ut porro asperiores tempora aliquam expedita error at. Blanditiis tempora ut consequatur ab delectus laborum quaerat sapiente dignissimos sit! Dignissimos, totam veritatis nemo distinctio pariatur at iste et sequi quia quasi praesentium tenetur magni culpa, sint explicabo nesciunt saepe nisi. Amet ea omnis odit quasi deleniti, veritatis incidunt quas iusto possimus quae ratione eligendi aliquam nobis? Ipsum perspiciatis itaque provident totam rem sequi omnis debitis molestias porro quasi quia, ullam blanditiis officia earum! Soluta repellat praesentium ducimus? Ducimus?</p>
  </div>
  <footer class="footer">
    <p>Copyright 2025 KMART.com | operated by Divilab LLC Privacy Policy | Site Terms & Disclosures.Hosted by Artha</p>
  </footer>
  <script src="scripts/script.js"></script>
</body>

</html>