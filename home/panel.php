
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
                           <a href="../Editor/automater.php"><button class="btn btn-primary" id="create-button" style="margin-top: 13%;">Create +</button></a>
                        </div>

                        

                        <div class="col-md-12" id="main-content">
                            <div class="container-fluid">
                                <div class="row">
                            <div class="col-md-12" id="list-div">
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
                                    <input type="submit" class="form-control" value="Modify" style="margin-top: 1vh; margin-left: -20px;">
                                </div>
                                <div class="col-2">
                                    <style>
                                        .activate{

                                                margin-top: 0.7vh;
                                                text-decoration: none;
                                                line-height: 46px;
                                                padding: 0 30px 0 55px;
                                                position: relative;
                                                text-align: center;
                                                display: inline-block;
                                                background-color: #319bef;
                                                color: #fff;
                                                font-weight: 500;
                                                border-radius: 23px;
                                                font-size: 16px;
                                                transition:  all 0.5s linear;
                                                -o-transition:  all 0.5s linear;
                                                -webkit-transition: all 0.5s linear;
                                                -moz-transition: all 0.5s ease;
                                            overflow: hidden;
                                            }

                                            .btn__icon{
                                                width: 24px;
                                                height: 24px;
                                                background-color: #fff;
                                                border: 0px solid #319bef;
                                                border-radius: 50%;
                                                display: inline-block;
                                                top: 11px;
                                                position: absolute;
                                                left: 20px;


                                            }
                                            .activate .btn__icon:before{
                                                content: '';
                                                left:0px;
                                                top:0px;
                                                position: absolute;
                                                transition:  all 0.3s linear;
                                                -o-transition:  all 0.3s linear;
                                                -webkit-transition: all 0.3s linear;
                                                -moz-transition: all 0.3s ease;
                                            }

                                            .btn--activate .btn__icon:before{
                                                width: 24px;
                                                height: 24px;
                                                background-image: url('data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDI2OC44MzEgMjY4LjgzMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjY4LjgzMSAyNjguODMyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTIyMy4yNTUsODMuNjU5bC04MC03OS45OThjLTQuODgxLTQuODgxLTEyLjc5Ny00Ljg4MS0xNy42NzgsMGwtODAsODBjLTQuODgzLDQuODgyLTQuODgzLDEyLjc5NiwwLDE3LjY3OCAgIGMyLjQzOSwyLjQ0LDUuNjQsMy42NjEsOC44MzksMy42NjFzNi4zOTctMS4yMjEsOC44MzktMy42NjFsNTguNjYxLTU4LjY2MXYyMTMuNjU0YzAsNi45MDMsNS41OTcsMTIuNSwxMi41LDEyLjUgICBjNi45MDEsMCwxMi41LTUuNTk3LDEyLjUtMTIuNVY0Mi42NzdsNTguNjYxLDU4LjY1OWM0Ljg4Myw0Ljg4MSwxMi43OTcsNC44ODEsMTcuNjc4LDAgICBDMjI4LjEzNyw5Ni40NTUsMjI4LjEzNyw4OC41NDEsMjIzLjI1NSw4My42NTl6IiBmaWxsPSIjMzE5YmVmIi8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==');
                                                background-repeat: no-repeat;
                                                background-size: 10px;
                                                background-position-x: center;
                                                background-position-y: center;

                                            }

                                            .activate .btn__icon:after{
                                                content: '';
                                                top: 0px;
                                                left: 0px;
                                                position: absolute;
                                                transition:  all 0.3s linear;
                                                -o-transition:  all 0.3s linear;
                                                -webkit-transition: all 0.3s linear;
                                                -moz-transition: all 0.3s linear;
                                            }

                                            .btn--activate .btn__icon:after{
                                            width: 24px;
                                            height: 24px;
                                            background-image: url('data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDI2IDI2IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyNiAyNiIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CiAgPHBhdGggZD0ibS4zLDE0Yy0wLjItMC4yLTAuMy0wLjUtMC4zLTAuN3MwLjEtMC41IDAuMy0wLjdsMS40LTEuNGMwLjQtMC40IDEtMC40IDEuNCwwbC4xLC4xIDUuNSw1LjljMC4yLDAuMiAwLjUsMC4yIDAuNywwbDEzLjQtMTMuOWgwLjF2LTguODgxNzhlLTE2YzAuNC0wLjQgMS0wLjQgMS40LDBsMS40LDEuNGMwLjQsMC40IDAuNCwxIDAsMS40bDAsMC0xNiwxNi42Yy0wLjIsMC4yLTAuNCwwLjMtMC43LDAuMy0wLjMsMC0wLjUtMC4xLTAuNy0wLjNsLTcuOC04LjQtLjItLjN6IiBmaWxsPSIjMmY4OWQxIi8+Cjwvc3ZnPgo=');
                                                background-repeat: no-repeat;
                                                background-size: 8px;
                                                background-position-x: center;
                                                background-position-y: 34px;
                                            }

                                            .btn--activate:hover{
                                                background-color: #2f89d1;
                                            }

                                            .btn--activate:hover .btn__icon{
                                                border-color: #2f89d1;
                                            }

                                            .btn--activate:hover .btn__icon:before{
                                                background-position-y: -34px;
                                            }

                                            .btn--activate:hover .btn__icon:after{
                                                background-position-y: center;
                                            }

                                            .btn--waiting{
                                            background-color: #2f89d1;
                                            }

                                            .btn--waiting .btn__icon{
                                            background-color: transparent;
                                            }

                                            .btn--waiting .btn__icon:before{
                                            width:20px;
                                            height:20px;
                                            top: 2px;
                                            left: 2px;
                                            border-radius:50%;
                                            background-color:#2f89d1;
                                            z-index: 1;
                                            }

                                            .btn--waiting .btn__icon:after{
                                            width:20px;
                                            height:20px;
                                            top: 0px;
                                            left: 0px;
                                            border-radius:50%;
                                            animation:rotation infinite linear 0.5s;
                                            transition:none;
                                            border-top: 2px solid transparent;
                                            border-left: 2px solid #fff;
                                            border-right: 2px solid transparent;
                                            border-bottom: 2px solid transparent;
                                            z-index: 0;
                                            }


                                            .btn--activated {
                                            background-color: #44cc71;
                                            }

                                            .btn--activated .btn__icon:after{
                                            background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDI2IDI2IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyNiAyNiIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CiAgPHBhdGggZD0ibS4zLDE0Yy0wLjItMC4yLTAuMy0wLjUtMC4zLTAuN3MwLjEtMC41IDAuMy0wLjdsMS40LTEuNGMwLjQtMC40IDEtMC40IDEuNCwwbC4xLC4xIDUuNSw1LjljMC4yLDAuMiAwLjUsMC4yIDAuNywwbDEzLjQtMTMuOWgwLjF2LTguODgxNzhlLTE2YzAuNC0wLjQgMS0wLjQgMS40LDBsMS40LDEuNGMwLjQsMC40IDAuNCwxIDAsMS40bDAsMC0xNiwxNi42Yy0wLjIsMC4yLTAuNCwwLjMtMC43LDAuMy0wLjMsMC0wLjUtMC4xLTAuNy0wLjNsLTcuOC04LjQtLjItLjN6IiBmaWxsPSIjNDRjYzcxIi8+Cjwvc3ZnPgo=);
                                            width: 24px;
                                            height: 24px;
                                            background-size: 10px;
                                            background-repeat: no-repeat;
                                            background-position-x: center;
                                            background-position-y: center;
                                            animation: activated 0.3s linear 1;
                                            }

                                            .btn__text{
                                            position: relative;

                                            }

                                            .btn__text:before{
                                            content: attr(data-after);
                                            position: absolute;
                                            top: -27px;
                                            color: transparent;
                                            z-index: -1;
                                            color: #fff;
                                                    transition:  all 0.2s linear;
                                                -o-transition:  all 0.2s linear;
                                                -webkit-transition: all 0.2s linear;
                                                -moz-transition: all 0.2s linear;
                                            }

                                            .btn__text:after{
                                            content: attr(data-wait);
                                            position: absolute;
                                            color: transparent;
                                            top: 2px;
                                            left: 0;
                                            z-index: -1;
                                            color: #fff;
                                                    transition:  all 0.2s linear;
                                                -o-transition:  all 0.2s linear;
                                                -webkit-transition: all 0.2s linear;
                                                -moz-transition: all 0.2s linear;
                                            }

                                            .btn--waiting .btn__text{
                                            color: transparent;
                                            }

                                            .btn--waiting .btn__text:after{
                                            top: -13px;
                                            z-index: 1;
                                            }

                                            .btn--activated .btn__text:before{
                                            top: -13px;
                                            z-index: 1;
                                            }

                                            .btn--activated .btn__text{
                                            color: transparent;
                                            }

                                            @keyframes rotation {
                                            0% {
                                                transform: rotateZ(0deg);
                                            }
                                            100% {
                                                transform: rotateZ(360deg);
                                            }
                                            }

                                            @keyframes activated {
                                            0% {
                                                background-position-y: 34px;
                                            }
                                            100% {
                                                background-position-y: center;
                                            }
                                            }
                                    </style>
                                <div class="block__cell">
                                    <a href="#" class="activate btn--activate" id="btnActivation">
                                        <span class="btn__icon"></span>
                                        <span class="btn__text" data-wait="Waiting" data-after="Running">Implement</span>
                                    </a>
                                </div>
                                </div>
                                
                                <div class="col-4 border-start shadow-lg">
                                    <h1 style="font-size: medium; margin-top: 1.7vh; text-align: center;" class="lead border-bottom"><?php echo $uname; ?></h1>
                                </div>
                                </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8" style="margin-top: -0.8vh;">
                                        <!-- <div class="text-body border" style=" border-radius: 10px; height: 7vh; margin-top: 1vh;"> -->
                                            <p class="text-bg-light" id="strat-desc" style="height: 80%; width: 95%; border-radius: 10px; overflow-y: auto; overflow-x: auto; font-size: 12px; margin-top: 1.5%;"><?php echo $row['descr']; ?></p>
                                        <!-- </div> -->
                                        </div>
                                        <div class="col-md-4 border-start">
                                            Tags
                                        </div>
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
        </script>
        <?php
                                        }
                                    }
        ?>