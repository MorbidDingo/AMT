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
        html, body
        {
            height: 100%;
            width: 100%;
            background-color: black;
        }

        .container-fluid
        {
            display: block; 
            overflow-x: hidden;  
            background-color:black;
            height: 93.3%;
            width: 100%;
            overflow-y: hidden;
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
<body style="background-color: black;">
    <div class="container-fluid">
        <h1 style="text-align: center; color: white;">Automater</h1>
        <div class="row">
            <div class="col-12" style="height: 5vh; margin-top:-3vh;"></div>
                <div class="form-container">
                    <form action="scriptRunner.php" method="post">
                        <div class="card">
                            <div class="card-title"><h3>Strategy Details</h3></div>
                            Strategy Name: <input class="form-control" type="text" placeholder="Golden Crossover"/>
                            Strategy Description: <textarea placeholder="This will tell what the strategy does."></textarea>
                            <div class="form-label">Shall the strategy run in the background?</div>
                            <div class="form-check form-switch" style="margin-left: 1vw;">
                                <input class="form-check-input mt-0" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="YES" style="cursor:pointer;">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                            </div>
                            <div class="form-label">Privacy of your Strategy:</div>
                            <div class="form-check form-switch" style="margin-left: 1vw;">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Public</label>
                                <input class="form-check-input mt-0" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1" style="cursor:pointer;">
                            </div>
                        </div>
                        <div class="col-12" style="height: 5vh;display: block; float: left;"></div>
                        <div class="card">
                            <div class="card-title"><h3>Ticker Details</h3></div>
                            <select class="form-select" aria-label="Default select example">
                                <option selected value="nasdaq">NASDAQ</option>
                                <option value="nyse">NYSE</option>
                                <option value="ame">American</option>
                                <option value="all">All</option>
                            </select>
                            Enter Scrip or Ticker <input class="form-control" type="text" placeholder="AAPL or Apple Inc."/>
                        </div>

                        <div class="col-12" style="height: 5vh;display: block; float: left;"></div>
                        <div class="card">
                            <div class="card-title"><h3>Analysis</h3></div>
                            <select class="form-select" aria-label="Default select example" name="indicators">
                                <option selected>Technical Indicators</option>
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

                            <label for="customRange3" class="form-label">Time Interval</label>
                            <input list="intervalSettings" type="range" class="form-range" min="1" max="8" step="1" value="1" id="customRange3" oninput="rangeValue.innerText = this.value">
                            <datalist id="intervalSettings">
                                <option value="1m">1m</option>
                                <option value="1m">5m</option>
                                <option value="1m">15m</option>
                                <option value="1m">1H</option>
                                <option value="1m">4H</option>
                                <option value="1m">1D</option>
                                <option value="1m">1W</option>
                                <option value="1m">1M</option>
                            </datalist>

                            <script>
                                var time = document.getElementById("customRange3");
                                var output = document.getElementById("rangeValue");
                        
                                function gfg_Run() {
                                    output.value = "1m";
                                    el_down.innerHTML =
                                        "Value = " + "'" + output.value + "'";
                                }
                            </script>
                            <p id="rangeValue">1</p>

                            <select class="form-select" aria-label="Default select example" name="economic" style="margin-top: 2vh;">
                            <option selected disabled>Economic Indicators</option>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

?>