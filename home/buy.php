<?php
include('../login/config.php');
include('../home/head.php');

$id = $_SESSION['user_id'];
$stockname = $_POST['stockname'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

// $sql = "INSERT INTO orders (strid, id, ticker, side, price, quantity, target, stoploss) VALUES ('$strid', '$id', '$stockname', 'buy', 0, '$quantity', 0, 0)";
$sql = "INSERT INTO holdings (id, ticker, avg_price, quantity) VALUES ('$id', '$stockname', '$price', '$quantity')";
if (mysqli_query($conn, $sql)) {
    ?>
        <a href="../home/index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Home</a>
            <?php
        }
 else {
        echo mysqli_error($conn);
}
?>