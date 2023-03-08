
<?php
    session_start();

    include('../login/config.php');
    $uname = $_SESSION['user_name'];
    $uid = $_SESSION['user_id'];
?>

<div class="col-md-10" id='content' style="border-radius: 0px;">
            <div class="card border-0" style="margin-top:0vh; height: 93vh; color: white; background-color: rgb(20, 40, 60); border-radius: 0px; width: 120%;">
                <div class="card-body">
                        <h2 class="card-title border-bottom border-dark" style="text-align: left;" id="panel">My Panel</h2>
                        <h2 class="card-title border-bottom border-dark" style="text-align: right;" id="main"><?php echo $_SESSION['user_id']; ?></h2>

                    
                    <!-- <div class="mt-md-2">&nbsp;</div>
                    <div class="mt-md-2">&nbsp;</div> -->

                    <div class="row">
                        <div class="col-md-10" id="heading-2">
                            <h1 class="display-6 text-start" style="color: whitesmoke; margin-top: 2vh;">My Strategies</h1>
                        </div>

                        <div class="col-md-2" id="heading-2" style="border-left: 0px solid black;">
                           <a href="../Editor/automater.php"><button class="btn btn-primary" id="create-button" style="margin-top: 13%;">Create +</button></a>
                        </div>

                        <!-- Strategies -->
                        
                        <div class="col-md-12" id="main-content" style="overflow-y: auto;">
                            <div class="container-fluid">
                                <div class="row">
                                <?php
                                $count=0;
                                $i = 1;
                            $fetch = "SELECT * FROM strategies where uid='".$uid."';";
                            $strategies = $conn->query($fetch);
                            if($strategies->num_rows > 0) {
                            while($row = $strategies->fetch_assoc())
                            {
                            ?>
                            <div class="col-md-12" id="list-div">
                            
                                <div class="container-fluid">
                                    <div class="row">
                                <div class="col-4">
                                    <h3><?php echo $row['name']; ?></h3>
                                </div>
                                <div class="col-2">
                                </div>
                                <div class="col-1">                                   
                                </div>
                                
                                <div class="col-1" style="margin-top: 1.3rem;">
                                <form action="../Editor/strModify.php" method="post">
                                    <input type="hidden" name="pri" value="<?php echo $row['id']; ?>">
                                    <input type="submit" class="btn btn-success" value="Modify" name="modify"/>
                                </form>
                                </div>

                                <div class="col-4 border-start shadow-lg">
                                    <h1 style="font-size: medium; margin-top: 1.7vh; text-align: center;" class="lead border-bottom"><?php echo $uname; ?></h1>
                                </div>

                                </div>
                                </div>
                                              
                            
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <!-- <div class="text-body border" style=" border-radius: 10px; height: 7vh; margin-top: 1vh;"> -->
                                            <p class="text-bg-light" id="strat-desc" style="height: 80%; width: 95%; border-radius: 10px; overflow-y: auto; overflow-x: auto; font-size: 12px; margin-top: 1em;"><?php echo $row['descr']; ?></p>
                                        <!-- </div> -->
                                        </div>
                                        <div class="col-md-4 border-start">
                                            <div class="row">
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
                                            <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                            
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Some text in the modal.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                                
                                            </div>
                                            </div>


                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                                <?php
                                        }
                                    }
                                else
                                {

                                    echo "No strategies!";

                                }
                                ?>     
                            

                            <!-- <div class="col-md-8" id="list-div">Strategy 1</div>
                            <div class="col-md-4" id="list-div"></div>

                            <div class="col-md-8" id="list-div">Strategy 1</div>
                            <div class="col-md-4" id="list-div"></div>

                            <div class="col-md-8" id="list-div">Strategy 1</div>
                            <div class="col-md-4" id="list-div"></div> -->
    </div>
    
                        </div>
                        
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
            </div>
            
        </div>
          

        <script>
            $(document).ready(function(){
  $('#btnActivation').click(function(){
    if(!$('#btnActivation').hasClass(('btn--activated'))){
         $('#btnActivation').removeClass('btn--activate');
    $('#btnActivation').addClass('btn--waiting');
    setTimeout(function(){
      removeWaiting();
    }, 1400); 
    }

  });
  
  function removeWaiting(){
      $('#btnActivation').removeClass('btn--waiting');
      $('#btnActivation').addClass('btn--activated');
  }
  
});

$('#myModal').modal(options)

        </script>