<?php

require_once 'db/connectdb.php';

// $id = _SESSION['id'];
$user_id = 0;

$id = $_GET['id'];
$val = $_GET['qty'];
echo $id;
echo $val;
function getCartIDFromUserId($userId)
{
    $q = "SELECT cart_cart_id FROM customer WHERE customerID='$userId'";
    global $conn;
    $query = mysqli_query($conn, $q);
    return $query->fetch_array(MYSQLI_NUM)[0];
}

$cart_id = getCartIDFromUserId($user_id);

$query = "UPDATE product_in_cart
          SET product_in_cart.quantity='$val'
          WHERE product_in_cart.products_product_id1='$id' AND product_in_cart.cart_cart_id='$cart_id'";


mysqli_query($conn, $query);

echo "SUCESSFUL";