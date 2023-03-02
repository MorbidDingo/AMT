<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>

    <style>
        .btn:hover
        {
            background:color: black !important;
            color: white !important;
            transition-duration: .3s;
        }

        .btn-primary:hover
        {
            background:color: black !important;
            color: white !important;
            transition-duration: .3s;
        }
    </style>
</head>
<body>
<?php
include('../home/head.php');
include('../login/config.php');

if (['stockname']!='')
{
    $name = $_POST['stockname'];
    // include('../home/header.php');
    // include('../home/sidebar.html');
?>
    <div class="card" style="overflow-y: auto;";>
        <div class="card-title" style= "background-color: black; color: white;"><h3><?php echo $name ?></h3></div>
    
<?php

$json = file_get_contents("https://www.alphavantage.co/query?function=OVERVIEW&symbol=$name&apikey=Z9B7UL3A9RJJRWTH");

$data = json_decode($json,true);

$k = array();
$v = array();
$i = 0;

foreach ($data as $key => $val)
{
    $k[$i] = $key;
    $v[$i] = $val;
    $i++;
}
?>


<?php
    $count=0;
    for($j = 0; $j<count($k); $j++)
    {
        $count++;
?>
        <div class="card" style="overflow-y: auto;">
        <button class="btn btn-primary" style="background-color: gray; color: black;" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample<?php echo $count;?>" aria-expanded="false" aria-controls="#multiCollapseExample<?php echo $count;?>"> <?php echo $k[$j]; ?></button>
        <!-- <div class="row"> -->
            <div class="col-12" style="overflow-x:hidden;">
                <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $count;?>" style="background-color: black; overflow-x:hidden;">
                    <div class="card card-body" style="overflow-x:hidden;">
                        <?php echo $v[$j]; ?>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        </div>
<?php
    }
}
else
{
    echo "Please enter a stock";
}
?>
</body>
</html>

