<?php
include "../config/conn.php";
session_start();
if (isset($_POST['submit'])) {
  $password = $_POST['password'];
  $email = $_POST['email'];

  $sql = "SELECT * FROM user WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['password'] == $password) {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_role'] = $row['role'];
    } else {
      echo "wrong password";
    }
  }
  else{
    echo "You dont have account";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <div class="login">
    <form action="" method="post">
      <input type="email" name="email" placeholder="Enter you email here" required>
      <input type="password" name="password" placeholder="Enter you password here" required>
      <input type="submit" name="submit" value="login">
      <p>Dont Register Yet! <a href="register.php">Sign Up</a></p>
    </form>
  </div>
</body>

</html>