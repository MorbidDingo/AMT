<?php
@include 'config.php';
session_start();

$id = 0;

if(isset($_POST['submit'])){
   
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
   

    // checking whether the user is exits or not (query)
    $select="SELECT*FROM user_form WHERE email='$email' && password='$pass'";

    $result=mysqli_query($conn,$select);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        if($row['user_type']== 'admin'){
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin_page.php');

        }elseif($row['user_type']== 'user'){

            //$_SESSION['user_name'] = $row['name'];
            $_SESSION['user_id'] = $row['id'];
            $id = $_SESSION['user_id'];
            $_SESSION['user_name'] = $row['name'];
            //echo($id);
            header('location:../home/index.php');            
        }
    }else{
        $error[]='incorrect email or password!!';
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
   <!-- link to the css file -->
   <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="form-container">
    <form action="" method="post">
      <h3>login now</h3>
       <!-- we write php for having a Account in our website -->
       <?php
      if(isset($error)){
        foreach($error as $error){
            echo'<span class="error-msg">'.$error.'</span>';
        };
      };
      ?>
      
      <input type="email" name="email" required autocomplete="off" placeholder="Enter Your Email"><br>
      <input type="password" name="password" required autocomplete="off" placeholder="Enter Your Password"><br>
      <input type="submit" name="submit" value="login Now" class="form-btn"><br>
      <p>Don't have an account? <a href="register_form.php">Register Now</a></p>

    


    </form>
     
  </div>
  
</body>
</html>