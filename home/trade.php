<?php
    include('../home/head.php');
    include('../login/config.php');

    $id = $_SESSION['user_id'];

    $apis = Array();
    $i = 0;

    $apis = ['KDO3T9VUTSBFZ95I','Z9B7UL3A9RJJRWTH','H2L0FSX173Z8UGLH', '8OPGJ66I9KZJ0138','5Y6IMVRFWYOYC33K'];
    $count = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade</title>
</head>

<style>

    .row
    {
        /* border-right: 1px solid black;*/
        
        padding-bottom: 5px;
        height: 100%;
    }
    .expanded 
    {
        width: 100%;
        height: 200%;
        transition-duration: 300ms;
        margin-top: 10px;
    }

    .card
    {
            transition-duration: 300ms;
            margin-top: 10px;
            border-radius: 25px;
            background-color: black;
            color: white;
            height: 40%;
    }

    img
    {
        margin-left: 5px;
        margin-top: 10px;
    }

    .col-2,.col-3,.col-5
    {
        border: 1px solid black;
        /* border-radius: 25px; */
    }

    .col-6
    {
        /* border-right: 1px solid black; */
        /* border-left: 1px solid black; */
        height: 100%;
        border-right: 1px solid #474E68;
        margin-top: 5px;
    }

    .col-6 .container-fluid
    {
        /* overflow-y: auto; */
        border-radius: 25px;
        /* border-bottom: 2px solid black; */
    }

    .col-12
    {
        height: 100%;
        /* border-radius: 25px; */
        /* border-right: 1px solid black; */
    }

    .card-title
    {
        border-radius: 25px;
    }

    .card-title:hover
    {
        background-color: white;
    }

    h3
    {
        border-bottom: 1px solid black;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row" style="border-bottom: 2px solid black;">
            <div class="col-6">
            <h3 class="heading-6 animate__animated animate__bounceIn">Dow 30</h3>
                <!-- All stocks with prices -->
                <div class="container-fluid" style="height: 50vh">
                    <div class="row">
                        <div class="col-12" style="overflow-y: auto;">
                        <?php
                            $sql = "SELECT * FROM stocks";
                            $api = "SELECT * FROM apis";
                            $result1 = $conn->query($sql);


                            if ($result1->num_rows > 0) {
                                while($row1 = $result1->fetch_assoc()) 
                                {
                        ?>
                            <div class="card animate__animated">
                                <div class="card-title">
                                <img src='https://companiesmarketcap.com/img/company-logos/64/<?php echo $row1["ticker"];?>.webp'/>
                                    <?php
                                    echo $row1["name"]."\t\t";
                                    ?>
                                </div>

                                <div class="card-body" id="quotes">
                                
                                    <?php

                                    // if ($result2->num_rows > 0) {
                                    //     while($row2 = $result2->fetch_assoc()) {                                
                                        // $json = file_get_contents("https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=".$row1['ticker']."&apikey=".$apis[0]);

                                        // $data = json_decode($json,true);
                                        $url = "https://query1.finance.yahoo.com/v8/finance/chart/".$row1['ticker']."?region=US&lang=en-US&includePrePost=false&interval=1m&useYfid=true&range=1d";
                                        $data = json_decode(file_get_contents($url), true);
                                        $price = $data['chart']['result'][0]['meta']['regularMarketPrice'];
                                        $latestPrices = "UPDATE stocks SET close = ".$price." where ticker = '".$row1['ticker']."'";

                                        if ($conn->query($latestPrices) === TRUE) {

                                        } else 
                                        {
                                        echo "Error: " . $latestPrices . "<br>";
                                        }
                                            echo "|Price: ".$price."\t|";
                                    //     }
                                    // }                                        
                                    ?>
                                </div>
                                <div class="card-footer" style="margin-top: -2rem;">
                                    <input type="submit" class="btn btn-success align-self-end" value="Buy" name="buy" id="buy"/>
                                    <input type="submit" class="btn btn-danger align-self-end" value="Sell" name="sell" id="sell" style="margin-left: 0.5rem;"/>
                                    <input type="button" value="Watchlist +" class="btn btn-primary text-right" style="margin-left: 25rem;">
                                </div>
                                </div>
                                <?php                                         
                                    }
                                 } else {
                                    echo "0 results";
                                    }
                                    $conn->close();
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Watchlist -->
            <div class="col-6">
                <h3 class="heading-6 animate__animated animate__bounceIn">My Watchlist</h3>
                <div class="card placeholder-glow">
                    <h5 class="card-title placeholder-glow">
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <script>
  $(document).ready(function() {
    setInterval(function() {
      $("#quotes").load(window.location.href + " refresh", function() { console.log("loaded") });
    }, 5000);
  });
</script>
</body>
</html>