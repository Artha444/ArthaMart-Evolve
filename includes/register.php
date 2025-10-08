<?php
include "../config/conn.php";
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['user_role'];

  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO user (id,name,email,password,role) VALUES (?,?,?,?,?) ";
  
  $stmt = mysqli_prepare($conn,$sql);

  mysqli_stmt_bind_param($stmt, "sssss", $id, $name, $email, $password_hash, $role);
  $result = mysqli_stmt_execute($stmt);

  if (!$result) {
    echo "Error!: " . mysqli_stmt_error($stmt);
  } else {
    echo "<div>Register berhasil!</div>";
  }
mysqli_stmt_close($stmt); 
}

$query = mysqli_query($conn, "SELECT max(id) as kodeTerbesar FROM user");
$data = mysqli_fetch_array($query);
$kodeuser = $data['kodeTerbesar'];
$urutan = (int) substr($kodeuser, 3, 2);
$urutan++;
$huruf = 'usr';
$kodeuser = $huruf . sprintf("%02s", $urutan);
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
        <input type="hidden" name="id" id="id" value="<?= $kodeuser ?>">
        <input type="text" name="name" placeholder="Enter name" required>
        <input type="email" name="email" placeholder="Enter email" required>
        <select name="user_role">
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
        <input type="password" name="password" placeholder="Enter password" required>
        <button type="submit" name="submit">Create Account</button>
        <p>Already have an account? <a href="login.php">Sign In</a></p>
      </form>
    </div>
  </div>
</body>

</html>