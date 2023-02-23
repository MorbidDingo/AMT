<?php
    include('head.php');
    if($_SESSION['user_name']!=NULL)
    {
        include('header.php');
        include('sidebar.html');
        // include('content.php');
        // include('footer.php');
    }
    else
    {
        header('LOCATION: ../login/login_form.php');
    }
?>
