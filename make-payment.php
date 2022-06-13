<?php
require_once 'db/connectdb.php';

session_start();

// if (!isset($_SESSION["id"]))
//     header("Location: login.php"); # Change later


// $sess_user_id = $_SESSION["id"]; # get user_id
    header("Location: home.php"); # Change later
