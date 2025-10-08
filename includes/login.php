<?php
session_start();

require '../config/conn.php';

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
  header('Location: ../index.php');
  exit;
}

if (isset($_POST['login'])) {
  // ambil data dari form
  $email = $_POST['email'];
  $password = $_POST['password'];

  // cari email di database
  $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

  // cek apakah email ditemukan
  if (mysqli_num_rows($result) == 1) {
    // ambil data user
    $row = mysqli_fetch_assoc($result);

    var_dump($row['password']);
    // cek apakah password cocok
    if (password_verify($password, $row['password'])) {
      // set session login
      $_SESSION['id'] = $row['id'];
      $_SESSION['login'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $row['name'];
      $_SESSION['role'] = $row['role'];

      // login berhasil, lempar ke halaman utama
      header("Location: ../index.php");
      exit;
    }
  }

  // kalau login gagal, munculkan error
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<?php
if (isset($error)) : ?>
  <div>
    Username atau password salah!
  </div>
<?php
endif;
?>

<body>
  <div class="login">
    <form action="" method="post">
      <input type="email" name="email" placeholder="Enter you email here" required>
      <input type="password" name="password" placeholder="Enter you password here" required>
      <button type="submit" name="login">Sign In</button>
      <p>Don't have an account? <a href="register.php">Sign Up</a></p>
    </form>
  </div>
</body>

</html>