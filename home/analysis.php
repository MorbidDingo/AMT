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

    <style>
        .card-title:hover
        {
            background-color: black;
            color: white;
            transition-duration: 200ms;
        }
    </style>
</head>
<body>
<h2 class="card-title border-bottom border-dark" style="text-align: center;">Analysis</h2>
    <div class="container-fluid">
    <div class="form-container">
        <form action="../data/analysis_results.php" method="post">
            <input type="text" class="form-control" placeholder="Search for stocks" name="stockname" id="stockname"/>
            <input type="submit" class="search" value="Search" name="search" id="sub">
        </form>


            </div>
        </div>
    </div>

        <script>
            $(document).ready(function(){
  
            $("#sub").click(function() {
                var =$("#city").val();
                var country_name=$("#country").val();
                $.ajax({
                url:'ajax.php',
                data:{city:city_name, country:country_name},
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