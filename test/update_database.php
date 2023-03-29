<?php
include('../login.config.php');

$symbol = $_POST["symbol"];
$closePrice = $_POST["closePrice"];

$sql = "UPDATE stocks SET close=$closePrice WHERE ticker=$symbol";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>