<?php
    include('../home/head.php');
    include('../login/config.php');
    
    // session_start();
    // $id = $_SESSION['user_id'];

    $ticker = '';

    // $apis = Array();
    // $i = 0;

    // $apis = ['KDO3T9VUTSBFZ95I','Z9B7UL3A9RJJRWTH','H2L0FSX173Z8UGLH', '8OPGJ66I9KZJ0138','5Y6IMVRFWYOYC33K'];
    // $count = 0;
?>
	<title>Trading Page</title>
	
    <style>
        /* styles for the table */
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 1em;
}

th, td {
  text-align: left;
  padding: 0.5em;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

/* styles for the buy and sell buttons */
.buy-button, .sell-button {
  width:70px;
  background-color: black;
  border: none;
  color: white;
  padding: 0.5em;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 25px;
}

#sell:hover
{
  background-color: red;
}

.buy-button:hover, .sell-button:hover {
  background-color: #3e8e41;
}

/* styles for the header and footer */
header, footer {
  background-color: #333;
  color: white;
  text-align: center;
  padding: 1em;
}
.row{

    height:36vh;
    overflow-y:auto;
}
#trade{
    margin-top:4rem;
}
.col-6{
    overflow-y:auto;
}

    </style>
</head>
<body>
    <div class="container-fluid">
		<section id="stocks">
       
			<h2 style="text-align:center;">All Stocks</h2>
            <div class="row" id="tickers">
			<table>
				<thead>
					<tr>
						<th>Symbol</th>
						<th>Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Buy</th>
						<th>Sell</th>
					</tr>
				</thead>
				<tbody>
          <form action="updateOrder.php" method="post">
					<tr>
                    <?php
                            $sql = "SELECT * FROM stocks";
                            $api = "SELECT * FROM apis";
                            $result1 = $conn->query($sql);


                            if ($result1->num_rows > 0) {
                                while($row1 = $result1->fetch_assoc()) 
                                {
                                  ?>
						<td> <img src='https://companiesmarketcap.com/img/company-logos/64/<?php echo $row1["ticker"];?>.webp'/>
</td>
						<td> <?php
                                    // $_SESSION['ticker'] = $row1["ticker"];
                                    echo $row1["name"]."\t\t";
                                    ?></td>
						<td id="<?php echo $row1["ticker"];?>"></td>
						<td><input type="number" min="1" name=""></td>
						<td><button class="buy-button" onclick="buy()">Buy</button></td>
						<td><button class="sell-button" id="sell" onclick="sell()">Sell</button></td>
					</tr>
          </form>
					<!-- <tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr> -->
                    <?php                                         
                                    }
                                } 
                                else {
                                    echo "0 results";
                                    }
                                ?>
					<!-- add more stocks here -->
				</tbody>
			</table>
                                  </section>
		</section>
        
            <div class="row border-top" id="trade">
                <div class="col-6 border-right">
                <section id="orders">
			<h2>Orders</h2>
			<table>
					<tr>
						<th>Type</th>
						<th>Symbol</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Status</th>
					</tr>
				<tbody>
					<!-- display user's orders here -->
				</tbody>
			</table>
		</section>

                </div>
                <div class="col-6">
                <section id="orders">
			<h2>Holdings</h2>
			<table>
					<tr>
						<th>Type</th>
						<th>Symbol</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Status</th>
					</tr>
				<tbody>
					<!-- display user's orders here -->
				</tbody>
			</table>
                                  </div>
                </div>
            </div>
        </div>
	<!-- <footer>

	</footer> -->
	<script src="app.js"></script>

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
              $("#" + symbol).html(closePrice.toFixed(2));
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
      setTimeout(updateStockPrices, 1000);
    }

    // Call the updateStockPrices() function to start updating the stock prices
    updateStockPrices();

    function buy() {
  updateOrder('buy');
}

function sell() {
  updateOrder('sell');
}

function updateOrder(action) {
  var ticker = document.getElementById('ticker').value;
  var quantity = document.getElementById('quantity').value;
  
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById('order-div').innerHTML = xhr.responseText;
      } else {
        console.log('Error: ' + xhr.status);
      }
    }
  };
  
  xhr.open('POST', 'updateOrder.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send('ticker=' + ticker + '&quantity=' + quantity + '&action=' + action);
}

      
</script>
</body>
</html>