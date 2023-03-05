<?php
if(isset($_POST['buy']))
{
    $tick = $_POST['ticker'];
    $q = $_POST['quantity'];
    echo $tick;
    echo $q;
}
else if(isset($_POST['sell']))
{
    echo $_POST['ticker'];
    echo $_POST['quantity'];
}
?>