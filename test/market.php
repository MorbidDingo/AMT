
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
    <link rel="stylesheet" href="market.css">
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="market.js"></script>
    <script src="sidebar.js"></script>
    <?php
      include ('../login/config.php');
      include ('../home/head.php');
    ?>
</head>
<body>

<?php
  include('../home/header.php');

  $fetch = "SELECT * FROM strategies where privacy='0'";

  $strategies = $conn->query($fetch);
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1" style="height: 93.1vh;">
        <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#">About</a>
      <a href="#">Services</a>
      <a href="#">Clients</a>
      <a href="#">Contact</a>
          <h3>Fees</h3>
          <input type="checkbox" value="Capital" class="chechbox">
          <label for="intraday">Capital</label>
    </div>
    <div id="main">
      <!-- <button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button> -->
      <button type="button" onclick="openNav()" class="btn btn-outline-dark">&#9776;</button><br><br>
          
    </div>
    </div>
    <div class="col-md-12" style="height: 90.1vh">
  
    <div id="app">
  <div class="app-container">
  
  <?php
    if($strategies->num_rows > 0) {
      while($row = $strategies->fetch_assoc())
      {
  ?>
    <div class="item">
      <div class="close">
        ×
      </div>
      
      <div class="item-title">
        <h4><?php echo $row['id'] ?></h4>
        <h3><?php echo $row['name'] ?></h3>
      </div>
      <div class="item-image">
        <img src="https://imgur.com/gwi3Vcj.jpg">
      </div>
      <div class="item-content">
        <p><strong><?php echo $row['id']."'s strategy." ?></strong></p>
        <p> <?php echo $row['descr'] ?> </p>
      </div>
    </div>

<?php
}
  }
?>
    </div>
  </div>
</div>

</body>

</html>