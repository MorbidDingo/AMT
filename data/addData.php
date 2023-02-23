<?php

$conn = new mysqli("localhost", "root", "", "amt");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$i = 0;
$CSVfp = fopen("prices.csv", "r");
if ($CSVfp !== FALSE) {
    print "<PRE>";
    while (! feof($CSVfp)) {
       while($i < feof($CSVfp)) 
       {
        $data = fgetcsv($CSVfp, 800, ";");
        if (! empty($data)) {
            $sql = "UPDATE stocks SET `close` = ('" . $data[$i] . "');";
            $i++;
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }              
        }
    }
}
}

fclose($CSVfp);
?>