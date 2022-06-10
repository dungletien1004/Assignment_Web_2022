<?php
include "../connectdb.php";
global $conn;
if($_POST){
  echo isset($_POST['submit']);
  if($_POST["username"] != ''){
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $bdate = $_POST['bdate'];
    $sql =  "UPDATE `customer` SET `fullname` = '$fullname',`email`= '$email',`phone`='$phone',`gender` = '$gender',`bdate`='$bdate' WHERE username = '$username';";
    mysqli_query($conn,$sql);
    header("Location: ./profile.php");
  }

} 
?>