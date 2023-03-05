<?php
if(isset($_GET['buy']))
{
    $tick = $_GET['ticker'];
    $q = $_GET['quantity'];
    echo $tick;
    echo $q;
}
else if (isset($_GET['sell']))
{
    $tick = $_GET['ticker'];
    $q = $_GET['quantity'];
    echo $tick;
    echo $q;
}
// else if(isset($_POST['sell']))
// {
//     echo $_POST['ticker'];
//     echo $_POST['quantity'];
// }
?>