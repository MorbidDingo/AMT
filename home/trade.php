<?php
    include('../home/head.php');
    include('../login/config.php');

    $id = $_SESSION['user_id'];

    // $apis = Array();
    // $i = 0;

    // $apis = ['KDO3T9VUTSBFZ95I','Z9B7UL3A9RJJRWTH','H2L0FSX173Z8UGLH', '8OPGJ66I9KZJ0138','5Y6IMVRFWYOYC33K'];
    // $count = 0;
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

    * {
        box-sizing: border-box;
      }
      .openBtn {
        display: flex;
        justify-content: left;
      }
      .openButton {
        border: none;
        border-radius: 5px;
        background-color: #1c87c9;
        color: white;
        padding: 14px 20px;
        cursor: pointer;
        position: fixed;
      }
      .loginPopup {
        position: relative;
        text-align: center;
        width: 50vw;
        height: 50vh;
        margin-left: 5vw;
      }
      .formPopup {
        display: none;
        position: fixed;
        left: 45%;
        top: 5%;
        transform: translate(-50%, 5%);
        border: 3px solid #999999;
        z-index: 9;
      }
      .formContainer {
        max-width: 40vw;
        padding: 20px;
        background-color: #fff;
      }
      .formContainer input[type=text],
      .formContainer input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer input[type=text]:focus,
      .formContainer input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }
      .formContainer .btn {
        padding: 12px 20px;
        border: none;
        background-color: #8ebf42;
        color: #fff;
        cursor: pointer;
        width: 100%;
        margin-bottom: 15px;
        opacity: 0.8;
      }
      .formContainer .cancel {
        background-color: #cc0000;
      }
      .formContainer .btn:hover,
      .openButton:hover {
        opacity: 1;
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
                                    $_SESSION['ticker'] = $row1["ticker"];
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
                                    <button class="btn btn-primary" value="Trade" name="trade" id="<?php echo $row1['ticker'];?>"  onclick="openForm();reply_click(this.id)">Trade</button>
                                    <input type="button" value="Watchlist +" class="btn btn-primary text-right" style="margin-left: 25rem;">
                                </div>
                                </div>
                                <?php                                         
                                    }
                                } 
                                else {
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


                                <?php
                                  $ticker = $_SESSION['ticker'];
                                ?>
                                <div class="loginPopup">
                                  <div class="formPopup animate__animated animate__zoomInDown" id="popupForm">
                                    <form action="tradeBack.php" method= "GET" class="formContainer">
                                      <h2>Trade Details</h2>
                                      <div class="heading-6" id="showTicker"></div>
                                      <!-- <label for="email">
                                        <strong>E-mail</strong>
                                      </label> -->
                                      <input type="text" id="email" placeholder="Quantity" name="quantity" required>
                                      <!-- <label for="psw">
                                        <strong>Password</strong>
                                      </label> -->
                                      <input type="text" id="price" placeholder="Price" name="price" required min="0" max="1000000000.00">
                                      <input type="hidden" name="ticker" value="<?php echo $ticker;?>"/>
                                      <input type="submit" class="btn" value="Buy" name="buy"></input>
                                      <input type="submit" class="btn cancel" onclick="closeForm()" value="Sell" name="sell"></input>
                                    </form>
                                  </div>
                                </div>

   
    <script>
  $(document).ready(function() {
    setInterval(function() {
      $("#quotes").load(window.location.href + " refresh", function() { console.log("loaded") });
    }, 5000);
  });

  function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }

  function reply_click(clicked_id)
  {
    //   alert("Clicked " + clicked_id);
      document.getElementById("showTicker").innerHTML = clicked_id;
  }
</script>
</script>
</body>
</html>