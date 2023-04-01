<?php
  include('../home/head.php');
  include('../login/config.php');
?>
    <style>
        #chart
        {
            height: 95%;
            width: 100%;
            
        }
    </style>

  </head>
  <body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card text-bg-dark">
      <div class="card-title">
      <label for="symbol-input">Symbol:</label>
      <input type="text" id="symbol-input" name="stock"/>
      <button id="search-button" type="submit" class="btn btn-success" name="symbol">Search</button>
      </div>

      <div class="card-subtitle">
      <button id="1d-button" class="btn btn-primary">1 min</button>
      <button id="1w-button" class="btn btn-primary">5 mins</button>
      <button id="1m-button" class="btn btn-primary">15 mins</button>
      <button id="3m-button" class="btn btn-primary">1 Day</button>
      <button id="1y-button" class="btn btn-primary">1 Week</button>
      </div>
      
      <div class="card-content">
      <div id="chart"></div>
    </div>
    </div>
      </div>
    </div>   
    <div class="row">
      <div class="col-12">
      <div class="card text-bg-dark" id="Views">
      </div>
      </div>
    </div>
  </div>
 
<!-- Your HTML code for the search form here -->

    <script src="../test/chart.js"></script>

    <script>
      $(document).ready(function(){
  
  $("#search-button").click(function() {
      var stock=$("#symbol-input").val();
      $.ajax({
      url:'../test/stock_views.php',
      data:{stock: stock},
      type:'POST',
      success:function(data) {
          $("#Views").html(data);
      }
      });
  });
});
    </script>
  </body>

