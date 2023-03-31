<?php
include ('../login/config.php');
session_start();
$strid = rand(rand(), rand());
$id = $_SESSION['user_id'];
set_time_limit(0);
$stockname = $_POST['stockname'];
$quantity = $_POST['quantity'];
$command = "php ../parallel/updateOrders.php " . escapeshellarg($stockname) . " " . escapeshellarg($quantity);
$output = exec($command);

$sql = "INSERT INTO orders (strid, id, ticker, side, price, quantity, target, stoploss) VALUES ('$strid', '$id', '$stockname', 'buy', 0, '$quantity', 0, 0)";
if (mysqli_query($conn, $sql)) {
    $select = "SELECT * FROM orders";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            

            // Execute the command and capture the output
            ?>
            <tr id="orderdetails">
                <input type="hidden" id="todel" value="<?php echo $strid; ?>" name="todel">
            <td><?php echo $row['ticker']; ?></td>
            <td><?php echo $row['side']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['target']; ?></td>
            <td><?php echo $row['stoploss']; ?></td>
            <td><button class="btn btn-danger" value="Cancel" name="cancel" id="cancel">Cancel</button></td>
        </tr>
        <script>
            $(document).ready(function(){
  
            $("#cancel").click(function() {
                var todel=$("#todel").val();
                $.ajax({
                url:'../home/canord.php',
                data:{todel: todel},
                type:'POST',
                success:function(data) {
                    $("#displayorders").html(data);
                }
                });
            });
            });
        </script>
            <?php
        }
    } else {
        echo "No orders found.";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
