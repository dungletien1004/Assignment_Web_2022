<?php
    require_once('dbhelp.php');
    if(!empty($_POST['confirmDelete'])){
        $p_ID = '';
        if (isset($_POST['ID'])) {
            $p_ID = $_POST['ID'];
        }
        if ($p_ID != '') {
            $sql = "delete from product where ID = '$p_ID'";
        }
        execute($sql);
        echo '<script type="text/javascript">alert("Xóa sản phẩm thành công!");',
			 'window.location = "allProducts-03.php";',
			 '</script>';
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
        <title>Manage Products</title>
        <link rel="stylesheet" href="./css/allProducts-03.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- JQUERY CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
        
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/base.css">
    </head>
    <body>
        <!-- <header>
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
                    <li><a href="allProducts-03.php" id="product-link">Sản phẩm</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="addNewProduct.php">Thêm sản phẩm</a></li>
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
        </header> -->
        <!-- HEADER -->
        <?php include 'components/header.php' ?>
        <div class="clearfix" style="margin: 40px;"></div>
            <div class="header-bottom" onclick="userLeave()">
                <img class="logo-2" src="./images/Logo-02.png" alt="Logo">
            </div>
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
                    $sql1 = 'select * from product order by CHAR_LENGTH(Name)';
                    $productPerPage = 8;
                    $totalProduct = numberResult($sql1);
                    $totalPage = ceil($totalProduct/$productPerPage);
                    $currentPage = !empty($_GET['page'])?$_GET['page']:1;
                    $offset = ($currentPage - 1) * $productPerPage;
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
                                    order by CHAR_LENGTH(Name) LIMIT '.$productPerPage.' OFFSET '.$offset.'';
                        }
                        else{
                            $sql = 'select * from product order by CHAR_LENGTH(Name) LIMIT '.$productPerPage.' OFFSET '.$offset.'';
                        }
                    }
                    else{
                        $sql = 'select * from product order by CHAR_LENGTH(Name) LIMIT '.$productPerPage.' OFFSET '.$offset.'';
                    }
                    $productList = executeResult($sql);
                    foreach($productList as $std){
                        if (strcasecmp($std['Sale'], '') != 0){
                            $ID = $std['ID'];
                            echo
                            '<div class="product-item">
                                <a>
                                    <img class="product-img" src="'.'.'.mb_substr($std['Image_1'], 35).'" alt="Product">
                                    <a class="edit" onclick=\'window.open("editProductDetail.php?id='.$std['ID'].'","_self")\'>Chỉnh Sửa</a>
                                    <br>
                                    <a class="delete" onclick="openConfirmDelete('.$std['ID'].')">Xóa</a>
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
                            $ID = $std['ID'];
                            echo
                            '<div class="product-item">
                                <a>
                                    <img class="product-img" src="'.'.'.mb_substr($std['Image_1'], 35).'" alt="Product">
                                    <a class="edit" onclick=\'window.open("editProductDetail.php?id='.$std['ID'].'","_self")\'>Chỉnh Sửa</a>
                                    <br>
                                    <a class="delete" onclick="openConfirmDelete('.$std['ID'].')">Xóa</a>
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
                ?>
                <div class="clearfix"></div>
                <div class="next-page">
                    <?php
                        if ($currentPage != 1){
                            $previousPage = $currentPage - 1;
                            echo
                            '<a href="allProducts-03.php?page='.$previousPage.'" class="move"><i class="fa-solid fa-left-long"></i></a>';
                        }
                        for ($i = 1; $i <= $totalPage; $i++){
                            if ($i != $currentPage){
                                echo
                                '<a href="allProducts-03.php?page='.$i.'" class="move">'.$i.'</a>';
                            }
                            else{
                                echo
                                '<a href="allProducts-03.php?page='.$i.'" class="move" style="color: #838181;">'.$i.'</a>';
                            }
                        }
                        if ($currentPage != $totalPage){
                            $nextPage = $currentPage + 1;
                            echo
                            '<a href="allProducts-03.php?page='.$nextPage.'" class="move"><i class="fa-solid fa-right-long"></i></a>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="confirm-delete-modal">
            <div id="confirm-delete-container">
                <h2 class="confirm-delete-title">
                    Bạn có muốn xóa sản phẩm này không?
                </h2>
                <div class="confirm-delete-btn">
                    <form enctype="multipart/form-data" method="post">
                        <input class="cancle-delete" onclick="closeConfirmDelete()" value="Hủy">
                        <input type="number" class="product-ID" name="ID" value="">
                        <input type="submit" class="confirm-delete" name="confirmDelete" value="Xác nhận">
                    </form>
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
        <script src="./js/allProducts-03.js"></script>
    </body>
</html>