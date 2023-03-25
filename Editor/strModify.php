<?php

include('../login/config.php');
include('../home/head.php');
include('../home/header.php');

$capital = 0.0;
$risk = 0.0;

if(isset($_POST['modify']))
{

    $t = $_POST['pri'];
    $orderTable = "SELECT * FROM orders where strid = '$t'";
        $r = $conn->query($orderTable);

        if ($r->num_rows > 0) {
    // output data of each row
        while($ro = $r->fetch_assoc()) {
            if($ro['price']!=0)
            {
                $capital = floatval($ro['price'])*floatval($ro['quantity']);
            }
        }
    }

        // $sql = "UPDATE strategies SET privacy='1' WHERE id='$t'";

        // if (mysqli_query($conn, $sql)) {
            $get = "SELECT * FROM strategies where id='$t'";
            $result = $conn->query($get);

            if ($result->num_rows > 0) {
  // output data of each row
        while($row = $result->fetch_assoc()) {
                $pub = $row['privacy'];
                    if($pub === '0')
                    {
?>
<div class="form-container">
    <form class="form-container" action="ModifyConfirm.php" method="post">
    The strategy shall be public now <input type="checkbox" name="public" id="nameofid" value="1" checked>
    <input type="text" class="form-control" name="fees" placeholder="Fees" value="<?php echo $row['fees']; ?>" />
    <input type="text" class="form-control" name="capital" placeholder="Capital Required" value="<?php echo $row['capital']; ?>" />
    <input type="text" class="form-control" name="risk" placeholder="Risk Percent" value="<?php echo $row['risk']; ?>" />
    <input type="text" class="form-control" name="profit" placeholder="Profit Percent" value="<?php echo $row['profit']; ?>" />
    <input type="text" class="form-control" name="probability" placeholder="Probability Percent" value="<?php echo $row['probability']; ?>" />
    <input type="hidden" name="strid" value="<?php echo $t; ?>"/>

        <input type="submit" name="confirm"/>
    </form>
</div>

<script>
    document.getElementById("nameofid").value = "1";
    document.getElementById("nameofid").checked = true;
</script>

<?php
    }
    else
    {
?>
<div class="form-container">
    <form class="form-container" action="ModifyConfirm.php" method="post">
     The strategy shall be private now.<input type="checkbox" class="form-control" name="public" id="nameofid" checked>
    <input type="text" class="form-control" name="fees" placeholder="Fees" value="<?php echo $row['fees']; ?>" />
    <input type="text" class="form-control" name="capital" placeholder="Capital Required" value="<?php echo $row['capital']; ?>" />
    <input type="text" class="form-control" name="risk" placeholder="Risk Percent" value="<?php echo $row['risk']; ?>" />
    <input type="text" class="form-control" name="profit" placeholder="Profit Percent" value="<?php echo $row['profit']; ?>" />
    <input type="text" class="form-control" name="probability" placeholder="Probability Percent" value="<?php echo $row['probability']; ?>" />
    <input type="hidden" name="strid" value="<?php echo $t; ?>"/>

    <input type="submit" name="confirm"/>
    </form>
</div>

<script>
    document.getElementById("nameofid").value = "0";
    document.getElementById("nameofid").checked = true;
</script>
            <?php
            }
        }    
    }
    mysqli_close($conn);
}
else
{
    echo "Something went wrong. Please try again later.";
}
?>

