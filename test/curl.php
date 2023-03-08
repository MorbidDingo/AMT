<?php
function getContents($thisURL) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_URL, $thisURL);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}

echo getContents("https://query1.finance.yahoo.com/v8/finance/chart/AAPL?region=US&lang=en-US&includePrePost=false&interval=1m&useYfid=true&range=1d");
?>