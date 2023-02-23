<?php
    include('head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .stocklist:hover
        {
            cursor: pointer;
        }
    </style>

</head>
<body>


<h2 class="card-title border-bottom border-dark" style="text-align: center;" id="main">Trade</h2>
                    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 border" style="margin-top:0vh; height: 93vh; color: white; background-color: rgb(20, 40, 60); border-radius: 0px; width: 95.1vw;">
                <div class="row">
                        <div class="col-md-12 border" style="height:41vh; overflow-y:auto; overflow-x:hidden">
                            <div class="row">
                                <div class="col-md-6 border-bottom" style="border-right: 1px solid white;">
                                    Nifty
                                </div>
                                <div class="col-md-6 border-bottom">
                                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                                        <input type="text" placeholder="Search" name="search" autocomplete="off" id="search">
                                        <input type="submit" name="submit" value="Submit" id="subi">
                                    </form>
                                        <?php
                                            $ar = 0.0;
                                            if (isset($_POST['submit']))
                                            {
                                                $t = $_POST['search'];
                                                echo $t;                                                                                                        
                                                $json = file_get_contents("https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=$t&apikey=Z9B7UL3A9RJJRWTH");
                                                $data = json_decode($json,true);
                                                $ar = $data['Global Quote'];
                                            }
                                        ?>
                                                                                       
                                </div>
                                <div class="col-md-7 border" style="overflow-y:auto; overflow-x:hidden">
                                    Ticker
                                </div>
                                <div class="col-md-5">
                                    Prices
                                </div>
                                <div class="col-md-7 border" style="overflow-y:auto; overflow-x:hidden">
                                    <?php
                                    $id = $_SESSION['user_id'];
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $databasename = "amt";
                                                
                                                // CREATE CONNECTION
                                                $conn = mysqli_connect($servername, 
                                                  $username, $password, $databasename);
                                                
                                                // GET CONNECTION ERRORS
                                                if (!$conn) {
                                                    die("Connection failed: " . mysqli_connect_error());
                                                }
                                                
                                                // SQL QUERY
                                                $query = "SELECT Ticker FROM `stocks` order by name asc;";
                                                // FETCHING DATA FROM DATABASE
                                                $result = $conn->query($query);
  
                                                if ($result->num_rows > 0) 
                                                {
                                                    // OUTPUT DATA OF EACH ROW
                                                    while($row = $result->fetch_assoc())
                                                    {
                                                        ?>
                                                            <li class="stocklist"><?php echo $row["Ticker"] ?>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                                
                                                
                                            ?>
                                            </div>
                                            <div class="col-md-5 border">
                                                <?php
                                                // SQL QUERY
                                                $q = "SELECT close FROM `stocks`;";
                                                // FETCHING DATA FROM DATABASE
                                                $re = $conn->query($q);
                                                    while($r = $re->fetch_assoc())
                                                    {
                                                        ?>
                                                            <li class="stocklist"><?php echo $r["close"] ?></li>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 border border-bottom-0" style="height:41vh" id="watch">
                                        <?php
                                        if($ar!=0.0)
                                            print_r($ar);
                                        else
                                            echo "";
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 border" style="margin-top:0vh; height: 93vh; color: white; background-color: rgb(20, 40, 60); border-radius: 0px; width: 95.1vw;">
                                <?php
                                    $showHoldings = "SELECT * FROM holdings where id = '$id'";

                                    $res = $conn->query($showHoldings);
  
                                                if ($res->num_rows > 0) 
                                                {
                                                    // OUTPUT DATA OF EACH ROW
                                                    while($row = $result->fetch_assoc())
                                                    {
                                                        ?>
                                                            <li class="stocklist"><?php echo $row["ticker"] ?><p><?php echo $row["avg"] ?></p>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "Please buy shares to display Holdings here.";
                                                }

                                    $conn->close();
                                ?>
                            </div>
                        </div>
                    </div>
                    
                    <script>
 $(document).ready(function() {
 
 $("#subi").click(function() {
//  $("#watchlist").load("apiCalls.php");
 var ticker = $("#sea").val();
 
 if(ticker=='') {
 alert("Please enter a valid ticker");
 return false;
 }
 
 $.ajax({
 type: "POST",
 url: "apiCalls.php",
 data: {
 ticker: ticker
 },
 cache: false,
 success: function(data) {
 alert(data);
 },
 error: function(xhr, status, error) {
 console.error(xhr);
 }
 });
 
 });
 
 });
</script>
</body>
</html>
                    