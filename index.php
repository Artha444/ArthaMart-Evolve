<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ArthaMart</title>
  <link rel="stylesheet" href="scripts/style.css">
  <style>
    * {
      font-family:monospace;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    .header {
      position: fixed;
      top: 0;
      width: 100%;
      background-color: red;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 30px;
    }

    .header ul li {
      list-style: none;
    }

    .header a {
      text-decoration: none;
      color: white;
    }

    .header li {
      display: inline-block;
      margin-right: 50px;
    }

    .main {
      margin-top: 100px;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 90px;
    }

    .product {
      margin: 10px;
      border: 2px solid;
      text-align: center;
      max-width: 300px;
      padding: 30px;
    }

    .product a {
      display: block;
      text-decoration: none;
      color: white;
      background-color: green;
      padding: 10px;
      width: 100%;
    }

    .product img {
      width: 150px;
    }

    .main div,
    a,
    p {
      margin-bottom: 5px;
    }

    .price {
      opacity: 70%;
      color: green;
    }

    .footer {
      display: flex;
      background-color: gray;
      flex-direction: row;
      width: 100%;
      bottom: 0;
      position: fixed;
      padding: 20px;
      justify-content: center;
    }

    @media(max-width: 400px) {
      .header {
        display: flex;
        flex-direction: column;
      }
    }
  </style>
</head>

<body>
  <header class="header">
    <a href="index.php">Shop</a>
    <a href="index.php"></a>
    <nav>
      <ul>
        <li><a href="contoh.php">Contoh</a></li>
        <li><a href="includes/login.php">Login</a></li>
        <li><a href="includes/logout.php">logout</a></li>
        <li><a href="includes/admin/dashboard.php">Dashboard</a></li>
      </ul>
    </nav>
  </header>
  <main class="main">
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#">Buy Now</a>
    </div>
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#">Buy Now</a>
    </div>
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#">Buy Now</a>
    </div>
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#">Buy Now</a>
    </div>
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#">Buy Now</a>
    </div>
    <div class="product">
      <img src="img/buggati.jpg" alt="">
      <h2>Product Title</h2>
      <p>product desc</p>
      <p>product quantity</p>
      <p class="price">product price</p>
      <a href="#">Buy Now</a>
    </div>
  </main>
  <footer class="footer">
    <p>copyright@: artha</p>
  </footer>
</body>

</html>