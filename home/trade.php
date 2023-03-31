<?php
    include('../home/head.php');
    include('../login/config.php');
    
    // session_start();
    $uid = $_SESSION['user_id'];

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
  padding-bottom: 0.5em;
  border-bottom: 1px solid #ddd;
  border: 1px solid #ddd;
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
#tickers{

    height:36vh;
    overflow-y:auto;
}
#trade{
    margin-top:4rem;
}
.col-6{
    overflow-y:auto;
    border: 1px solid black;
}

th
{
  /* background-color: #c0c0c0; */
    position:relative;
    /* top:0; */
    /* width:100%; */
    /* z-index:100; */
}

.row{
  height: 30%;
}

    </style>
</head>
<body>
    <div class="container-fluid">
		<section id="stocks">
       
			<h2 style="text-align:center;">All Stocks</h2>
            <div class="row" id="tickers" style="border-bottom: 1px solid black;">
			<table>
				<thead>
					<tr>
						<th class="sticky-top">Company</th>
						<th class="sticky-top">Name</th>
						<th class="sticky-top">Price</th>
            <th class="sticky-top">   &nbsp  </th>
            <th class="sticky-top">  &nbsp   </th>
            <th class="sticky-top"> &nbsp </th>
            <th class="sticky-top"> &nbsp </th>
						<th class="sticky-top">Buy</th>
					</tr>
				</thead>
				<tbody>
					<tr>
                    <?php
                            $sql = "SELECT * FROM stocks";
                            $api = "SELECT * FROM apis";
                            $result1 = mysqli_query($conn, $sql);


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
						<td id="<?php echo $row1["ticker"];?>"><?php echo $row1['close']; ?></td>
						<td>=====</td>
            <td>=====</td>
            <td>===== </td>
            <td>====</td>
            <td>
            <form action="buy.php" method="post">
              <input type="text" name="quantity" id="quantity">
              <input type="hidden" name="price" id="price" value="<?php echo $row1['close']; ?>" />
              <input type="hidden" name="stockname" id="stockname" value="<?php echo $row1['ticker']; ?>" />
              <input type="submit" class="buy-button" id="buy" name="action" value="Buy" />
            </form>
          </td>
					</tr>
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
        
            <div class="row border-top" id="trade" style="padding-top: -20px;">
                <div class="col-6 border-right">
                <!-- <section id="orders"> -->
			<h4>Orders</h4>
			<table>
					<tr>
          <th class="sticky-top">Symbol</th>
						<th class="sticky-top">Side</th>
						<th class="sticky-top">Price</th>
						<th class="sticky-top">Quantity</th>
						<th class="sticky-top">Target</th>
						<th class="sticky-top">Stoploss</th>
            <th class="sticky-top"> &nbsp </th>
					</tr>
				<tbody id="displayorders">
          <?php
        $select = "SELECT * FROM orders where id = '$uid'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            

            // Execute the command and capture the output
            ?>
            <tr id="orderdetails">
            <td><?php echo $row['ticker']; ?></td>
            <td><?php echo $row['side']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['target']; ?></td>
            <td><?php echo $row['stoploss']; ?></td>
          <form method="post" action="../home/canord.php">
            <td><input type="submit" class="btn btn-danger" value="Cancel" name="<?php echo $row['strid']; ?>" id="cancel" /></td>
        </form>
            <?php }} ?>
        </tr>
				</tbody>
			</table>
		</section>

                </div>
                <div class="col-6">
                <section id="orders">
			<h4>Holdings</h4>
			<div id="holdings">
					
        </div>
                                  </div>
                </div>
            </div>
        </div>
	<!-- <footer>

	</footer> -->
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
      setTimeout(updateStockPrices, 5000);
    }

    // Call the updateStockPrices() function to start updating the stock prices
    updateStockPrices();
      
    $(document).ready(function() {
        setInterval(function() {
            $('#holdings').load('../parallel/update_holdings.php');
        }, 500); // Refresh every 5 seconds
    });

</script>
</body>
</html>