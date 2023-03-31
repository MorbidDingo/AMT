<?php

session_start();
include('../login/config.php');

$todel = $_POST['todel'];

$sql = "DELETE FROM orders WHERE strid='$todel'";

if (mysqli_query($conn, $sql)) {
    $select = "SELECT * FROM orders";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            

            // Execute the command and capture the output
            ?>
            <tr id="orderdetails">
                <!-- <input type="hidden" id="todel" value="<?php echo $strid; ?>" name="todel"> -->
            <td><?php echo $row['ticker']; ?></td>
            <td><?php echo $row['side']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['target']; ?></td>
            <td><?php echo $row['stoploss']; ?></td>
            <td><button class="btn btn-danger" value="Cancel" name="cancel" id="cancel">Cancel</button></td>
        </tr>
        <?php
        }
    }
    
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
?>