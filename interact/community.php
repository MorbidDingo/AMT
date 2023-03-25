<?php

include("config.php");
$sql = "SELECT id, name, email FROM user_form";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
while( $record = mysqli_fetch_assoc($resultset) ) {
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<style>

body{
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}

.main-body {
    padding: 1%;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 2rem;
}

.card-body {
    flex: 1 1 auto;
    /* min-height: 1px; */
    padding: 3%;
}

.gutters-sm {
    margin-right: -1%;
    margin-left: -1%;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 2%;
    padding-left: 2%;
}
.mb-3, .my-3, .mb-3:hover{
    margin-bottom: 1rem!important;
    
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}


</style>
<body>
        <div class="main-body"  style="overflow-y:auto">
    
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $record['name']; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $record['email']; ?></p>
                      <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
               <?php
                  $view = "SELECT time,view from views where uid='".$record['id']."'";
                  $viewset = mysqli_query($conn, $view) or die("database error:". mysqli_error($conn));			
                  while( $viewrecord = mysqli_fetch_assoc($viewset) ) {
                ?>
                <div class="card">
                  <div class="card-title"><?php echo $viewrecord['time'] ?></div>
                  <div class="card-text"><?php echo $viewrecord['view'] ?></div>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                    <div class="card text-white bg-dark mb-3" style="max-width: 50rem;">
                     <div class="card-header">Header</div>
                     <div class="card-body">
                        <h5 class="card-title">Dark card title</h5>
                        <p class="card-text">Soooooooo</p>
                    </div>

                </div>
                
                </div>

                <div class="card mb-0">
                <div class="card-body">
                    <div class="card text-white bg-dark mb-3" style="max-width: 50rem;">
                     <div class="card-header">Header</div>
                     <div class="card-body">
                        <h5 class="card-title">Dark card title</h5>
                        <p class="card-text">Someeeeee.</p>
                    </div>

                </div>
                
                
                </div>
              </div>

              



            </div>
          </div>

        </div>

<?php 
}
?>







<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
</body>
</html>