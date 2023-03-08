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

        if(empty($_POST['privacy']))
        {
            $privacy = 0;
            $name = str_replace(",", "_", $_POST['name']);
            $descr = $_POST['descr'];
            $ticker = $_POST['ticker'];
            $side = $_POST['side'];
            $choice = $_POST['choice'];
            $interval = $_POST['interval'];
            $stop = $_POST['stop'];
            $target = $_POST['target'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $strid = $name.'unique'.$uid.rand();

            if($price==="limit")
            {
                $limit = $_POST['limit'];
                $orderTable = "INSERT INTO orders (strid, id, ticker, side, price, quantity, target, stoploss) VALUES ('$strid', '$uid', '$ticker', '$side', '$limit', '$quantity', '$target', '$stop')";
            }
            else
            {
                $orderTable = "INSERT INTO orders (strid, id, ticker, side, quantity, target, stoploss) VALUES ('$strid', '$uid', '$ticker', '$side', '$quantity', '$target', '$stop')";
            }

            if($choice==="both")
            {
                $indicator1 = $_POST['indicators1'];
                $indicator2 = $_POST['indicators2'];
                $time1 = $_POST['time1'];
                $time2 = $_POST['time2'];

                $strTable = "INSERT INTO strategies (id, uid, name, descr, privacy, indicator1, indicator2, time1, time2, chart_interval) VALUES ('$strid', '$uid', '$name', '$descr', '$privacy', '$indicator1', '$indicator2', '$time1', '$time2','$interval')";
            }

            else
            {
                $indicator1 = $_POST['indicators1'];
                $economic = $_POST['economic'];
                $time1 = $_POST['time1'];

                $strTable = "INSERT INTO strategies (id, uid, name, descr, privacy, indicator1, indicator2, time1, chart_interval) VALUES ('$strid', '$uid', '$name', '$descr', '$privacy', '$indicator1', '$indicator2', '$time1', '$interval')";
            }

            if (mysqli_query($conn, $strTable)) {
                echo "<script> alert('Saved ".$name." Successfully!') </script>";
                
                if (mysqli_query($conn, $orderTable))
                {
                    echo "<script> alert('Order Updated Successfully!') </script>";
                } 
                else 
                {
                    echo "Error: " . $orderTable . "<br>".mysqli_error($conn);
                }                
                } else {
                echo "Error: <br>".mysqli_error($conn);
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
            $quantity = $_POST['quantity'];

            if($price==="limit")
            {
                $limit = $_POST['limit'];
                $orderTable = "INSERT INTO orders (id, ticker, side, price, quantity, target, stoploss) VALUES ('$uid', '$ticker', '$side', '$limit', '$quantity' '$target', '$stop')";
            }
            else
            {
                $orderTable = "INSERT INTO orders (id, ticker, side, target, stoploss) VALUES ('$uid', '$ticker', '$side', '$target', '$stop')";
            }

            if($choice==='both')
            {
                $indicator1 = $_POST['indicators1'];
                $indicator2 = $_POST['indicators2'];
                $time1 = $_POST['time1'];
                $time2 = $_POST['time2'];

                $strTable = "INSERT INTO strategies (id, uid, name, descr, privacy, indicator1, indicator2, time1, time2, chart_interval) VALUES ('$uid', '$name', '$descr', '$privacy', '$indicator1', '$indicator2', '$time1', '$time2', '$interval')";
            }

            else
            {
                $indicator1 = $_POST['indicators1'];
                $economic = $_POST['economic'];
                $time1 = $_POST['time1'];

                $strTable = "INSERT INTO strategies (id, uid, name, descr, privacy, indicator1, indicator2, time1, chart_interval) VALUES ('$uid', '$name', '$descr', '$privacy', '$indicator1', '$indicator2', '$time1', '$interval')";
            }

            if (mysqli_query($conn, $strTable)) {
                echo "<script> alert('Saved ".$name." Successfully!') </script>";
                
                if (mysqli_query($conn, $orderTable))
                {
                    echo "<script> alert('Order Updated Successfully!') </script>";
                } 
                else 
                {
                    echo "Error: " . $orderTable . "<br>".mysqli_error($conn);
                }                
                } else {
                echo "Error: <br>".mysqli_error($conn);
                }

        }

    
                mysqli_close($conn);
        }
    else
    {
        echo "<script> alert('Could not save ".$name."')</script>";
    }
?>