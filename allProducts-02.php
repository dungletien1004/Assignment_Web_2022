<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./fontawesome-free-6.1.0-web/css/all.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <title>All Products</title>
        <link rel="stylesheet" href="./css/allProducts-02.css">
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
            <div class="clearfix"></div>
            <div class="header-bottom" onclick="userLeave()">
                <img class="logo-2" src="./images/Logo-02.png" alt="Logo">
            </div>
        </header>
        <div class="clearfix"></div>
        <div class="middle" onclick="userLeave()">
            <div class="middle-left-collum">
                <div class="menu-title">
                    Menu
                </div>
                <hr class="title-hr">
                <div class="menu-container">
                    <div class="menu-item">
                    <?php
                            if(isset($_POST["search-holder"])){
                                $p_text = $_POST["search-holder"];
                                if (strcasecmp($p_text, 'Tất Cả') == 0){
                                    echo
                                    '
                                    <form method="post">
                                        <button type="submit" class="menu-all" name="search-click" style="color: #E70E0E;">
                                            <i class="fa-solid fa-arrow-right-long" id="all-icon" style="display: inline;"></i>
                                            Tất Cả
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Tất Cả">
                                    </form>
                                    <hr class="all-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-shirt" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shirt-icon" style="display: none;"></i>
                                            Áo
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Áo">
                                    </form>
                                    <hr class="shirt-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-pants" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="pants-icon" style="display: none;"></i>
                                            Quần
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Quần">
                                    </form>
                                    <hr class="pants-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shoes" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shoes-icon" style="display: none;"></i>
                                            Giày
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Giày">
                                    </form>
                                    <hr class="shoes-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-bags" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="bags-icon" style="display: none;"></i>
                                            Túi Xách
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Túi Xách">
                                    </form>
                                    <hr class="bags-hr" style="display: none;">
                                    ';
                                }
                                if (strcasecmp($p_text, 'Áo') == 0){
                                    echo
                                    '
                                    <form method="post">
                                        <button type="submit" class="menu-all" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="all-icon" style="display: none;"></i>
                                            Tất Cả
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Tất Cả">
                                    </form>
                                    <hr class="all-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-shirt" name="search-click" style="color: #E70E0E;">
                                            <i class="fa-solid fa-arrow-right-long" id="shirt-icon" style="display: inline;"></i>
                                            Áo
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Áo">
                                    </form>
                                    <hr class="shirt-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-pants" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="pants-icon" style="display: none;"></i>
                                            Quần
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Quần">
                                    </form>
                                    <hr class="pants-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shoes" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shoes-icon" style="display: none;"></i>
                                            Giày
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Giày">
                                    </form>
                                    <hr class="shoes-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-bags" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="bags-icon" style="display: none;"></i>
                                            Túi Xách
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Túi Xách">
                                    </form>
                                    <hr class="bags-hr" style="display: none;">
                                    ';
                                }
                                if (strcasecmp($p_text, 'Quần') == 0){
                                    echo
                                    '
                                    <form method="post">
                                        <button type="submit" class="menu-all" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="all-icon" style="display: none;"></i>
                                            Tất Cả
                                        </button>
                                        <input type="text" class="search-product" name="search-all" value="Tất Cả">
                                    </form>
                                    <hr class="all-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shirt" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shirt-icon" style="display: none;"></i>
                                            Áo
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Áo">
                                    </form>
                                    <hr class="shirt-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-pants" name="search-click" style="color: #E70E0E;">
                                            <i class="fa-solid fa-arrow-right-long" id="pants-icon" style="display: inline;"></i>
                                            Quần
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Quần">
                                    </form>
                                    <hr class="pants-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-shoes" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shoes-icon" style="display: none;"></i>
                                            Giày
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Giày">
                                    </form>
                                    <hr class="shoes-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-bags" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="bags-icon" style="display: none;"></i>
                                            Túi Xách
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Túi Xách">
                                    </form>
                                    <hr class="bags-hr" style="display: none;">
                                    ';
                                }
                                if (strcasecmp($p_text, 'Giày') == 0){
                                    echo
                                    '
                                    <form method="post">
                                        <button type="submit" class="menu-all" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="all-icon" style="display: none;"></i>
                                            Tất Cả
                                        </button>
                                        <input type="text" class="search-product" name="search-all" value="Tất Cả">
                                    </form>
                                    <hr class="all-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shirt" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shirt-icon" style="display: none;"></i>
                                            Áo
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Áo">
                                    </form>
                                    <hr class="shirt-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-pants" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="pants-icon" style="display: none;"></i>
                                            Quần
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Quần">
                                    </form>
                                    <hr class="pants-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-shoes" name="search-click" style="color: #E70E0E;">
                                            <i class="fa-solid fa-arrow-right-long" id="shoes-icon" style="display: inline;"></i>
                                            Giày
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Giày">
                                    </form>
                                    <hr class="shoes-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-bags" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="bags-icon" style="display: none;"></i>
                                            Túi Xách
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Túi Xách">
                                    </form>
                                    <hr class="bags-hr" style="display: none;">
                                    ';
                                }
                                if (strcasecmp($p_text, 'Túi Xách') == 0){
                                    echo
                                    '
                                    <form method="post">
                                        <button type="submit" class="menu-all" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="all-icon" style="display: none;"></i>
                                            Tất Cả
                                        </button>
                                        <input type="text" class="search-product" name="search-all" value="Tất Cả">
                                    </form>
                                    <hr class="all-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shirt" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shirt-icon" style="display: none;"></i>
                                            Áo
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Áo">
                                    </form>
                                    <hr class="shirt-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-pants" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="pants-icon" style="display: none;"></i>
                                            Quần
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Quần">
                                    </form>
                                    <hr class="pants-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shoes" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shoes-icon" style="display: none;"></i>
                                            Giày
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Giày">
                                    </form>
                                    <hr class="shoes-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-bags" name="search-click" style="color: #E70E0E;">
                                            <i class="fa-solid fa-arrow-right-long" id="bags-icon" style="display: inline;"></i>
                                            Túi Xách
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Túi Xách">
                                    </form>
                                    <hr class="bags-hr" style="display: block;">
                                    ';
                                }
                            }
                            else{
                                echo
                                '
                                <form method="post">
                                    <button type="submit" class="menu-all" name="search-click">
                                        <i class="fa-solid fa-arrow-right-long" id="all-icon"></i>
                                        Tất Cả
                                    </button>
                                    <input type="text" class="search-product" name="search-holder" value="Tất Cả">
                                </form>
                                <hr class="all-hr">
                                <form method="post">
                                    <button type="submit" class="menu-shirt" name="search-click">
                                        <i class="fa-solid fa-arrow-right-long" id="shirt-icon"></i>
                                        Áo
                                    </button>
                                    <input type="text" class="search-product" name="search-holder" value="Áo">
                                </form>
                                <hr class="shirt-hr">
                                <form method="post">
                                    <button type="submit" class="menu-pants" name="search-click">
                                        <i class="fa-solid fa-arrow-right-long" id="pants-icon"></i>
                                        Quần
                                    </button>
                                    <input type="text" class="search-product" name="search-holder" value="Quần">
                                </form>
                                <hr class="pants-hr">
                                <form method="post">
                                    <button type="submit" class="menu-shoes" name="search-click">
                                        <i class="fa-solid fa-arrow-right-long" id="shoes-icon"></i>
                                        Giày
                                    </button>
                                    <input type="text" class="search-product" name="search-holder" value="Giày">
                                </form>
                                <hr class="shoes-hr">
                                <form method="post">
                                    <button type="submit" class="menu-bags" name="search-click">
                                        <i class="fa-solid fa-arrow-right-long" id="bags-icon"></i>
                                        Túi Xách
                                    </button>
                                    <input type="text" class="search-product" name="search-holder" value="Túi Xách">
                                </form>
                                <hr class="bags-hr">
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="middle-right-collum">
            <?php
                    require_once('dbhelp.php');
                    if(isset($_POST["search-holder"]) || isset($_GET["search-holder"])){
                        $s_text = '';
                        if (isset($_POST["search-holder"])){
                            $p_text = $_POST["search-holder"];
                        }
                        if (isset($_GET["search-holder"])){
                            $p_text = $_GET["search-holder"];
                        }
                        if (strcasecmp($p_text, 'Tất Cả') != 0) {
                            $sql = 'select * from product where Type like "%'.$p_text.'%" or Name like "%'.$p_text.'%" or Color like "%'.$p_text.'%"
                                    order by CHAR_LENGTH(Name)';
                        }
                        else{
                            $sql = 'select * from product order by CHAR_LENGTH(Name)';
                        }
                    }
                    else{
                        $sql = 'select * from product order by CHAR_LENGTH(Name)';
                    }
                    $productList = executeResult($sql);
                    foreach($productList as $std){
                        if ($std['SoldOut'] == '1'){
                            if (strcasecmp($std['Sale'], '') != 0){
                                echo
                                '<div class="product-item">
                                    <a>
                                        <img class="product-img-out" src="'.'.'.mb_substr($std['Image_1'], 35).'" alt="Product">
                                        <a class="sold-out">SOLD OUT</a>
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
                            else{
                                echo
                                '<div class="product-item">
                                    <a>
                                        <img class="product-img-out" src="'.'.'.mb_substr($std['Image_1'], 35).'" alt="Product">
                                        <a class="sold-out">SOLD OUT</a>
                                        <div class="product-name">'.substr($std['Name'], 0, 15).' / '.$std['Color'].'</div>
                                    </a>
                                    <div class="clearfix"></div>
                                    <div class="product-price">
                                        <span class="present-price">'.$std['OPrice'].'$</span>
                                    </div>
                                </div>
                                ';
                            }
                        }
                        else{
                            if (strcasecmp($std['Sale'], '') != 0){
                                echo
                                '<div class="product-item">
                                    <a onclick=\'window.open("productDetail-02.php?id='.$std['ID'].'","_self")\'>
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
                            else{
                                echo
                                '<div class="product-item">
                                    <a onclick=\'window.open("productDetail-02.php?id='.$std['ID'].'","_self")\'>
                                        <img class="product-img" src="'.'.'.mb_substr($std['Image_1'], 35).'" alt="Product">
                                        <div class="product-name">'.substr($std['Name'], 0, 15).' / '.$std['Color'].'</div>
                                    </a>
                                    <div class="clearfix"></div>
                                    <div class="product-price">
                                        <span class="present-price">'.$std['OPrice'].'$</span>
                                    </div>
                                </div>
                                ';
                            }
                        }
                    }
                ?>
                <div class="clearfix"></div>
                <div class="next-page">
                    <a href="#" class="move"><i class="fa-solid fa-left-long"></i></a>
                    <a href="#" class="move" style="color: #838181;">1</a>
                    <a href="#" class="move">2</a>
                    <a href="#" class="move">3</a>
                    <a href="#" class="move"><i class="fa-solid fa-right-long"></i></a>
                </div>
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
        <script src="./js/allProducts-02.js"></script>
    </body>
</html>