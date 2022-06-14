<?php
session_start();
if (!isset($_SESSION["username"]))
    header("Location: login.php"); # Change later
else{
  header("Location: productDetail-01.php"); # Change later

}
?>