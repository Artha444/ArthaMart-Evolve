<?php
include "../config/conn.php";
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = "user";

  $sql = "INSERT INTO user (name,email,password) VALUES ('$name','$email','$password') ";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo "Error!: {$conn->$error}";
  } else {
    echo "<div>Register berhasil!</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>

<body>
  <div class="register">
    <a href="../index.php">Shop</a>
    <div>
      <form action="" method="post">
        <input type="text" name="name" placeholder="Enter name" required>
        <input type="email" name="email" placeholder="Enter email" required>
        <input type="password" name="password" placeholder="Enter password" required>
        <input type="submit" name="submit">
        <p>Go for login <a href="login.php">Login</a></p>
      </form>
    </div>
  </div>
</body>

</html>