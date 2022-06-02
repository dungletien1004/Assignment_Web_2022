<?php
    require_once('dbhelp.php');
    // Kiểm tra dữ liệu được post lên
    if(!empty($_POST)){
        $p_name = $p_code = $p_color = $p_price = $p_dprice = $p_dpecent = $p_decription= '';
        $error = array();

        if (isset($_POST['product-name'])){
            $p_name = $_POST['product-name'];
        }
        
        if (isset($_POST['product-code'])){
            $p_code = $_POST['product-code'];
        }

        if (isset($_POST['product-color'])){
            $p_color = $_POST['product-color'];
        }
        
        if (isset($_POST['product-price'])){
            $p_price = $_POST['product-price'];
        }

        if (isset($_POST['product-decrease-price'])){
            $p_dprice = $_POST['product-decrease-price'];
        }

        if (isset($_POST['product-decrease-price'])){
            $p_dpecent = (string)(((float)$p_dprice)/((float)$p_price));
        }

        if (isset($_POST['product-decription'])){
            $p_decription = $_POST['product-decription'];
        }

        $sql = "select * from product where Code = '$p_code'";
        $productList = executeResult($sql);
        if ($productList != NULL){
            $error['Code'] = "Sản phẩm đã tồn tại trên hệ thống";
            echo '<script type="text/javascript">alert("Sản phẩm đã tồn tại trên hệ thống");',
            'window.location = "addNewProduct.php";',
            '</script>';
        }

        // Sửa Nhập vào
        $f_name = str_replace('\'','\\\'',$f_name);
        $f_decription = str_replace('\'','\\\'',$f_decription);
        // Xử lý ảnh
        // Bước 1: Tạo thư mục lưu file
        $target_dir = "C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/";
        $target_file = $target_dir . basename($_FILES['picture']['name']);
        // Kiểm tra kiểu file hợp lệ
        
        // Kiểm tra kích thước file
        $size_file = $_FILES['picture']['size'];
        if ($size_file > 5242880) {
            $error['picture'] = "File bạn chọn không được quá 5MB";
        }

        // Kiểm tra loại file
        $file_type = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        $file_type_allow = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array(strtolower($file_type), $file_type_allow)){
            $error['picture'] = "Kiểu file không phải là ảnh";
        }

        // Kiểm tra file đã tồn tại trê hệ thống
        if (file_exists($target_file)) {
            $error['picture'] = "File bạn chọn đã tồn tại trên hệ thống";
        }
        // Kiểm tra và chuyển file từ bộ nhớ tạm lên sever
        if (empty($error)) {
            move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);
            $sql = "insert into menu(ID, Name, Price, Ammount, Picture, Decription ) value ('$f_ID','$f_name','$f_price','$f_ammount','$target_file','$f_decription')";
            execute($sql);
        }
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
        <title>Add New Product</title>
        <link rel="stylesheet" href="./css/addNewProduct.css">
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
                <form method="post">
                    <label class="product-label" for="product-name">Tên sản phẩm:</label>
                    <input type="text" class="product-input" id="product-name" name="product-name" required="true">
                    <hr class="info-hr">
                    <label class="product-label" for="product-code">Mã sản phẩm:</label>
                    <input type="text" class="product-input" id="product-code" name="product-code" required="true">
                    <hr class="info-hr">
                    <label class="product-label" for="product-color">Màu sản phẩm:</label>
                    <input type="text" class="product-input" id="product-color" name="product-color" required="true">
                    <hr class="info-hr">
                    <label class="product-label" for="product-price">Giá gốc:</label>
                    <input type="text" class="product-input" id="product-price" name="product-price" required="true" onkeyup="caculate()">
                    <hr class="info-hr">
                    <label class="product-label" for="product-decrease-price">Giá giảm:</label>
                    <input type="text" class="product-input" id="product-decrease-price" name="product-decrease-price" value=""
                        onkeyup="caculate()">
                    <hr class="info-hr">
                    <label class="product-label">Giảm giá:</label>
                    <span class="price-decrease-pecent">0%</span>
                    <hr class="info-hr">
                    <label class="product-label" for="product-img-01">Hình ảnh 1:</label>
                    <input type="file" class="product-input" id="product-img-01" name="product-img-01" required="true">
                    <hr class="info-hr">
                    <label class="product-label" for="product-img-02">Hình ảnh 2:</label>
                    <input type="file" class="product-input" id="product-img-02" name="product-img-02">
                    <hr class="info-hr">
                    <label class="product-label" for="product-decription">Mô tả:</label>
                    <br>
                    <textarea class="product-input" id="product-decription" name="product-decription" cols="50" rows="7"></textarea>
                    <br>
                    <button class="save">Xác nhận</button>
                    <input class="cancle" onclick="window.location='allProducts-03.php';" value="Hủy">
                </form>
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
        <script src="./js/addNewProduct.js"></script>
    </body>
</html>