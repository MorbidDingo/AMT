<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="sidebar" style="background-color: black; color: black; border: 0px solid black; border-top: 0px solid white; height: 88vh"> 
            <!-- <div class="row align-items-top bg-light text-light" -->
            <!-- style="min-height: 100%; text-align: center;"> -->
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <button class="btn btn-dark" type="submit" name="panel" active id="side-buttons" style="margin-top: 2.5vh;">My Panel</button>
                <button class="btn btn-dark" type="submit" name="trade"  id="side-buttons">Trade</button>
                <button class="btn btn-dark" type="submit" name="analysis"  id="side-buttons">Analysis</button>
                <button class="btn btn-dark" type="submit" name="community"  id="side-buttons">Community</button>
                <button class="btn btn-dark" type="submit" name="amt"  id="side-buttons">AMT Account</button>
                <button class="btn btn-dark" type="submit" name="help"  id="side-buttons">Help</button>
            </form>

                <div class="card" id="current" style="margin-top: 23vh;">
                        <div class="card-title border-bottom-1">Ongoing Trades
                            <div class="container-fluid float-md-start">
                                    <div class="col-md-12 border" id="ongoing-strategies" style="margin-top: 0.5vh">
                                        <p>Strategy</p>
                                </div>
                            </div>
                        </div>
                </div>

            <!-- </div>         -->
        </div>