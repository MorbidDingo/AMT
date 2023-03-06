<?php
include('../login/config.php');
include('../home/head.php');

$uid = $_SESSION['user_id'];

    if(isset($_POST['save']))
    {
        $indicator1 = '';
        $indicator2 = '';
        $time1 = 0;
        $time2 = 0;
        $limit = 0;
        $strTable = '';
        $orderTable = '';

        if($_POST['privacy'] !== null)
        {
            $privacy = 0;
            $name = $_POST['name'];
            $descr = $_POST['descr'];
            $ticker = $_POST['ticker'];
            $side = $_POST['side'];
            $choice = $_POST['choice'];
            $interval = $_POST['interval'];
            $stop = $_POST['stop'];
            $target = $_POST['target'];
            $price = $_POST['price'];

            if($price==="limit")
            {
                $limit = $_POST['limit'];
                $orderTable = "INSERT INTO orders (id, ticker, side, price, target, stoploss') VALUES ('$uid', '$ticker', '$side', '$limit', '$target', '$stop')";
            }
            else
            {
                $orderTable = "INSERT INTO orders (id, ticker, type, side,target, stoploss') VALUES ('$uid', '$ticker', '$type', '$side', '$target', '$stop')";
            }

            if($choice==="both")
            {
                $indicator1 = $_POST['indicators1'];
                $indicator2 = $_POST['indicators2'];
                $time1 = $_POST['time1'];
                $time2 = $_POST['time2'];

                $strTable = "INSERT INTO strategies (uid, name, descr, privacy, indicator1, indicator2, time1, time2, chart_interval) VALUES ('$uid', '$name', '$descr', '$privacy', '$indicator1', '$indicator2', '$time1', '$time2','$interval')";
            }

            else
            {
                $indicator1 = $_POST['indicators1'];
                $economic = $_POST['economic'];
                $time1 = $_POST['time1'];

                $strTable = "INSERT INTO strategies (uid, name, descr, privacy, indicator1, indicator2, time1, chart_interval) VALUES ('$uid', '$name', '$descr', '$privacy', '$indicator1', '$indicator2', '$time1', '$interval')";
            }

            if ($conn->query($strTable) && $conn->query($orderTable) === TRUE) {
                echo "<script> alert('Saved ".$name." Successfully!') </script>";
                } else {
                echo "Error: " . $strTable . "<br>" . $conn->error;
                }
            }
        else
        {
            $privacy = $_POST['privacy'];
            $name = $_POST['name'];
            $descr = $_POST['descr'];
            $ticker = $_POST['ticker'];
            $side = $_POST['side'];
            $choice = $_POST['choice'];
            $interval = $_POST['interval'];
            $stop = $_POST['stop'];
            $target = $_POST['target'];
            $price = $_POST['price'];

            if($price==="limit")
            {
                $limit = $_POST['limit'];
                $orderTable = "INSERT INTO orders (id, ticker, side, price, target, stoploss) VALUES ('$uid', '$ticker', '$type', '$side', '$limit', '$target', '$stop')";
            }
            else
            {
                $orderTable = "INSERT INTO orders (id, ticker, side, target, stoploss) VALUES ('$uid', '$ticker', '$type', '$side', '$target', '$stop')";
            }

            if($choice==='both')
            {
                $indicator1 = $_POST['indicators1'];
                $indicator2 = $_POST['indicators2'];
                $time1 = $_POST['time1'];
                $time2 = $_POST['time2'];

                $strTable = "INSERT INTO strategies (id, uid, name, descr, privacy, indicator1, indicator2, time1, time2, chart_interval) VALUES ('$uid', '$name', '$descr', '$privacy', '$indicator1', '$indicator2', '$time1', '$time2')";
            }

            else
            {
                $indicator1 = $_POST['indicators1'];
                $economic = $_POST['economic'];
                $time1 = $_POST['time1'];

                $strTable = "INSERT INTO strategies (id, uid, name, descr, privacy, indicator1, indicator2, time1, chart_interval) VALUES ('$uid', '$name', '$descr', '$privacy', '$indicator1', '$indicator2', '$time1')";
            }

            if (mysqli_query($conn, $strTable)) {
                echo "<script> alert('Saved ".$name." Successfully!') </script>";
                } else {
                echo "Error: " . $strTable . "<br>" . $conn->error;
                }

            if (mysqli_query($conn, $orderTable))
            {
                echo "<script> alert('Order Updated Successfully!') </script>";
            } 
            else 
            {
                echo "Error: " . $orderTable . "<br>" . $conn->error;
            }                
        }
    
                mysqli_close($conn);
        }
    else
    {
        echo "<script> alert('Could not save ".$name."') </script>";
    }
?>