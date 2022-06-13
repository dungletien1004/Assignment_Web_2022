<?php
require_once('config.php');

function execute($sql){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function executeResult($sql){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $resultset = mysqli_query($conn, $sql);
    $list = [];
    while($row = mysqli_fetch_array($resultset, 1)){
        $list[] = $row;
    }
    mysqli_close($conn);
    return $list;
}

function numberResult($sql){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $result = mysqli_query($conn, $sql);
    $number_of_result = mysqli_num_rows($result);
    return $number_of_result;
}