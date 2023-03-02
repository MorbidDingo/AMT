<?php
if (isset($_POST['search']))
{
    $t = $_POST['stockname'];
    // include('../home/header.php');
    include('../home/sidebar.html');
?>
    <div class="card" style="overflow-y: auto;";>
        <div class="card-title"><h3><?php echo $t ?></h3></div>
    
<?php

$json = file_get_contents("https://www.alphavantage.co/query?function=OVERVIEW&symbol=$t&apikey=Z9B7UL3A9RJJRWTH");

$data = json_decode($json,true);

$k = array();
$v = array();
$i = 0;

foreach ($data as $key => $val)
{
    $k[$i] = $key;
    $v[$i] = $val;
    $i++;
}
?>


<?php
    $count=0;
    for($j = 0; $j<count($k); $j++)
    {
        $count++;
?>
        <div class="card" style="overflow-y: auto;">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample<?php echo $count;?>" aria-expanded="false" aria-controls="multiCollapseExample<?php echo $count;?>"> <?php echo $k[$j]; ?></button>
        <div class="row">
            <div class="col-12" style="overflow-x:hidden;">
                <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $count;?>" style="background-color: black; overflow-x:hidden;">
                    <div class="card card-body" style="overflow-x:hidden;">
                        <?php echo $v[$j]; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
<?php
    }
}
?>
                </div>
            </div>
        </div>

    </body>
</html>