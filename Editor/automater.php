<?php
    include('../login/config.php');
    include('../home/head.php');
    include('../home/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        /* body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
        } */

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }


        html, body
        {
            height: 100%;
            width: 100%;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        .container
        {
            display: block; 
            overflow-x: hidden;  
            background-color:maroon;
            height: 93.3%;
            width: 100%;
            overflow-y: hidden;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;            
        }

        .form-container
        {
            overflow-y: auto;
            height: 80vh;
            border: 1px solid goldenrod;
            border-radius: 25px;
            padding: 0.5em;
            border-right: 0px;
        }

        .card
        {
            border: 1px solid blue;
            border-radius: 40px;
        }

        .card-title:hover
        {
            color: white;
        }
    </style>    

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body style="background-color: maroon;">
    <div class="container">
        <a href="../Editor/enterAutomation.php" class="btn btn-primary">< Back</a>
        <h1 style="text-align: center; color: white;">Automater</h1>
        <div class="row">
            <div class="col-12" style="height: 5vh; margin-top:-3vh;"></div>
                <div class="form-container">
                    <form action="../Editor/strategySave.php" method="post">
                        <div class="card">
                            <!-- Strategy Details -->
                            <div class="card-title"><h3>Strategy Details</h3></div>
                            Strategy Name: <input class="form-control" type="text" placeholder="Golden Crossover" name="name"/>
                            Strategy Description: <textarea placeholder="This will tell what the strategy does." name="descr"></textarea>
        
                            <div class="form-label">Privacy of your Strategy:</div>
                            <div class="form-check form-switch" style="margin-left: 1vw;">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Public</label>
                                <input class="form-check-input mt-0" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1" style="cursor:pointer;" name="privacy">
                            </div>
                        </div>

                        <div class="col-12" style="height: 5vh;display: block; float: left;"></div>
                        <!-- Ticker Details -->
                        <div class="card">
                            <div class="card-title"><h3>Ticker Details</h3></div>
                            <select class="form-select" aria-label="Default select example" name="exchange">
                                <option selected value="nasdaq">NASDAQ</option>
                                <option value="nyse">NYSE</option>
                                <option value="ame">American</option>
                                <option value="all">All</option>
                            </select>
                            Enter Scrip or Ticker <input class="form-control" type="text" placeholder="AAPL or Apple Inc." name="ticker"/>
                        </div>

                        <div class="col-12" style="height: 5vh;display: block; float: left;"></div>

                        <div class="card">
                            <div class="card-title"><h3>Select 2 Indicator Choices</h3></div>
                            <span>Limit Order:</span>
                                <label for="both">
                                    <input type="radio" id="both" name="choice" value="both"/>
                                    Both Technical
                                </label>
                                <label for="either">
                                    <input type="radio" id="either" name="choice" value="either"/>
                                    One Technical and One Economic
                                </label>
                                <hr />
                        </div>

                        <div class="col-12" style="height: 5vh;display: block; float: left;"></div>

                        <!-- Analysis Details -->
                        <div class="card" style="background-color: none">
                        <div class="card-title"><h3>Analysis Details</h3></div>
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-title"><h5>Technical Indicator 1</h5></div>
                            <!-- Ind 1 -->
                            <select class="form-select" aria-label="Default select example" name="indicators1" id="t1" disabled = "disabled">
                                <option selected>Technical Indicator 1</option>
                                <option disabled>Moving Averages (Trend)</option>
                                    <option value="SMA">Simple Moving Averages (SMA)</option>
                                    <option value="WMA">Weighted Moving Averages (WMA)</option>
                                    <option value="EMA">Exponential Moving Averages (EMA)</option>
                                <option disabled>Oscillators (Momentum)</option>
                                    <option value="MACD">MACD</option>
                                    <option value="ATR">ATR</option>
                                    <option value="TRANGE">True Range</option>
                                    <option value="NATR">NATR</option>
                                    <option value="CCI">CCI</option>
                                    <option value="WILLR">William's %R</option>
                                    <option value="AD">Chaikin Oscillator</option>
                                    <option value="STOCHRSI">Stochastic RSI</option>
                                <option disabled>Volatility Indicators</option>
                                    <option value="BBANDS">Bolinger Bands</option>   

                                <option disabled>Volume</option>
                                <option value="OBV">On Balance Volume (OBV)</option>
                                <option value="VWAP">Volume Weighted Average Price (VWAP)</option>
                            </select>

                            <!-- Time Period 1 -->

                            <input type="number" min="0" placeholder="Time Period" name="time1" id="ti1" disabled = "disabled">

                            <!-- Chart interval settings 1 -->

                        <div class="card text-white bg-warning mb-3">
                            <div class="card-title"><h5>Technical Indicator 2</h5></div>
                            <select class="form-select" aria-label="Default select example" name="indicators2" id="ti2" disabled = "disabled">
                                <option selected>Technical Indicator 2</option>
                                <option disabled>Moving Averages (Trend)</option>
                                    <option value="SMA">Simple Moving Averages (SMA)</option>
                                    <option value="WMA">Weighted Moving Averages (WMA)</option>
                                    <option value="EMA">Exponential Moving Averages (EMA)</option>
                                <option disabled>Oscillators (Momentum)</option>
                                    <option value="MACD">MACD</option>
                                    <option value="ATR">ATR</option>
                                    <option value="TRANGE">True Range</option>
                                    <option value="NATR">NATR</option>
                                    <option value="CCI">CCI</option>
                                    <option value="WILLR">William's %R</option>
                                    <option value="AD">Chaikin Oscillator</option>
                                    <option value="STOCHRSI">Stochastic RSI</option>
                                <option disabled>Volatility Indicators</option>
                                    <option value="BBANDS">Bolinger Bands</option>   

                                <option disabled>Volume</option>
                                <option value="OBV">On Balance Volume (OBV)</option>
                                <option value="VWAP">Volume Weighted Average Price (VWAP)</option>
                            </select>

                                <!-- Time Period 2 -->


                            <input type="number" min="0" placeholder="Time Period" name="time2" id="t2" disabled = "disabled">

                            <!-- Chart Interval Setting 2 -->

                            <select id="intervalSettings" name="interval">
                                <option value="#" disabled selected>Chart Interval</option>
                                <option value="1min">1min</option>
                                <option value="5min">5min</option>
                                <option value="15min">15min</option>
                                <option value="60min">60min</option>
                                <option value="daily">daily</option>
                                <option value="weekly">weekly</option>
                                <option value="monthly">monthly</option>
                            </select>
                        </div>
    </div>

                            <!-- Economic Indicator-->
                        <div class="card text-white bg-info mb-3">
                        <div class="card-title"><h5>Economic Indicator</h5></div>
                            <select class="form-select" aria-label="Default select example" name="economic" style="margin-top: 2vh;" id="e" disabled = "disabled">
                            <option selected disabled>Economic Indicator</option>
                                <option value="REAL_GDP">Real GDP</option>
                                <option value="REAL_GDP_PER_CAPITA">Real GDP per capita</option>
                                <option value="FEDERAL_FUNDS_RATE">Federal Funds (Interest) Rates</option>
                                <option value="TREASURY_YIELD">Treasury Yields</option>
                                <option value="CPI">CPI</option>
                                <option value="INFLATION">Inflation</option>
                                <option value="RETAIL_SALES">Retail Sales</option>
                                <option value="DURABLES">Durable Goods Orders</option>
                                <option value="UNENMPLOYMENT">Unemployment Rate</option>
                                <option value="NONFARM_PAYROLL">Nonfarm Payroll</option>
                            </select>
                        </div>
                        </div>

                        <div class="col-12" style="height: 5vh;display: block; float: left;"></div>

                        <!-- Price Details -->

                        <div class="card">
                            <div class="card-title"><h3>Order Details</h3></div>
                            <span>Limit Order:</span>
                                <label for="chkYes">
                                    <input type="radio" id="chkYes" name="price" value="limit"/>
                                    Yes
                                </label>
                                <label for="chkNo">
                                    <input type="radio" id="chkNo" name="price" value="market"/>
                                    No
                                </label>
                                <hr />

                                <input type="text" class="form-control" placeholder="Quantity of scrip" name="quantity">

                                <input type="text" id="limit" disabled="disabled" placeholder="Enter limit Price" min="0" name="limit"/>

                                <input type="button" class="btn btn-primary" name="reset" id="choose" value="Choose a side (Buy or Sell)">
                                <label for="buy">
                                <input type="radio" name="side" id="buy" value="buy">
                                    Buy
                                </label>
                                <label for="sell">
                                <input type="radio" name="side" id="sell" value="sell">
                                    Sell
                                </label>

                                <input type="text" placeholder="Stoploss" name="stop"/>
                                <input type="text" placeholder="Target" name="target"/>
                        </div>

                        <div class="col-12" style="height: 5vh;display: block; float: left;"></div>

                        <!-- Save button -->
                        <input type="submit" class="btn btn-primary" id="save" value="Save" name="save"/>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
<script type="text/javascript">
    $(function () {
        $("input[name='price']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#limit").removeAttr("disabled");
                $("#limit").focus();
            } else {
                $("#limit").attr("disabled", "disabled");
            }
        });
    });

    $(function () {
        $("input[name='choice']").click(function () {
            if ($("#both").is(":checked")) {
                $("#t1").removeAttr("disabled");
                $("#ti1").removeAttr("disabled");
                $("#t2").removeAttr("disabled");
                $("#ti2").removeAttr("disabled");
                $("#e").attr("disabled", "disabled");
                // $("#limit").focus();
            } else if($("#either").is(":checked"))
            {
                $("#t2").attr("disabled", "disabled");
                $("#t1").removeAttr("disabled");
                $("#ti1").removeAttr("disabled");
                $("#e").removeAttr("disabled");
                $("#ti2").attr("disabled", "disabled");
            }
        });
    });

    $(function () {
        $("input[name='side']").click(function () {
            if($("#buy").is(":checked")) {
                $("#sell").attr("disabled", "disabled");
            }
            else if($("#sell").is(":checked")){
                $("#buy").attr("disabled", "disabled");
            }
        });
    });

    $(function () {
        $("input[name='reset']").click(function () {
                $("#sell").removeAttr("disabled");
                $("#buy").removeAttr("disabled");    
        });
    });
</script>
    
</body>
</html>
