<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funds</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../funds/smriti.css">
    <link rel="stylesheet" type="text/css" href="css/navbar5.css">
    <link rel="stylesheet" type="text/css" href="css/footer5.css">    
    <style type="text/css">
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
      }
    </style>
</head>



<body style="background-color : #ececec;">
<?php
    
    include('../home/head.php');
    include('../home/header.php');
    $name = $_SESSION['user_name'];
    $sql = "SELECT * FROM user_form where name = '$name'";
    $result = mysqli_query($conn,$sql);
?>

<?php
//   include 'navbar.php';
?>

<div class="container">
        <h2 class="text-center pt-4" style="color : ##004AAD;">Transfer Money</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered table-dark" style="border-color:white;">
                        <thead style="color : white;">
                            <tr>
                            <th scope="col" class="text-center py-2">Sr No.</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">Balance</th>
                            <th scope="col" class="text-center py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    $cnt=1;
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : white;">
                        <td class="py-2"><?php echo $rows['id']?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2">Rs. <?php echo $rows['balance']?> /-</td>
                        <td><a href="add_money.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn" style="background-color : #e6b31a;" style="border-radius:0%;">ADD MONEY</button></a></td> 
                    </tr>
                <?php
                $cnt=$cnt+1;
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
         <?php
//   include 'footer.php';
?>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>