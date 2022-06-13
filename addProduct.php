<?php   
    include './db/connectdb.php';
    session_start();
    if (isset($_POST['add-to-cart'])){
       
        if (!isset($_SESSION["username"])){
            header("Location: login.php"); # Change later
        }
        $sess_user_id = $_SESSION["id"]; # get user_id
        if (isset($_POST['ID'])){
            $p_id = $_POST['ID'];
        }
        if (isset($_POST['number'])){
            $p_number = $_POST['number'];
        }
        if (isset($_POST['size'])){
            $p_size = $_POST['size'];
        }
        $sql_select = "SELECT * FROM `product_in_cart` WHERE cart_cart_id = '$sess_user_id' and  products_product_id1 = '$p_id' and size = '$p_size' ";
        $result = mysqli_query($conn,$sql_select);
        $row = mysqli_fetch_assoc($result);
        if($row){
          $p_num = $p_number + $row['quantity'];
          $sql = "UPDATE `product_in_cart` SET `quantity`='$p_num' WHERE products_product_id1 = '$p_id' and cart_cart_id = '$sess_user_id' and size = '$p_size';";
          mysqli_query($conn,$sql);
          header("Location: productDetail-02.php?id=$p_id"); # Change later
        }
        else{
          $sql = "INSERT INTO `product_in_cart`(`quantity`, `cart_cart_id`, `products_product_id1`, `size`) VALUES ('$p_number','$sess_user_id','$p_id','$p_size')";
          mysqli_query($conn,$sql);
          header("Location: productDetail-02.php?id=$p_id"); # Change later
        }
       

        
    }

    ?>