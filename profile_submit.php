<?php
include "./db/connectdb.php";
global $conn;
if($_POST){
  if($_POST["username"] != ''){
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $bdate = $_POST['bdate'];
    $avtpath = basename($_FILES['profileImage']['name']);
    $target_dir = "img/avt/";
    $target_file = $target_dir . $avtpath;
    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["profileImage"]["name"])). " has been uploaded.";
    } else {
      $target_file = "img/avt/avt";
    }
    $sql =  "UPDATE `customer` SET `fullname` = '$fullname',`email`= '$email',`phone`='$phone',`gender` = '$gender',`bdate`='$bdate', `avt` = '$target_file' WHERE username = '$username';";
    mysqli_query($conn,$sql);
    header("Location: ./profile.php");
  }

} 
?>