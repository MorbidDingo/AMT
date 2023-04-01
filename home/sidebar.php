<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Side Navbar - Tivotal</title>
    <link rel="stylesheet" href="styles.css" />

    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    
    <style>
      #txtHints
      {
        color: white;background-color: black;border-radius: 10px;border: 1px solid white; overflow-y: auto; margin-left: 0.7vw; margin-top: 0.5vh; min-height: 0vh; max-height: 25vh; padding-left: 20%; cursor: pointer;
      }

      #txtHints:hover
      {
        transform: scale(1.1);
        transition-duration: 200ms;
      }
      #home{
        overflow-y: auto;
        height: 92vh;
      }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  </head>
  <body>
    <section class="sidebar">
      <div class="nav-header">
        <p class="logo">Workspace</p>
        <i class="bx bx-menu btn-menu animate__animated animate__shakeX  animate__delay-5s animate__repeat-2"></i>
      </div>
      <ul class="nav-links" style="margin-top: 3vh;">
        <li>
          <i class="bx bx-search search-btn" style="position: absolute; margin-left: 0.4vw;" id="search-click"></i>
          <input type="text" placeholder="Search for stocks, indices, etc." style="margin-left: 0.5vw;" onkeyup="showHint(this.value)"/>
          <span class="tooltip" style="margin-top: 1vh;">Search</span>
          <div class="hints" id="txtHints">
            <div class="hint" id="txtHint" style="min-height: 0px; max-height: 100%; "></div>
          </div>
        </li>
        <li>
          <a href="#" id="panel">
            <i class='bx bxs-briefcase'></i>
            <span class="title">My Panel</span>
          </a>
          <span class="tooltip">My Panel</span>
        </li>
        <li>
          <a href="#" id="trade">
            <i class='bx bx-candles'></i>
            <span class="title">Trade</span>
          </a>
          <span class="tooltip">Trade</span>
        </li>
        <li>
            <a href="#" id="tech">
              <i class='bx bx-chart'></i>
              <span class="title">Technical</span>
            </a>
            <span class="tooltip">Technical Analysis</span>
        </li>
        <li>
            <span class="tooltip">Analysis</span>
            <a href="#" id="funda">
              <i class='bx bxs-business'></i>
              <span class="title">Fundamental</span>
            </a>
            <span class="tooltip">Fundamental Analysis</span>
        </li>
        <li>
          <a href="#" id ="interact">
            <i class='bx bx-universal-access' ></i>
            <span class="title">Interact</span>
          </a>
          <span class="tooltip">Interact</span>
        </li>
        <li>
          <a href="#" id="Update">
            <i class='bx bxs-user-account'></i>
            <span class="title">Account</span>
          </a>
          <span class="tooltip">Account</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bxs-help-circle' ></i>
            <span class="title">Help</span>
          </a>
          <span class="tooltip">Help</span>
        </li>
      </ul>
      <div class="theme-wrapper">
        <i class="bx bxs-moon theme-icon"></i>
        <p>Dark Theme</p>
        <div class="theme-btn">
          <span class="theme-ball"></span>
        </div>
      </div>
    </section>
    <section class="home" id="home">
      <div class="container-fluid">
        <div class="row  sticky-top" style="overflow-y: auto;">
          <div class="col-12">
            <div class="card text-bg-dark text-center" style="">
              <div class="card-header">
                Publish Your View        
              </div>
              <div class="card-body">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Name of Stock</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="stock" id="stock">
                </div>          <div class="form-floating">
                  <textarea class="form-control" placeholder="Write a view on the stock you entered." id="view" style="height: 100px;" name="view"></textarea>
                  <label for="floatingTextarea"></label>
                </div>          
                <input type="submit" class="btn btn-primary" name="viewsub" id="viewsub" style="margin-top: 2%;" value="Publish" />
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="overflow-y: auto;">
          <div class="col-12" id="Views" style="overflow-y: auto;">
          <div class="card text-bg-dark" style="overflow-y: auto; margin-top: 0.5%;">
  <h2 class="card-header">Views</h2>
            <?php
            $select = "SELECT * FROM views";
$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    ?>
  <div class="card-body">
    <div class="row">
    <div class="col-md-4" style="border-right: 1px solid white;">
        <div class="card-header">User ID: <?php echo $row['uid']; ?></div>
        <div class="card-header">
        <div class="card-title"><?php echo $row['stock']; ?></div>
        </div>
        <div class="card-text">Date: <?php echo $row['time']; ?></div>
    </div>
    <div class="col-md-8">
    <div class="card-text"><?php echo $row['view']; ?></div>
    </div>
  </div>
  </div>
  <?php
  }}
  ?>
          </div>
</div>
        </div>
      </div>
    </section>

    <script>
      const btn_menu = document.querySelector(".btn-menu");
      const side_bar = document.querySelector(".sidebar");

      btn_menu.addEventListener("click", function () {
        side_bar.classList.toggle("expand");
        changebtn();
        
      });

      function changebtn() {
        if (side_bar.classList.contains("expand")) {
          btn_menu.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
          btn_menu.classList.replace("bx-menu-alt-right", "bx-menu");
        }
      }

      const btn_theme = document.querySelector(".theme-btn");
      const theme_ball = document.querySelector(".theme-ball");

      const localData = localStorage.getItem("theme");

      if (localData == null) {
        localStorage.setItem("theme", "light");
      }

      if (localData == "dark") {
        document.body.classList.add("dark-mode");
        theme_ball.classList.add("dark");
      } else if (localData == "light") {
        document.body.classList.remove("dark-mode");
        theme_ball.classList.remove("dark");
      }

      btn_theme.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        theme_ball.classList.toggle("dark");
        if (document.body.classList.contains("dark-mode")) {
          localStorage.setItem("theme", "dark");
        } else {
          localStorage.setItem("theme", "light");
        }
      });


      // Click Buttons
      $(document).ready(function(){
  $("#panel").click(function(){
    $("#home").load("panel.php");
  });
});

$(document).ready(function(){
  $("#trade").click(function(){
    $("#home").load("trade.php");
  });
});

$(document).ready(function(){
  $("#search-click").click(function(){
    changebtn();
  });
});

$(document).ready(function(){
  $("#tech").click(function(){
    $("#home").load("../test/chart.php");
  });
});

$(document).ready(function(){
  $("#funda").click(function(){
    $("#home").load("../home/analysis.php");
  });
});

$(document).ready(function(){
  $("#interact").click(function(){
    $("#home").load("../interact/community.php");
  });
});

$(document).ready(function(){
  $("#Update").click(function(){
    $("#home").load("../Update_Info/update.php");
  });
});

function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHints").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "../data/search.php?q=" + str, true);
    xmlhttp.send();
  }
}

$(document).ready(function(){
  
  $("#viewsub").click(function() {
      var stock=$("#stock").val();
      var view = $("#view").val();
      $.ajax({
      url:'../home/view_publish.php',
      data:{stock: stock, view: view},
      type:'POST',
      success:function(data) {
          $("#Views").html(data);
      }
      });
  });
});
    </script>
  </body>
</html>
