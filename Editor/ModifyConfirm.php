<?php

include ('../login/config.php');
include('../home/head.php');

if(isset($_POST['confirm']))
{
    $strid = $_POST['strid'];
    $privacy = $_POST['public'];
    $fees = $_POST['fees'];
    $capital = $_POST['capital'];
    $risk = $_POST['risk'];
    $profit = $_POST['profit'];
    $probability = $_POST['probability'];

    $sql = "UPDATE strategies SET privacy = '$privacy', fees='$fees', capital='$capital', risk = '$risk', profit = '$profit', probability = '$probability' WHERE id='$strid'";

if (mysqli_query($conn, $sql)) {
    ?>
    <a href="../home/index.php" class="btn btn-success">< Return to Homepage</a>
    <?php
  echo "Successfully updated strategy no. ".$strid."!";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

    mysqli_close($conn);
}

?>