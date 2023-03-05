<?php

    if(isset($_POST['destroy']))
    {
        session_destroy();
        header('LOCATION: ../login/login_form.php');
    }
?>