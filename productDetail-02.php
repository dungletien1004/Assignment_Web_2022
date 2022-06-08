<?php
    require_once('dbhelp.php');
    $p_id = '';
    if (isset($_GET['id'])){
        $p_id = $_GET['id'];
        $sql = "select * from product where ID = '$p_id'";
        $productList = executeResult($sql);
        if ($productList != NULL){
            $std = $productList[0];
            $p_ID = $std['ID'];
            $p_name = $std['Name'];
            $p_code = $std['Code'];
            $p_color = $std['Color'];
            $p_image1 = '.'.mb_substr($std['Image_1'], 35);
            $p_image2 = '.'.mb_substr($std['Image_2'], 35);
            $p_price = $std['OPrice'];
            $p_dprice = $std['PPrice'];
            $p_dpercent = $std['Sale'];
            $p_soldout = $std['SoldOut'];
            $p_mout = $std['MOut'];
            $p_lout = $std['LOut'];
            $p_xlout = $std['XLOut'];
            $p_decription = $std['Decription'];
        }
        $p_dpercent = (string)(floor(100 - (float)$p_dpercent));
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./fontawesome-free-6.1.0-web/css/all.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <title>Products Detail</title>
        <link rel="stylesheet" href="./css/productDetail-02.css">
    </head>
    <body>
        <header>
            <div class="header-top">
                <a href="#">
                    <img class="logo-1" src="./images/Logo-03.png" alt="Logo"> 
                </a>
                <div class="search-container" onclick="userLeave()">
                    <form method="post">
                        <button type="submit" class="search-icon" name="search-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>   
                        </button>
                        <input type="search" class="search-bar" name="search-holder" placeholder="Tìm kiếm" size="50">
                    </form>
                </div>
                <ul class="header-nav" onclick="userLeave()">
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="allProducts-02.php" id="product-link">Sản phẩm</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Giỏ hàng</a></li>
                </ul>
                <div class="user-menu">
                    <div class="user-icon" onclick="userHover()">
                        <i class="fa-solid fa-user-large"></i>
                    </div>
                    <div class="user-dropdown-menu">
                        <a href="#" class="user-info">Tài khoản của tôi</a>
                        <form method="post" action="">
                            <button class="logout">Đăng Xuất</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <div class="clearfix"></div>
        <div class="middle" onclick="userLeave()">
        <div class="middle-top">
                <div class="middle-left-collum">
                    <img class="product-master-img" src="<?php echo $p_image1 ?>" alt="Product">
                    <img class="product-slave-img" id="product-slave-img-01" src="<?php echo $p_image1 ?>" alt="Product" onclick="changeImg1()" onload="changeImg1()">
                    <img class="product-slave-img" id="product-slave-img-02" src="<?php echo $p_image2 ?>" alt="Product" onclick="changeImg2()">
                </div>
                <div class="middle-right-collum">
                    <div class="product-detail-name"><?php echo $p_name ?> / <?php echo $p_color ?></div>
                    <div class="product-detail-code"><?php echo $p_code ?></div>
                    <hr class="info-hr">
                    <div class="price-container">
                        <span class="price-decrease-pecent"><?php echo $p_dpercent ?>%</span>
                        <span class="price-decrease"><?php echo $p_dprice ?>$</span>
                        <span class="product-detail-price"><?php echo $p_price ?>$</span>
                    </div>
                    <hr class="info-hr">
                    <div class="size-container">
                        <div class="m-size" onclick="mSize()">M</div>
                        <div class="l-size" onclick="lSize()">L</div>
                        <div class="xl-size" onclick="xlSize()">XL</div>
                    </div>
                    <hr class="info-hr">
                    <form method="post">
                        <div class="number-container">
                            <span class="minus" onclick="decreaseNumber()"><i class="fa-solid fa-minus"></i></span>
                            <input id="number" name="number" value="1" size="2">
                            <span class="plus" onclick="increaseNumber()"><i class="fa-solid fa-plus"></i></span>
                        </div>
                        <hr class="info-hr">
                        <input type="number" id="product-id" name="ID" value="">
                        <input type="text" id="product-size" name="size" value="M">
                        <button class="add-to-cart">Thêm Vào Giỏ Hàng</button>
                    </form>
                    <div class="product-detail-decription">
                        Mô tả
                        <br>
                        <p class="product-decription" cols="70" rows="7"><?php echo $p_decription ?></p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="middle-bottom">
                <h1 class="middle-bottom-title">SẢN PHẨM LIÊN QUAN</h1>
                <?php
                    require_once('dbhelp.php');
                    if(isset($_POST["search-click"])){
                        $s_text = '';
                        if (isset($_POST["search-holder"])){
                            $p_text = $_POST["search-holder"];
                        }
                        if ($p_text != '') {
                            $sql = 'select * from product where Type like "%'.$p_text.'%" or Name like "%'.$p_text.'%" or Color like "%'.$p_text.'%"
                                    order by CHAR_LENGTH(Name)';
                        }
                    }
                    else{
                        $sql = 'select * from product order by CHAR_LENGTH(Name)';
                    }
                    $productList = executeResult($sql);
                    for($i = 0; $i < 8; $i++){
                        $std = $productList[$i];
                        echo
                        '<div class="product-item">
                            <a onclick=\'window.open("productDetail-01.php?id='.$std['ID'].'","_self")\'>
                                <img class="product-img" src="'.'.'.mb_substr($std['Image_1'], 35).'" alt="Product">
                                <div class="product-name">'.substr($std['Name'], 0, 15).' / '.$std['Color'].'</div>
                            </a>
                            <div class="clearfix"></div>
                            <div class="product-price">
                                <span class="old-price"><del>'.$std['OPrice'].'$</del></span>
                                <span class="present-price">'.$std['PPrice'].'$</span>
                            </div>
                            <div class="sale-container">
                                <div id="sale">Sale!</div>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <footer onclick="userLeave()">
            <div class="footer-collum-1">
                <img class="logo-3" src="./images/Logo-04.png" alt="Logo">
                <div class="contact-item">
                    <i class="fa-solid fa-phone"></i>
                    123.456.7890
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-envelope"></i>
                    abc@gmail.com
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-location-dot"></i>
                    123 Trần Phú, Bến Nghé, Quận 1, TP.HCM
                </div>
            </div>
            <div class="footer-collum-2">
                <h3 class="title">
                    Chăm sóc khách hàng
                </h3>
                <ul class="care-item">
                    <li><a href="#">Hướng dẫn mua hàng</a></li>
                    <li><a href="#">Thanh toán</a></li>
                    <li><a href="#">Vận chuyển</a></li>
                    <li><a href="#">Chính sách hoàn tiền</a></li>
                </ul>
            </div>
            <div class="footer-collum-3">
                <h3 class="title">
                    Dịch vụ
                </h3>
                <ul class="care-item">
                    <li><a href="#">Khuyến mãi</a></li>
                    <li><a href="#">Đăng ký thành viên</a></li>
                    <li><a href="#">Giảm giá</a></li>
                    <li><a href="#">Giao hàng tận nơi</a></li>
                </ul>
            </div>
            <div class="footer-collum-4">
                <h3 class="title-1">
                    Tải ứng dụng
                </h3>
                <img class="qr-code" src="./images/QRcode.png" alt="QRcode">
            </div>
            <div class="clearfix"></div>
            <div class="footer-bottom">
                <a href="#" class="social-item"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="social-item"><i class="fa-brands fa-facebook-messenger"></i></a>
                <a href="#" class="social-item"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-item"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="social-item"><i class="fa-brands fa-telegram"></i></a>
                <hr class="footer-hr" color="red">
                <h3 class="footer-bottom-title">All right reserved</h3>
            </div>
        </footer>
        <script src="./js/productDetail-02.js"></script>
    </body>
</html>