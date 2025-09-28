<?php
if (isset($_POST['submit-category'])) {
  $category = $_POST['category'];
  $sql = "INSERT INTO category (name) VALUES ('$category')";

  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo "Error!: {$conn->$error}";
  } else {
    echo "category added successfully!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div>
    <ul>
      <li><a href="dashboard.php">Back</a></li>
    </ul>
  </div>
  <form action="" method="post">
    <input type="text" name="category">
    <input type="submit" name="submit-category">
    <select name="category_name">
      <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
      <?php
      }
      ?>
    </select>
  </form>
</body>

</html>