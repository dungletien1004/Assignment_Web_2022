<?php
    require "../db/db_connect.php";
    $con = connect();
    
    


    $name = $email = $message = $address = $phone = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['name'])) $name = $_POST['name'];
        if (isset($_POST['message'])) $message = $_POST['message'];
        if (isset($_POST['address'])) $address = $_POST['address'];
        if (isset($_POST['phone'])) $phone = $_POST['phone'];
        if (isset($_POST['email'])) $name = $_POST['email'];



        $query = "INSERT INTO contact (`name`, `message`, `address`, `phone`, `email`) 
        VALUES ('$name', '$message', '$address', '$phone', '$email')";
    
        $result = mysqli_query($con, $query);
    
        if ($result)
            echo 'Cảm ơn đã gửi liên hệ!';
        else echo 'Error!';
    }

?>
