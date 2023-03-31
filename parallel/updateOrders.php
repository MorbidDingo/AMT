<?php
    include('../login/config.php');
    session_start();
    $id = $_SESSION['user_id'];
    
    set_time_limit(0);

    $stockname = $argv[0];
    $quantity = $argv[1];
    $price = 0;

    $fetchprice = "SELECT close FROM stocks WHERE ticker = '$stockname'";
    $fetch = mysqli_query($conn, $fetchprice);

    while($row = mysqli_fetch_assoc($fetch)) {
        $price = $row['close'];
    }

    $intoholdings = "INSERT INTO holdings (id, ticker, avg_price, quantity)
VALUES ('$id', '$stockname', '$price', '$quantity')";

if (mysqli_query($conn, $intoholdings)) {
  $showholdings = "SELECT * FROM holdings WHERE id = '$id'";
  $show = mysqli_query($conn, $showholdings);

  while($record = mysqli_fetch_assoc($show))
  {
    ?>
    <tr>
    <td><?php echo $record['ticker']; ?></td>
    <td><?php echo $record['avg_price']; ?></td>
    <td><?php echo $record['quantity']; ?></td>
    <td><?php echo $record['ticker']; ?></td>
  </tr>
    <?php
  }
}
        
?>