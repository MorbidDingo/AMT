<?php
    // For getting all the names
   $namefile= file_get_contents("names.txt");
   $names = explode("\n",$namefile);

   //for getting all the tickers
   $tickerfile = file_get_contents("tickers.txt");
   $tickers  = explode("\n",$tickerfile);

   $q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($names as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>