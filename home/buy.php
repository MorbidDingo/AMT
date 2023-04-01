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
    <div class="card text-center dark bg-warning mb-3">
    <?php
    #Get funds available

    $select = "SELECT balance FROM user_form WHERE id = '$id'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $funds = $row['balance'];
        $required = $quantity*$price;
        $settlement = $funds - $required;
    
        if($settlement<0)
        {
            $del = "DELETE FROM holdings WHERE id='$id' AND quantity='$quantity' AND ticker = '$stockname'";
            if (mysqli_query($conn, $del))
            { 
            echo "Not enough funds available.";
            }
        }
        #update funds if the balance is available
        else{
        $update = "UPDATE user_form SET balance='$settlement' WHERE id='$id'";

        if (mysqli_query($conn, $update)) {
        ?>
            <div class="card-header">Buy <?php echo $quantity." shares of ". $stockname." for USD ".$required." ?"; ?></div>
            <div class="card-title"><?php echo "Available funds will be: ".$settlement; ?></div>
        <?php
        } else {
        echo "Error updating funds: " . mysqli_error($conn);
        }
    }
    

    ?>
    <a href="../home/index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Confirm Purchase</a>
    </div>
            <?php
        }
    }
}
 else {
        echo mysqli_error($conn);
}
?>