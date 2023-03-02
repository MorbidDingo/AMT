<?php
@include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);
    $user_type=$_POST['user_type'];
    $bank=md5($_POST['bank']);

    $_SESSION['user'] = $id;

    // checking whether the user is exits or not (query)
    $select="SELECT*FROM user_form WHERE email='$email' && password='$pass'";

    $result=mysqli_query($conn,$select);

    if($result)
    {
      mkdir('users/'.$_SESSION['user']);
      mkdir('users/'.$_SESSION['user'].'/Strategies');
      // mkdir('users/'.$_SESSION['user'].'/Dummy');
    }

    if(mysqli_num_rows($result)>0){

        $error[]='user already exits!!';
    }else{    

        //if password is not equal to confirm password it will show the popup 
        //if both password match then the data will save in the tabel
        if($pass!=$cpass){
            $error[]='password not matched!!';
        }else{
            $insert="INSERT INTO user_form(id,name,email,password,user_type,bank) VALUES('$id','$name','$email','$pass','$user_type','$bank')";
            mysqli_query($conn,$insert);
            header('location:login_form.php');
        }
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
    <form action="" method ="post">
      <h3>register now</h3>

      <!-- we write php for  having a Account in our website -->
      <?php
      if(isset($error)){
        foreach($error as $error){
            echo'<span class="error-msg">'.$error.'</span>';
        };
      };
      ?>

      <input type="text" name="id" required  autocomplete="off" placeholder="Enter a unique ID"><br>      
      <input type="text" name="name" required  autocomplete="off" placeholder="Enter Your Name"><br>
      <input type="email" name="email" required  autocomplete="off" placeholder="Enter Your Email"><br>
      <input type="password" name="password" required  autocomplete="off" placeholder="Enter Your Password"><br>
      <input type="password" name="cpassword" required  autocomplete="off" placeholder="Confirm Your Password"><br>
      <select name="user_type">
        <option value="bank">Select your Bank</option>
        <option value="icici">ICICI</option>
        <option value="hdfc">HDFC</option>
        <option value="pnb">PNB</option>
        <option value="bob">BOB</option>
        <option value="bom">BOM</option>
        <option value="sbi">SBI</option>
        <option value="kotak">KOTAK</option>
      </select><br>
      <input type="number" name="bank" required  autocomplete="off" placeholder="Enter Your Account number"><br>
      <input type="submit" name="submit" value="Register Now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login Now</a></p>

    


    </form>
     
  </div>
  
</body>
</html>