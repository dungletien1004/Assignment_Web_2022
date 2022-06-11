<?php

session_start();

// $sess_user_id = $_SESSION['id'];
include_once 'db/connectdb.php';
$user_id =  0;

$address = $_GET["address"];

$query = "UPDATE customer 
          SET address='$address'
          WHERE customerID='$user_id'";

mysqli_query($conn, $query);