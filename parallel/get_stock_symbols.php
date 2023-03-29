<?php
// Execute the SQL query to retrieve stock symbols


// Check for query errors


// Fetch the results as an array of stock symbols
function get_stock_symbols(){
    include('../login/config.php');
    $symbols = array();
    $result = mysqli_query($conn, "SELECT ticker FROM stocks");
    while ($row = mysqli_fetch_assoc($result)) {
    $symbols[] = $row['symbol'];

    if (!$result) {
        echo "Error executing query: " . mysqli_error($conn);
        exit();
        }
    }
    return $symbols;
}


// Close the database connection


// Use the $symbols array to fetch stock prices from the Yahoo Finance API
// ... rest of the code here ...
?>