<?php
      include ('../login/config.php');
      include ('../home/head.php');
      include('../home/header.php');

      $n = $_SESSION['user_name'];
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
    height: 94%;
  }
  
  /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
  @media screen and (max-height: 450px) {
    .sidebar {padding-top: 15px;}
    .sidebar a {font-size: 18px;}
  }

  .col-sm-6 .card p
  {
    color: white;
  }

    </style>
</head>
<body style="background-color: #4500AD important!;">
<div id="mySidebar" class="sidebar">
  <h3 class="heading-6" style="text-align: left;">AMT</h3>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

</div>


<div id="main" style="background-color: #4500AD;">
  <!-- <button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button> -->
  <button type="button" onclick="openNav()" id="lavdi" class="btn btn-outline-dark">&#9776;</button><br><br>

<!-- cards -->
<?php
  $fetch = "SELECT * FROM strategies where privacy='1'";

  $strategies = $conn->query($fetch);
?>
  
    <div id="app" style="margin-top: -3.4%; margin-left: 6rem; width: 95%; overflow-y:auto;">
    <div style="text-align: center; background-color: white; height: 5%;"><h2>MARKETS</h2></div>
  <div class="app-container">
  
  <?php
    if($strategies->num_rows > 0) {
      while($row = $strategies->fetch_assoc())
      {
  ?>
    <div class="item" style="margin-top: 0rem;">
      <div class="close">
        ×
      </div>
      
      <div class="item-title">
        <h4>Strategy ID: <?php echo $row['id']?></h4>
        <h3> <?php echo $row['name'] ?></h3>
        <h4> Author ID: <?php echo $row['uid']?></h4>
      </div>
      <div class="item-image">
        <!-- <img src="https://picsum.photos/200"> -->
        <div class="card text-white bg-dark mb-3">
          <div class="card-title"><h3><b>Description:</b></h3></div>
          <div class="card-body">
          <p><?php echo $row['descr']; ?></p>
          </div>
        </div>
      </div>
      <div class="item-active">
      <div class="item-content">
        <div class="row">
  <div class="col-sm-6">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5 class="card-title">Total Funds Required</h5>
        <p class="card-text"><?php echo $row['capital'] + $row['fees']/100.0*$row['capital']; ?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5 class="card-title">Fees Charged</h5>
        <p class="card-text"><?php echo $row['fees']; ?>% - <?php echo $row['capital']*$row['fees']/100.0 ?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5 class="card-title">Estimated Loss</h5>
        <p class="card-text"><?php echo $row['risk']/100.0*$row['capital']; ?> (<?php echo $row['risk'] ?>%) </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
</div>
      </div>
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