<?php

include('../home/head.php');
include('../login/config.php');

$s = $_POST['cancel'];
$select = "SELECT strid FROM orders where strid='$s'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <form class="form-inline">
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Confirm cancellation</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Type Y to continue</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <input type="submit" class="btn btn-primary mb-2" value = "Confirm" name="confirm"/>
</form>
    <?php
    if(isset($_POST['confrim']))
    {
        $sql = "DELETE FROM orders WHERE strid='$$s'";
        if (mysqli_query($conn, $sql)) {
            ?>
            <a href="../home/index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Go back to HomePage</a>
            <?php
        }
    }
}
    }
 else {
    echo "Error cancelling order: " . mysqli_error($conn);?>
    <a href="../home/index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Go back to HomePage</a>
    <?php
    }
?>