<?php
// if (isset($_POST['submit']))
// {
//     $t = $_POST['search'];
//     echo $t;
$t = 'TSLA';

$json = file_get_contents("https://www.alphavantage.co/query?function=OVERVIEW&symbol=TSLA&apikey=Z9B7UL3A9RJJRWTH");

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <h1>
        <?php
            for($j = 0; $j<count($k); $j++)
            {
                echo $k[$j];
        ?>
        -
        <?php
            echo $v[$j].'<br><br><br>';
            echo "\xA";
            }
        ?><br>
    </h1><br>
    
</body>
</html>