<?php

$stocks = array();

$i = 0;
$fh = fopen('data/allStocks.txt','r');

while ($stocks[$i] = fgets($fh)) 
{
//   $stocks[$i] = $line;
    $i+=1;
//   echo $stocks[$i]
    //echo $stocks[$i] . "\n";
}
fclose($fh);

$apiKey = 'Z9B7UL3A9RJJRWTH';
$symbol = 'A'; // replace with the stock symbol you want to get data for

for($j = 0; $j < sizeof($stocks)-10000; $j++) 
{
    $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=AAPL&apikey=$apiKey";
    $data = file_get_contents($url);
    $data = json_decode($data, true);

    if ($data && isset($data['Global Quote'])) {
        $globalQuote = $data['Global Quote'];
        $symbol = $globalQuote['01. symbol'];
        $price = $globalQuote['05. price'];
        $change = $globalQuote['09. change'];
        $percentChange = $globalQuote['10. change percent'];
    
        echo "Symbol: $symbol\n";
        echo "Price: $price\n";
        echo "Change: $change\n";
        echo "Percent Change: $percentChange\n";
    
        //   $json = file_get_contents("https://www.alphavantage.co/query?function=TIME_SERIES_MONTHLY_ADJUSTED&symbol=IBM&apikey=$apiKey");
    
        //     $data = json_decode($json,true);
    
        //     print_r($data);
    
        } else {
        echo "Failed to get data for $symbol\n";
        }
}


// while($i!=5)
// {
   

//     // // replace the "demo" apikey below with your own key from https://www.alphavantage.co/support/#api-key
//     // $json = file_get_contents('https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=tesco&apikey=demo');

//     // $data = json_decode($json,true);

//     // print_r($data);

//     // exit;

    

//     $i++;
// }
?>