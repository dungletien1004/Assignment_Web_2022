<?php
require_once 'db/connectdb.php';

session_start();

// if (!isset($_SESSION["id"]))
//     header("Location: login.php"); # Change later


// $sess_user_id = $_SESSION["id"]; # get user_id
$sess_user_id = $_SESSION["id"]; # get user_id

function getUserInfo($sess_user_id)
{
    global $conn;
    $query = "SELECT * FROM `customer` WHERE customerID='$sess_user_id'";
    $row = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($row);
}

require './db/connectdb.php'; # connect to database

$query = "SELECT `size`, `Image_1`,`Name`, `customerID`, `email`, `fullname`, `username`, `products_product_id1`, `quantity`, `PPrice` FROM (`customer` JOIN `cart` ON (`cart`.`cart_id` = `customer`.`cart_cart_id` and `customer`.`customerID` = '$sess_user_id') JOIN `product_in_cart` on (`cart`.`cart_id` = `product_in_cart`.`cart_cart_id`)) JOIN `product` ON `product`.`ID` = `product_in_cart`.`products_product_id1`;";

$query_res = mysqli_query($conn, $query);

if (!$query_res) {
    $message  = 'Invalid query: ' . mysqli_error($conn) . '<br>';
    $message .= 'Whole query: ' . $query;
    die($message);
}

$user_info = getUserInfo($sess_user_id);

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Gonna add more here-->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome-4.7.0\font-awesome-4.7.0\css\font-awesome.min.css">
    <link href="./css/cart-table.css" type="text/css" rel="stylesheet">
    <link href="./css/ship-info.css" type="text/css" rel="stylesheet">
    <link href="./css/payment.css" type="text/css" rel="stylesheet">

    <title>Payment</title>
</head>

<body>


    <!-- Optional JavaScript; choose one of the two! -->


    <!-- Header here -->

    <div class="content">
        <div class="container">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="order-summary">
                        <h2 class="visually-hidden"> Thông tin đơn hàng </h2>

                        <div class="order-summary-sections">
                            <!-- Table of order items here -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="main">
                <div class="main-header">
                    <!-- Link here: changed later -->
                    <a href="/_" class="logo">
                        <h1 class="logo-text">BKU <span class=logo-color> Team </span></h1>
                    </a>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/cart.php"> Giỏ hàng </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="ship-info.php">
                                Thông tin giao hàng
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Phương thức thanh toán
                        </li>
                    </ul>
                </div>

                <!-- Form here -->
                <div class="main-content">
                    <div class="step" step="1">
                        <div class="section">

                            <div class="section-header">
                                <h2 class="section-title"> Phương thức vận chuyển </h2>
                            </div>

                            <div class="section-content section-customer-info">
                                <div class="inventory-location-data">
                                    <!-- Hidden input ?? -->
                                </div>
                            </div>

                            <input type="hidden" name="" value="">

                            <div class="section-content">
                                <div class="content-box">
                                    <div class="content-box-row">
                                        <div class="radio-wrapper">
                                            <label class="radio-label" for="shipping-rate">
                                                <div class="radio-input">
                                                    <input class="input-radio" type="radio" id="shipping-rate-id"
                                                        name="shipping-rate-id" checked>
                                                </div>
                                                <span class="radio-label-primary"> Giao hàng tận nơi</span>
                                                <span class="radio-accessory content-box-emphasis"> $10</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-header">
                                <h2 class="section-title"> Phương thức thanh toán </h2>
                            </div>

                            <div class="section-content">
                                <div class="content-box">
                                    <div class="content-box-row">
                                        <div class="radio-wrapper">
                                            <label class="radio-label" for="ship-type-id">
                                                <div class="radio-input">
                                                    <input class="input-radio" type="radio" id="ship-type-id"
                                                        name="ship-type-id" checked>
                                                </div>
                                                <span class="radio-label-primary"> Thanh toán khi giao hàng (COD)
                                                </span>

                                            </label>
                                        </div>
                                    </div>

                                    <div class="content-box-row secondary">
                                        <div class="blank-slate">
                                            Cảm ơn bạn đã tin dùng mua hàng tại BK Team Chúng tôi sẽ sớm liên hệ với bạn
                                            để Xác Nhận Đơn Hàng qua điện thoại trước khi giao hàng!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-footer">
                                <a class="cart-link" href="/ship-info.php"> Quay lại thông tin giao hàng </a>

                                <form id="form-next-step" action="make-payment.php" method="post">
                                    <button class="btn btn-dark next-btn" type="submit" > Hoàn tất đơn hàng </button>
                                </form>
                            </div>
                        </div>



                        <div class="section-content section-customer-info">
                            <div class="inventory-location-data">
                                <!-- Hidden input ?? -->
                            </div>
                        </div>


                    </div>

                    <div class="sidebar-content">
                        <div class="order-summary-section order-summary-section-product-list">
                            <table class="product-table">
                                <thead>
                                    <tr scope="col">
                                        <span class="visually-hidden"> Hình ảnh </span>
                                    </tr>
                                    <tr scope="col">
                                        <span class="visually-hidden"> Mô tả </span>
                                    </tr>
                                    <tr scope="col">
                                        <span class="visually-hidden"> Số lượng </span>
                                    </tr>
                                    <tr scope="col">
                                        <span class="visually-hidden"> Giá </span>
                                    </tr>
                                </thead>

                                <tbody id="summary-body">
                                    <?php
                                    $total = 0;
                                    while ($row = mysqli_fetch_assoc($query_res)) {
                                        $product_id = (int) $row["customerID"];
                                        $quantity = (int) $row["quantity"];
                                        $product_name = $row["Name"];
                                        $product_img = '.'.mb_substr($row['Image_1'], 35);
                                        $unit_price = (int) $row["PPrice"];
                                        $total_price = $quantity * $unit_price;
                                        $size = $row["size"];
                                        $total += $total_price;


                                    ?>

                                    <tr class="product">
                                        <td class="product-image">
                                            <div class="product-thumbnail">
                                                <div class="product-thumbnail-wrapper">
                                                    <img class="product-thumbnail-image"
                                                        alt="<?php echo $product_name; ?>"
                                                        src="<?php echo $product_img; ?>" />
                                                </div>
                                                <span class="product-thumbnail-quantity">
                                                    <?php echo $quantity; ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="product-description-name order-summmary-emphasis">
                                                <?php echo $product_name; ?>
                                            </span>

                                            <span class="product-description-variant order-summary-sm-text">
                                                <?php echo $size; ?>
                                            </span>


                                        </td>

                                        <td class="product-quantity visually-hidden">
                                            <?php echo $quantity; ?>
                                        </td>

                                        <td class="product-price">
                                            <span class="order-summary-emphasis">
                                                <?php echo $total_price; ?>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="discount-field">
                            <form id="form-discount-add" accept-charset="utf-8" method="post">
                                <div class="field-input-wrapper">
                                    <label class="field-label" for="discount-code">Mã giảm giá </label>
                                    <input placeholder="Mã giảm giá" class="field-input" type="text" size="30">
                                    <button type="submit"
                                        class="btn field-input-btn btn-primary btn-default btn-disabled">Sử
                                        dụng</button>

                                </div>
                            </form>
                        </div>

                        <div class="order-summary total-price">
                            <table class="total-line-table">
                                <thead>
                                    <th scope="col">
                                        <span class="visually-hidden"> Mô tả</span>
                                    </th>
                                    <th scope="col">
                                        <span class="visually-hidden"> Giá</span>
                                    </th>
                                </thead>
                                <tbody>
                                    <tr class="total-line total-line-subtotal">
                                        <td class="total-line total-line-name">Tạm tính</td>
                                        <td class="total-line total-line-price">
                                            <span class="order-summary-emphasis" id="subtotal"> <?php echo $total; ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="total-line total-shipping">
                                        <td class="total-line total-line-name"> Phí vận chuyển</td>
                                        <td class="total-line total-line-price">
                                            <span class="order-summary-emphasis" id="ship-price"> 10 </span>
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot class="total-line-table-footer">
                                    <tr class="total-line">
                                        <td class="total-line-name"> Tổng cộng </td>
                                        <td class="total-line-label-total total-line-price">
                                            <span class="currency">$</span>
                                            <span class="payment-due-price" id="total-price">
                                                <?php echo $total + 10; ?>
                                            </span>
                                        </td>
                                    </tr>

                                </tfoot>
                            </table>
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