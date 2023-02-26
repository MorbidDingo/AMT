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
    $select="SELECT*FROM user_form WHERE id='$id'";
  

    $result=mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($result);

    $res=$row['id'];

    if($res == $id)
    {

          $query = "UPDATE user_form SET name='$name',email='$email',password='$pass',user_type='$user_type', bank='$bank' where id='$id' ";

            // $insert="INSERT INTO user_form(id,name,email,password,user_type,bank) VALUES('$id','$name','$email','$pass','$user_type','$bank')";
           $result2=mysqli_query($conn,$query);
            
        }
    
};
?>







<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>



<div class="main">
    <!-- cards -->
    <br><br>
<div class="card text-center text-white bg-dark mb-3 mx-auto"  style="width: 50%;">
  <div class="card-header">
    Update Info
  </div>

  <div class="card-body">
  <div class="form-container">
    <form action="" method ="post">


<input type="text" name="id" required   autocomplete="off" placeholder="Enter a unique ID"><br>      
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
      <input type="submit" name="submit" value="Update" class="form-btn">
      


    </form>
  
  </div>

  </div>

</div>
 

</div>


<div class="main">
    <!-- cards -->
    <br><br>
<div class="card text-center text-white bg-dark mb-3 mx-auto"  style="width: 50%;">
  <div class="card-header">
    Update Info
  </div>

  <div class="card-body">
  <div class="form-container">
    <form action="" method ="post">


<input type="text" name="id" required   autocomplete="off" placeholder="Enter a unique ID"><br>      
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
      <input type="submit" name="submit" value="Update" class="form-btn">
      


    </form>
  
  </div>

  </div>

</div>
 

</div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
</body>
</html> 
