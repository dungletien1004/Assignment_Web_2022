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
            $p_image2 = $std['Image_2'];
            $p_price = $std['OPrice'];
            $p_dprice = $std['PPrice'];
            $p_dpercent = $std['Sale'];
            $p_soldout = $std['SoldOut'];
            $p_mout = $std['MOut'];
            $p_lout = $std['LOut'];
            $p_xlout = $std['XLOut'];
            $p_decription = $std['Decription'];
            $p_type = $std['Type'];
        }
        if (strcasecmp($p_image2, '') != 0){
            $p_image2 = '.'.mb_substr($std['Image_2'], 35);
        }
        $p_dpercent = (string)(ceil(100 - (float)$p_dpercent));
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
        <title>Edit Products Detail</title>
        <link rel="stylesheet" href="./css/editProductDetail.css">
    </head>
    <body>
        <header onclick="editLeave()">
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
                    <img class="product-master-img" src="<?php echo $p_image1 ?>" alt="Product" onclick="editLeave()">
                    <?php
                        if (strcasecmp($p_image2, '') != 0){
                            echo
                            '
                            <img class="product-slave-img" id="product-slave-img-01" src="'.$p_image1.'" alt="Product" onclick="changeImg1()" onload="changeImg1()" onclick="editLeave()">
                            <img class="product-slave-img" id="product-slave-img-02" src="'.$p_image2.'" alt="Product" onclick="changeImg2()" onclick="editLeave()">
                            ';
                        }
                        else{
                            echo
                            '
                            <img class="product-slave-img" id="product-slave-img-01" src="'.$p_image1.'" alt="Product" onclick="editLeave()">
                            ';
                        }
                    ?>
                    <div class="edit-container">
                        <i class="fa-solid fa-ellipsis-vertical" id="edit-sysbol" onclick="editHover()"></i>
                        <div class="edit-dropdown-menu">
                            <a class="delete" onclick="openConfirmDelete()">Xóa</a>
                            <a class="edit" onclick="openChangeImg()">Thay đổi</a>
                        </div>
                    </div>
                </div>
                <div class="middle-right-collum" onclick="editLeave()">
                    <form method="post">
                        <input type="number" class="product-ID" name="ID" value="<?=$p_ID?>">
                        <label class="product-label" for="product-name">Tên sản phẩm:</label>
                        <input type="text" class="product-input" id="product-name" name="product-name" value="<?php echo $p_name ?>">
                        <hr class="info-hr">
                        <label class="product-label" for="product-code">Mã sản phẩm:</label>
                        <input type="text" class="product-input" id="product-code" name="product-code" value="<?php echo $p_code ?>">
                        <hr class="info-hr">
                        <label class="product-label" for="product-color">Màu sản phẩm:</label>
                        <input type="text" class="product-input" id="product-color" name="product-color" value="<?php echo $p_color ?>">
                        <hr class="info-hr">
                        <label class="product-label" for="product-price">Giá gốc:</label>
                        <input type="text" class="product-input" id="product-price" name="product-price" value="<?php echo $p_price ?>" onkeyup="caculate()">
                        <hr class="info-hr">
                        <label class="product-label" for="product-decrease-price">Giá giảm:</label>
                        <input type="text" class="product-input" id="product-decrease-price" name="product-decrease-price" value="<?php echo $p_dprice ?>" onkeyup="caculate()">
                        <hr class="info-hr">
                        <label class="product-label">Giảm giá:</label>
                        <span class="price-decrease-pecent">-<?php echo $p_dpercent ?>%</span>
                        <hr class="info-hr">
                        <label class="product-label" for="product-sold-out">Hết hàng:</label>
                        <?php
                            if ($p_soldout == '1'){
                                echo
                                '<input type="checkbox" class="product-input" id="product-sold-out" name="product-sold-out" value="1" checked="checked">';
                            }
                            else{
                                echo
                                '<input type="checkbox" class="product-input" id="product-sold-out" name="product-sold-out" value="1">';
                            }

                            echo
                            '<label class="product-label" for="product-size-out" id="product-size-out">Hết size:</label>
                            <label class="product-label" for="product-M-out" id="product-size-out">M</label>';
                            if ($p_mout == '1'){
                                echo
                                '<input type="checkbox" class="product-input" id="product-M-out" name="product-M-out" value="1" checked="checked">';
                            }
                            else{
                                echo
                                '<input type="checkbox" class="product-input" id="product-M-out" name="product-M-out" value="1">';
                            }

                            echo
                            '<label class="product-label" for="product-L-out" id="product-size-out">L</label>';
                            if ($p_lout == '1'){
                                echo
                                '<input type="checkbox" class="product-input" id="product-L-out" name="product-L-out" value="1" checked="checked">';
                            }
                            else{
                                echo
                                '<input type="checkbox" class="product-input" id="product-L-out" name="product-L-out" value="1">';
                            }

                            echo
                            '<label class="product-label" for="product-XL-out" id="product-size-out">XL</label>';
                            if ($p_lout == '1'){
                                echo
                                '<input type="checkbox" class="product-input" id="product-XL-out" name="product-XL-out" value="1" checked="checked">';
                            }
                            else{
                                echo
                                '<input type="checkbox" class="product-input" id="product-XL-out" name="product-XL-out" value="1">';
                            }

                            if (strcasecmp($p_image2, '') == 0){
                                echo
                                '
                                <hr class="info-hr">
                                <label class="product-label" for="product-img-02">Thêm hình ảnh:</label>
                                <input type="file" class="product-input" id="product-img-02" name="product-img-02">
                                ';
                            }

                            echo
                            '
                            <hr class="info-hr">
                            <label class="product-label">Loại sản phẩm:</label>
                            ';
                            if (strcasecmp($p_type, 'Áo') == 0){
                                echo
                                '
                                <input type="radio" class="product-type" id="product-type-01" name="product-type" value="Áo" checked="checked">
                                <label class="product-label" for="product-type-01" id="product-type">Áo</label>
                                ';
                            }
                            else{
                                echo
                                '
                                <input type="radio" class="product-type" id="product-type-01" name="product-type" value="Áo">
                                <label class="product-label" for="product-type-01" id="product-type">Áo</label>
                                ';
                            }

                            if (strcasecmp($p_type, 'Quần') == 0){
                                echo
                                '
                                <input type="radio" class="product-type" id="product-type-02" name="product-type" value="Quần" checked="checked">
                                <label class="product-label" for="product-type-02" id="product-type">Quần</label>
                                ';
                            }
                            else{
                                echo
                                '
                                <input type="radio" class="product-type" id="product-type-02" name="product-type" value="Quần">
                                <label class="product-label" for="product-type-02" id="product-type">Quần</label>
                                ';
                            }

                            if (strcasecmp($p_type, 'Giày') == 0){
                                echo
                                '
                                <input type="radio" class="product-type" id="product-type-03" name="product-type" value="Giày" checked="checked">
                                <label class="product-label" for="product-type-03" id="product-type">Giày</label>
                                ';
                            }
                            else{
                                echo
                                '
                                <input type="radio" class="product-type" id="product-type-03" name="product-type" value="Giày">
                                <label class="product-label" for="product-type-03" id="product-type">Giày</label>
                                ';
                            }

                            if (strcasecmp($p_type, 'Túi xách') == 0){
                                echo
                                '
                                <input type="radio" class="product-type" id="product-type-04" name="product-type" value="Túi Xách" checked="checked">
                                <label class="product-label" for="product-type-04" id="product-type">Túi xách</label>
                                ';
                            }
                            else{
                                echo
                                '
                                <input type="radio" class="product-type" id="product-type-04" name="product-type" value="Túi Xách">
                                <label class="product-label" for="product-type-04" id="product-type">Túi xách</label>
                                ';
                            }
                        ?>    
                        <hr class="info-hr">
                        <label class="product-label" for="product-decription">Mô tả:</label>
                        <br>
                        <textarea class="product-input" id="product-decription" name="product-decription" cols="40" rows="7"><?php echo $p_decription ?></textarea>
                        <br>
                        <input type="number" class="product-ID" name="ID" value="<?=$ID?>">
                        <button class="save">Xác nhận</button>
                        <input class="cancle" onclick="window.location='allProducts-03.php';" value="Hủy">
                    </form>
                </div>
            </div>
        </div>
        <div class="confirm-delete-modal">
            <div id="confirm-delete-container">
                <h2 class="confirm-delete-title">
                    Bạn có muốn xóa ảnh này không?
                </h2>
                <div class="confirm-delete-btn">
                    <form method="post">
                        <input class="cancle-delete" onclick="closeConfirmDelete()" value="Hủy">
                        <input type="number" class="product-ID" name="ID" value="<?=$p_ID?>">
                        <input type="text" class="product-img-link" name="product-img-link" value="">
                        <button class="confirm-delete">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="change-img-modal">
            <div id="change-img-container">
                <div class="change-img-btn">
                    <form method="post">
                        <label for="product-img" class="change-img-title">Chọn ảnh để thay thế:</label>
                        <input type="file" class="product-img" id="product-img" name="product-img">
                        <br>
                        <input class="cancle-change" onclick="closeChangeImg()" value="Hủy">
                        <input type="number" class="product-ID" name="ID" value="<?=$p_ID?>">
                        <input type="text" class="product-img-link" name="product-img-link" value="">
                        <button class="confirm-change">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <footer onclick="userLeave()" onclick="editLeave()">
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
        <script src="./js/editProductDetail.js"></script>
    </body>
</html>