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
                                                            <div class="stocklist" id="a"><?php echo $row["Ticker"] ?></div>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                                
                                                
                                            ?>
                                            </div>
                                            <style>
                                                .stocklist{
                                                    border: 0px solid white; 
                                                    cursor: pointer;
                                                    padding-left: -10px;
                                                }
                                                /* #a:hover ~ #stockPrice
                                                {
                                                    /* not(.stocklist); */
                                                    /* margin-left: 3vw; */
                                                    /* transition-duration: 200ms; */
                                                    /* border-bottom: 1px solid white; */
                                                    /* border-top: 1px solid white; */
                                                    /* backdrop-filter: blur(10px); */
                                                    /* background-color: black; */
                                                    /* -webkit-filter: blur(2px); */
                                                    /* -moz-filter: blur(2px);
                                                    -o-filter: blur(2px);
                                                    -ms-filter: blur(2px); */
                                                    /* filter: blur(2px);   */
                                                /* } */

                                                /* #stockPrice:hover
                                                {
                                                    transition-duration: 200ms;
                                                    border-bottom: 1px solid white;
                                                    border-top: 1px solid white;
                                                    backdrop-filter: blur(10px);
                                                    background-color: black;
                                                    margin-left: -40vw;
                                                } */
                                                /* Button used to open the contact form - fixed at the bottom of the page */
                                                .open-button {
                                                background-color: #555;
                                                color: white;
                                                padding: 16px 20px;
                                                border: none;
                                                cursor: pointer;
                                                opacity: 0.8;
                                                position: fixed;
                                                bottom: 23px;
                                                right: 28px;
                                                width: 280px;
                                                }

                                                /* The popup form - hidden by default */
                                                .form-popup {
                                                display: none;
                                                position: fixed;
                                                bottom: 0;
                                                right: 15px;
                                                border: 3px solid #f1f1f1;
                                                z-index: 9;
                                                /* margin-left: 20vh; */
                                                }

                                                /* Add styles to the form container */
                                                .form-container {
                                                max-width: 300px;
                                                padding: 10px;
                                                background-color: white;
                                                margin-left: 20vw;
                                                }

                                                /* Full-width input fields */
                                                .form-container input[type=text], .form-container input[type=password] {
                                                width: 100%;
                                                padding: 15px;
                                                margin: 5px 0 22px 0;
                                                border: none;
                                                background: #f1f1f1;
                                                }

                                                /* When the inputs get focus, do something */
                                                .form-container input[type=text]:focus, .form-container input[type=password]:focus {
                                                background-color: #ddd;
                                                outline: none;
                                                }

                                                /* Set a style for the submit/login button */
                                                .form-container .btn {
                                                background-color: #04AA6D;
                                                color: white;
                                                padding: 16px 20px;
                                                border: none;
                                                cursor: pointer;
                                                width: 100%;
                                                margin-bottom:10px;
                                                opacity: 0.8;
                                                }

                                                /* Add a red background color to the cancel button */
                                                .form-container .cancel {
                                                background-color: red;
                                                }

                                                /* Add some hover effects to buttons */
                                                .form-container .btn:hover, .open-button:hover {
                                                opacity: 1;
                                                }
                                            </style>
                                            <div class="col-md-5 border">
                                                <?php
                                                // SQL QUERY
                                                $q = "SELECT close FROM `stocks`;";
                                                // FETCHING DATA FROM DATABASE
                                                $re = $conn->query($q);
                                                    while($r = $re->fetch_assoc())
                                                    {
                                                        ?>
                                                            <div class="stocklist" id="stockPrice" onclick="openForm()"><?php echo $r["close"] ?></div>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                            <script>
                                                function openForm() {
                                                document.getElementById("myForm").style.display = "block";
                                                }

                                                function closeForm() {
                                                document.getElementById("myForm").style.display = "none";
                                                }

                                                // $(function() {
                                                // $('#a').hover(function() {
                                                //     $('#stockPrice').css('background-color', 'yellow');
                                                // }, function() {
                                                //     // on mouseout, reset the background colour
                                                //     $('#stockPrice').css('background-color', '');
                                                // });
                                                // });
      
                                            </script>

                                        </div>

                                    </div>
                                    <div class="form-popup" id="myForm">
                                    <form action="/action_page.php" class="form-container">
                                        <h1>Login</h1>

                                        <label for="email"><b>Email</b></label>
                                        <input type="text" placeholder="Enter Email" name="email" required>

                                        <label for="psw"><b>Password</b></label>
                                        <input type="password" placeholder="Enter Password" name="psw" required>

                                        <button type="submit" class="btn">Login</button>
                                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                    </form>
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
                    