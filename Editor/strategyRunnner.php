<?php
    if(isset($_POST['save']))
    {
        $name = $_POST['name'];
        $descr = $_POST['descr'];
        $privacy = $_POST['privacy'];
        $exchange = $_POST['exchange'];
        $ticker = $_POST['ticker'];
        $indicators1 = $_POST['indicators1'];
        $indicators2 = $_POST['indicators2'];
        $interval = $_POST['interval'];
        $economic1 = $_POST['economic1'];
        $economic2 = $_POST['economic2'];
        $time = $_POST['interval'];

        echo $indicators;
        // echo $interval;
        echo $economic;
        echo $time;

        $apikey =  'Z9B7UL3A9RJJRWTH';

            $ecojson1 = file_get_contents("https://www.alphavantage.co/query?function=$economic1&interval=annual&apikey=$apikey");


            $ecodata1 = json_decode($ecojson,true);
            echo "Economic Indicator";
            $e = count($ecodata)-1;
            $onlyData = $ecodata['data'];

            foreach($onlyData as $key => $value)
            {
                print_r('Key: '.$key);
                foreach($value as $v=>$n)
                {
                    // print_r('Key: '.$v);
                    // print_r('Value: '.$n);

                    $ids = array_column($onlyData, $n);
                    print_r($ids);
                }
                // print_r('Value: '.$value);
                echo "<br/>";
            }        

?>
            <br>
            <br>
<?php
            $indijson = file_get_contents("https://www.alphavantage.co/query?function=$indicators&symbol=$ticker&interval=$interval&time_period=$time&series_type=close&apikey=$apikey");
            $indidata = json_decode($indijson,true);
            $arr = Array();
            $arr = $indidata["Technical Analysis: $indicators"];
            $date = date("Y-m-d",strtotime("yesterday"));
            $ta = $arr[$date];

            foreach($ta as $t => $a)
                print_r($a);
            
        
            exit;

   
}
?>