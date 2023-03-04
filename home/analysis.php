<?php
    include('../login/config.php');
    include('../home/head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

</head>
<body>
<h2 class="card-title border-bottom border-dark" style="text-align: center;">Analysis</h2>
<div class="container-fluid">
    <div class="form-container">
        <div class="row d-flex justify-content-center">
        <!-- <form action="../data/analysis_results.php" method="post"> -->
            <div class="col-5">
                <input type="text" class="form-control" placeholder="Search for stocks" name="stockname" id="stockname"/>
            </div>
            <div class="col-2">
                <input type="submit" class="form-control" value="Search" name="sub" id="sub">
            </div>
        <!-- </form> -->
        </div>
    </div>
    <div class="row" id="result"></div>
</div>

        <script>
            $(document).ready(function(){
  
            $("#sub").click(function() {
                var stockname=$("#stockname").val();
                $.ajax({
                url:'../data/analysis_results.php',
                data:{stockname: stockname},
                type:'POST',
                success:function(data) {
                    $("#result").html(data);
                }
                });
            });
        });
        </script>

    </body>
</html>