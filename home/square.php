<?php

    if(isset($_POST['square']))
    {
        include('../home/head.php');
        $id = $_SESSION['user_id'];
        $ticker = $_POST['ticker'];
        $result = mysqli_query($conn, "DELETE FROM holdings WHERE id = '$id' AND ticker = '$ticker'");
        $bal = $_POST['bal'];

        // Check if the query was successful
        if ($result) {

            $sql = "SELECT * FROM user_form where id = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                $update = $bal+$row['balance'];

                $upd = "UPDATE user_form SET balance='$update' WHERE id='$id'";

            if (mysqli_query($conn, $upd)) {
            echo "Sold ".$ticker." shares.";
            ?>
                <a href="../home/index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Return to Home</a>
            <?php
            } else {
            echo "Error updating record: " . mysqli_error($conn);
            }
        }
    }

        } else {
        echo "Error deleting record: " . mysqli_error($conn);
        }
    }

?>