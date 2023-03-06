<?php
      include ('../login/config.php');
      include ('../home/head.php');
      include('../home/header.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <script src="main.js"></script>
     

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="market.css">
    <script src="market.js"></script>
    <style>

      .sidebar {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1; /* Stay on top */
    top: 0;
    left: 0;
    background-color: #111; /* Black*/
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
  }
  
  /* The sidebar links */
  .sidebar a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  
  /* When you mouse over the navigation links, change their color */
  .sidebar a:hover {
    color: #f1f1f1;
  }




 /* The sidebar label Capital */
 .sidebar label {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  
  /* When you mouse over the navigation links, change their color capital */
  .sidebar label:hover {
    color: #f1f1f1;
  }


  /* The sidebar H3  */
 .sidebar h3 {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }

  .item.active {
  overflow: scroll;
  z-index: 1;
  width: 100%;
  height: 110%;
  transition: top .225s, width .3s, height .3s;
}
  
  /* Position and style the close button (top right corner) */
  .sidebar .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }
  
  /* The button used to open the sidebar */
  .openbtn {
    font-size: 20px;
    cursor: pointer;
    background-color: #111;
    color: white;
    padding: 10px 15px;
    border: none;
  }
  
  .openbtn:hover {
    background-color: #444;
  }
  
  /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
  #main {
    transition: margin-left .5s; /* If you want a transition effect */
    padding: 20px;
  }
  
  /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
  @media screen and (max-height: 450px) {
    .sidebar {padding-top: 15px;}
    .sidebar a {font-size: 18px;}
  }


    </style>
</head>
<body style="background-color: white;">
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


<div id="main" style="background-color: white;">
  <!-- <button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button> -->
  <button type="button" onclick="openNav()" id="lavdi" class="btn btn-outline-dark">&#9776;</button><br><br>

<!-- cards -->
<?php
  $fetch = "SELECT * FROM strategies where privacy='1'";

  $strategies = $conn->query($fetch);
?>

<div class="col-md-11" style="height: 83vh; margin-top: -5rem; margin-left: 5rem;">
  
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
        <h4>Strategy ID: <?php echo $row['id']?></h4>
        <h3> <?php echo $row['name'] ?></h3>
      </div>
      <div class="item-image">
        <img src="https://imgur.com/gwi3Vcj.jpg">
      </div>
      <div class="item-content">
        <p><strong><?php echo $row['uid']."'s strategy." ?></strong></p>
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








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>  
  <h2>Collapsed Sidebar</h2>
  <p>Click on the hamburger menu/bar icon to open the sidebar, and push this content to the right.</p>
</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> -->