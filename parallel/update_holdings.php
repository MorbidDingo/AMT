<?php
    include('../home/head.php');
    include('../login/config.php');
    
    // session_start();
    $uid = $_SESSION['user_id'];

    $ticker = '';

    // $apis = Array();
    // $i = 0;

    // $apis = ['KDO3T9VUTSBFZ95I','Z9B7UL3A9RJJRWTH','H2L0FSX173Z8UGLH', '8OPGJ66I9KZJ0138','5Y6IMVRFWYOYC33K'];
    // $count = 0;
?>

<table>
<tr>
	<th>Ticker</th>
	<th>Quantity</th>
	<th>Price</th>
	<th>Profit/Loss</th>
    <th>&nbsp</th>
</tr>
<?php
$hold = "SELECT * FROM holdings WHERE id = $uid";
$holdresult = mysqli_query($conn, $hold);

if (mysqli_num_rows($holdresult) > 0) {
    // output data of each row
    while ($rec = mysqli_fetch_assoc($holdresult)) {
        $stock = "SELECT * FROM stocks WHERE ticker = '".$rec['ticker']."'";
        $stockresult = mysqli_query($conn, $stock);

        if (mysqli_num_rows($stockresult) > 0) {
            // output data of each row
            while ($rec1 = mysqli_fetch_assoc($stockresult)) {
                $profit_loss = ($rec1['close'] - $rec['avg_price']) * $rec['quantity'];
                $total = $rec1['close']*$rec['quantity'];
                $color = $profit_loss < 0 ? 'text-danger' : 'text-success';
?>

                <tr>
                    <td><?php echo $rec['ticker']; ?></td>
                    <td><?php echo $rec['quantity']; ?></td>
                    <td><?php echo $rec['avg_price']; ?></td>
                    <td class="<?php echo $color; ?>"><?php echo $profit_loss; ?></td>
                    <td>
                        <form action="square.php" method="post">
                            <input type="hidden" name="ticker" value="<?php echo $rec['ticker']; ?>" />
                            <input type="hidden" name="pl" value="<?php echo $profit_loss; ?>" />
                            <input type="hidden" name="bal" value="<?php echo $total; ?>" />
                            <input type="submit" class="btn btn-danger" value="Sell" name="square" />
                        </form>
                    </td>
                </tr>
        <?php
            }
        }
    }
} else {
    echo "<tr><td colspan='5'>You have no holdings</td></tr>";
}
?>

<tbody>
	<!-- display user's orders here -->
</tbody>
</table>
