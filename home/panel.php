
<?php
    session_start();
?>
<div class="col-md-10" id='content' style="border-radius: 0px;">
            <div class="card border-0" style="margin-top:0vh; height: 93vh; color: white; background-color: rgb(20, 40, 60); border-radius: 0px; width: 95.1vw;">
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
                            <button class="btn btn-primary" id="create-button" style="margin-top: 13%;">Create +</button>
                        </div>

                        

                        <div class="col-md-12" id="main-content">
                            <div class="container-fluid">
                                <div class="row">
                            <div class="col-md-10" id="list-div">
                            <?php
                                    include('../login/config.php');
                                    $uname = $_SESSION['user_name'];
                                    $uid = $_SESSION['user_id'];

                                     $fetch = "SELECT * FROM strategies where id='".$uid."';";
                                     $strategies = $conn->query($fetch);
                                     if($strategies->num_rows > 0) {
                                        while($row = $strategies->fetch_assoc())
                                        {

                                ?>
                                <div class="container-fluid">
                                    <div class="row">
                                <div class="col-4">
                                    <h3><?php echo $row['name']; ?></h3>
                                </div>
                                <div class="col-2">
                                    <input type="submit" class="form-control" value="Modify" style="margin-top: 1vh;">
                                </div>
                                <div class="col-2">
                                    <input type="submit" class="form-control" value="Implement" style="margin-top: 1vh;">
                                </div>
                                
                                <div class="col-4 border-start shadow-lg">
                                    <h1 style="font-size: medium; margin-top: 1.7vh; text-align: center;" class="lead border-bottom"><?php echo $uname; ?></h1>
                                </div>
                                </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <div class="text-body border" style=" border-radius: 10px; height: 7vh; margin-top: 1vh;">
                                            <p class="text-bg-light" id="strat-desc" style="height: 7vh; border-radius: 10px; overflow-y: auto;"><?php echo $row['descr']; ?></p>
                                        </div>
                                        </div>
                                        <div class="col-md-4 border-start">
                                            Tags
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2" id="list-div">
                                <div class="container-fluid">
                                    <div class="row" style="margin-top: 1.5vh;">
                                        <div class="col-md-5 border-end border-bottom">
                                            <p style="font: x-small;">Public:</p>
                                        </div>

                                        <div class="col-md-7 border-bottom">
                                            <label class="switch">
                                                <input type="checkbox" value="private" name="privacy_control">                                               
                                                <span class="slider round">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                    <div class="col" style="margin-top: 1.1vh; margin-left: 0.5vw;">
                                                        <p style="font-size: xx-small; color: #CCCCCC;" >Pub</p>
                                                    </div>
                                                    <div class="col">
                                                        <h6 style="font-size: xx-small; color: green; margin-top: 1.39vh; margin-left: -0.8vw;">Pvt</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        
                                        <input type="button" value="Publish" class="form-control-sm" style="margin-left: 3.3vw; margin-top: 12%;">                                        
                                    </div>
                                </div>
                                
                            </div>

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
        <?php
                                        }
                                    }
        ?>