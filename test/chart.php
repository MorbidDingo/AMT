<?php
  include('../home/head.php');
?>
    <style>
        #chart
        {
            height: 100%;
            width: 100%;
            
        }
    </style>

  </head>
  <body>
  <div class="card">
      <div class="card-title">
      <label for="symbol-input">Symbol:</label>
      <input type="text" id="symbol-input" />
      <button id="search-button" class="btn btn-success">Search</button>
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
    <script src="../test/chart.js"></script>
  </body>

