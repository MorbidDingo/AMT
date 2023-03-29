<?php
  include('../login/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="path/to/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <!-- <script src="https://cdn.jsdelivr.net/npm/cors-anywhere@0.4.4/lib/cors-anywhere.min.js"></script> -->

</head>
<body>
    <table id="stockTable">
        <tr>
          <th>Symbol</th>
          <th>Latest Close Price</th>
        </tr>
        <?php
           $result = mysqli_query($conn, "SELECT ticker FROM stocks");
           while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['ticker']; ?></td>
          <td id="<?php echo $row['ticker']; ?>" class="animate__animated animate__fadeIn"></td>
        </tr>
        <?php
      } ?>
        <!-- Add rows for the other Dow 30 stocks -->
      </table>
    

      <script>
     

    // Define the updateStockPrices() function to fetch the latest close price for each stock symbol asynchronously using setTimeout()
    const stockSymbols = ['AAPL', 'AMGN', 'AXP', 'BA', 'CAT', 'CRM', 'CSCO', 'CVX', 'DIS', 'DOW', 'GS', 'HD', 'HON', 'IBM', 'INTC', 'JNJ', 'JPM', 'KO', 'MCD', 'MMM', 'MRK', 'MSFT', 'NKE', 'PG', 'TRV', 'UNH', 'V', 'VZ', 'WBA', 'WMT'];
    function updateStockPrices() {
      stockSymbols.forEach(function(symbol) {
        setTimeout(function() {
          $.ajax({
            url: "https://query1.finance.yahoo.com/v8/finance/chart/" + symbol + "?interval=1d",
            success: function(data) {
              // Parse the JSON response and extract the latest close price
              var closePrice = data.chart.result[0].indicators.quote[0].close.slice(-1)[0];
              // Update the content of the <td> element for the current stock symbol with the latest close price
              $("#" + symbol).html(closePrice);
              // Send an AJAX request to the server to insert or update the latest close price in the MySQL database
              $.ajax({
                type: "POST",
                url: "../test/update_database.php",
                data: { symbol: symbol, closePrice: closePrice }
              });
            }
          });
        }, 5000);
      });

      // Call this function again after 5 seconds to update the stock prices again
      setTimeout(updateStockPrices, 5000);
    }

    // Call the updateStockPrices() function to start updating the stock prices
    updateStockPrices();

    let variable = "-hello world-";

document.title  = "___/TEXT :: TEXT: " + variable + " \ _________";
console.log(document.title);
/*
OR
document.title  = "___/TEXT :: TEXT: var \ _________";
document.title  = document.title.replace('var', variable);
*/

    // Listen on a specific host via the HOST environment variable
// var host = process.env.HOST || '0.0.0.0';
// // Listen on a specific port via the PORT environment variable
// var port = process.env.PORT || 3306;

// var cors_proxy = require('cors-anywhere');
// cors_proxy.createServer({
//     originWhitelist: [], // Allow all origins
//     requireHeader: ['origin', 'x-requested-with'],
//     removeHeaders: ['cookie', 'cookie2']
// }).listen(port, host, function() {
//     console.log('Running CORS Anywhere on ' + host + ':' + port);
// });
    
      </script>
</body>
</html>