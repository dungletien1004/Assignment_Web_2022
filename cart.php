<?php
session_start();
if (!isset($_SESSION["id"]))
    header("Location: login.php"); # Change later

$sess_user_id = $_SESSION["id"]; # get user_id

require './db/connectdb.php'; # connect to database

$query = "SELECT `size`, `product_image`,`name`, `customerID`, `email`, `fullname`, `username`, `products_product_id1`, `quantity`, `unit_price` FROM (`customer` JOIN `cart` ON 
(`cart`.`cart_id` = `customer`.`cart_cart_id` and `customer`.`customerID` = {$sess_user_id})
 JOIN `product_in_cart` on (`cart`.`cart_id` = `product_in_cart`.`cart_cart_id`)) JOIN `products` ON `products`.`product_id` = `product_in_cart`.`products_product_id1`;";

$query_res = mysqli_query($conn, $query);
if (!$query_res) {
    $message  = 'Invalid query: ' . mysqli_error($conn) . '<br>';
    $message .= 'Whole query: ' . $query;
    die($message);
}

?>

<!doctype html>


<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="./javascript/cart.js" type="text/javascript" async>
    </script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome-4.7.0\font-awesome-4.7.0\css\font-awesome.min.css">
    <link href="./css/cart-table.css" type="text/css" rel="stylesheet">

    <title>Your Cart </title>
</head>

<body>


    <!-- Optional JavaScript; choose one of the two! -->


    <!-- Header here -->


    <div class="mainContent-theme">
        <div id="layout-cart">
            <div class="breadcrumb-shop">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" id="cart-breadcrumb" aria-current="page">Giỏ hàng
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 heading-page">
                        <div class="header-page text-left">
                            <h1> GIỎ HÀNG </h1>
                        </div>
                    </div>

                    <div class="col-md-12 col-xs-12">
                        <div class="cart-container">
                            <div class="main-content-cart" id="main">
                                <form action="/cart" method="post" id="cart-form-page">
                                    <div class="row">
                                        <!-- There are two conditions here : Empty and non-empty cart-->
                                        <div class="col-md-8 col-sm-12 col-xs-12" id="cart-content">
                                            <!-- Cart content goes here-->
                                            <table class="table-cart">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="product">Sản phầm</th>
                                                        <th scope="col" class="qty">Số lượng</th>
                                                        <th scope="col" class="linePrice">Tổng tiền</th>
                                                        <th scope="col" class="remove">Xoá</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $total = 0;
                                                    while ($row = mysqli_fetch_assoc($query_res)) {
                                                        $product_id = (int) $row["customerID"];
                                                        $quantity = (int) $row["quantity"];
                                                        $product_name = $row["name"];
                                                        $product_img = $row["product_image"];
                                                        $unit_price = (int) $row["unit_price"];
                                                        $total_price = $quantity * $unit_price;
                                                        $size = $row["size"];
                                                        $total += $total_price;
                                                    ?>
                                                    <tr data_id="<?php echo $product_id ?>" class="line-item-container">
                                                        <td class="image">
                                                            <div class="product-image">
                                                                <a href="#prodcut_page_here" class="thumb-cart">
                                                                    <img src="<?php echo $product_img ?>"
                                                                        alt="<?php echo $product_name ?>">
                                                                    <h3><?php echo $product_name ?></h3>
                                                                    <span><?php echo $unit_price ?> đ</span>
                                                                </a>

                                                            </div>
                                                            <p class="variant">
                                                                <span class="variant-title">
                                                                    <?php echo $size ?>
                                                                </span>
                                                            </p>

                                                        </td>

                                                        <td class="qty">
                                                            <div class="qty qty-click">
                                                                <button type="button"
                                                                    class="btn btn-light qtyminus qty-btn">-</button>
                                                                <input type="number" size="4" name="updates[]" min="1"
                                                                    id="updates_<?php echo $product_id; ?>">
                                                                <?php echo  $quantity ?>
                                                                </input>
                                                                <button type="button"
                                                                    class="btn btn-light qtyplus qty-btn">+</button>
                                                            </div>
                                                        </td>

                                                        <td class="linePrice">
                                                            <p class="price">
                                                                <span class="line-item-total">
                                                                    <?php
                                                                        echo $total_price;
                                                                        ?> đ
                                                                </span>
                                                            </p>
                                                        </td>

                                                        <td class="remove">
                                                            <a class="cart">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                </tbody>

                                            </table>
                                        </div>

                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center" id="total">
                                            <!-- Cart info goes here, which includes: total price, checkout .....-->
                                            <div class="total-cart">
                                                <p class="order-info">
                                                    Tổng tiền
                                                    <span class="total_price">
                                                        <b>
                                                            <?php
                                                            echo $total;

                                                            ?>
                                                        </b>
                                                    </span>
                                                </p>

                                                <div class="cart-buttons">
                                                    <button type="submit" id="checkout" class="btn btn-dark"
                                                        name="checkout">
                                                        Thanh toán
                                                    </button>
                                                </div>

                                                <div class="checkout-note clearfix">
                                                    <textarea id="note" name="note" placeholder="Ghi chú">

                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->


</body>

</html>