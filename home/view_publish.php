<?php
include('../home/head.php');
include('../login/config.php');

if (['stock']!='' && ['view'])
{
    $name = $_POST['stock'];
    $view = $_POST['view'];
    $uid = $_SESSION['user_id'];
    date_default_timezone_set('Asia/Kolkata'); // Set timezone to IST

    $current_time = date('d/m/Y - H:i');

    
    $sql = "INSERT INTO views (time, stock, view, uid)
VALUES ('$current_time', '$name', '$view', '$uid')";

if (mysqli_query($conn, $sql)) {
    ?>
    <div class="card text-bg-dark" style="overflow-y: auto; margin-top: 1%;">
  <h2 class="card-header">Views</h2>
            <?php
            $select = "SELECT * FROM views";
$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    ?>
  <div class="card-body">
    <div class="row">
    <div class="col-md-4" style="border-right: 1px solid white;">
        <div class="card-header">User ID: <?php echo $row['uid']; ?></div>
        <div class="card-header">
        <div class="card-title"><?php echo $row['stock']; ?></div>
        </div>
        <div class="card-text">Date: <?php echo $row['time']; ?></div>
    </div>
    <div class="col-md-8">
    <div class="card-text"><?php echo $row['view']; ?></div>
    </div>
  </div>
  </div>
  <?php
  }}
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
?>