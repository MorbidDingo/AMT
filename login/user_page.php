<?php
@include 'config.php';

session_start();

if(!isset( $_SESSION['user_name']) && ($_SESSION['user_id'])){
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user page</title>

  <!-- link to the css file -->
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container">
    <div class="content">
      <h3>hi,<span><?php echo  $_SESSION['user_name'] ?></span></h3>
      <h1>Welcome<span><?php echo  $_SESSION['id'] ?></span><h1>
        <p>this is an user page</p>
        <a  href ="login_form.php" class="btn">login</a>
        <a  href ="register_form.php" class="btn">register</a>
        <a  href ="logout.php" class="btn">logout</a>
  </div>
</body>
</html>