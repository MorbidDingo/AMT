<?php

    include('../login/config.php');
    include('../home/head.php');

    $stock = $_POST['stock'];

    $select = "SELECT * FROM views WHERE stock = '$stock'";
    $result = mysqli_query($conn, $select);
    ?>
    <div class="card text-bg-dark">
    <h2 class="card-header">Community Views on <?php echo $stock; ?></h2>
          <?php
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4" style="border-right: 1px solid gray;">
                <div class="card-text"><?php echo $row['uid']; ?></div>
                <div class="card-text"><?php echo $row['stock']; ?></div>
                <div class="card-text"><?php echo $row['time']; ?></div>
              </div>
              <div class="col-md-8">
                <div class="card-text"><?php echo $row['view']; ?></div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    } else {
      echo 'No views found for stock symbol: ' . $symbol;
    }
?>
