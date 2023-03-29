<?php
function get_stock_symbols()
{
    include('../login/config.php');
    $sql = "SELECT ticker FROM stocks";
    $result = mysqli_query($conn, $sql);

    $symbols = array();
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $symbols[] = $row['ticker'];

    }
  }
  return $symbols;
}

?>