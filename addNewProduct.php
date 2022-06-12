<?php
    require_once('dbhelp.php');
    // Kiểm tra dữ liệu được post lên
    if(!empty($_POST)){
        $p_name = $p_code = $p_color = $target_file1 = $target_file2 = $p_price = $p_dprice = $p_dpercent = $p_type = $p_decription = '';
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
            $p_dpercent = (string)((((float)$p_dprice)/((float)$p_price))*100);
        }

        if (isset($_POST['product-type'])){
            $p_type = $_POST['product-type'];
        }

        if (isset($_POST['product-decription'])){
            $p_decription = $_POST['product-decription'];
        }

        $sql = "select * from product where Code = '$p_code'";
        $productList = executeResult($sql);
        if ($productList != NULL){
            $error['Code'] = "Mã sản phẩm đã tồn tại trên hệ thống";
            echo '<script type="text/javascript">alert("Mã sản phẩm đã tồn tại trên hệ thống!");',
            'window.location = "addNewProduct.php";',
            '</script>';
        }

        // Sửa dữ liệu nhập vào
        $p_name = str_replace('\'','\\\'',$p_name);
        $p_code = str_replace('\'','\\\'',$p_code);
        $p_color = str_replace('\'','\\\'',$p_color);
        $p_price = str_replace('\'','\\\'',$p_price);
        $p_dprice = str_replace('\'','\\\'',$p_dprice);
        $p_decription = str_replace('\'','\\\'',$p_decription);

        // Xử lý ảnh
        // Bước 1: Tạo thư mục lưu file
        $target_dir = "C:/xampp/htdocs/Assignment_Web_2022/images/";

        if (!empty($_FILES['product-img-01'])){
            $target_file1 = $target_dir . basename($_FILES['product-img-01']['name']);
            
            // Kiểm tra kích thước file
            $size_file1 = $_FILES['product-img-01']['size'];
            if ($size_file1 > 10485760){
                $error['Image1'] = "Hình ảnh bạn chọn không được quá 5MB";
                echo '<script type="text/javascript">alert("Hình ảnh số 1 không được quá 10MB!");',
                'window.location = "addNewProduct.php";',
                '</script>';
            }

            // Kiểm tra loại file
            $file_type1 = pathinfo($target_file1, PATHINFO_EXTENSION);
            $file_type_allow = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($file_type1), $file_type_allow)){
                $error['Image1'] = "Định dạng hình ảnh không đúng";
                echo '<script type="text/javascript">alert("Định dạng hình ảnh số 1 không đúng!");',
                'window.location = "addNewProduct.php";',
                '</script>';
            }

            // Kiểm tra file đã tồn tại trê hệ thống
            if (file_exists($target_file1)){
                $error['picture'] = "File bạn chọn đã tồn tại trên hệ thống";
                echo '<script type="text/javascript">alert("Hình ảnh số 1 đã tồn tại trên hệ thống!");',
                'window.location = "addNewProduct.php";',
                '</script>';
            }

            if (empty($error)){
                move_uploaded_file($_FILES['product-img-01']['tmp_name'], $target_file1);
            }
        }

        if ($_FILES['product-img-02']['name'] != ''){
            $target_file2 = $target_dir . basename($_FILES['product-img-02']['name']);
            
            // Kiểm tra kích thước file
            $size_file2 = $_FILES['product-img-02']['size'];
            if ($size_file2 > 10485760){
                $error['Image2'] = "Hình ảnh bạn chọn không được quá 5MB";
                echo '<script type="text/javascript">alert("Hình ảnh số 2 không được quá 10MB!");',
                'window.location = "addNewProduct.php";',
                '</script>';
            }

            // Kiểm tra loại file
            $file_type2 = pathinfo($target_file2, PATHINFO_EXTENSION);
            $file_type_allow = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($file_type2), $file_type_allow)){
                $error['Image2'] = "Định dạng hình ảnh không đúng";
                echo '<script type="text/javascript">alert("Định dạng hình ảnh số 2 không đúng!");',
                'window.location = "addNewProduct.php";',
                'console.log('.$file_type2.')',
                '</script>';
            }

            // Kiểm tra file đã tồn tại trê hệ thống
            if (file_exists($target_file2)){
                $error['picture'] = "File bạn chọn đã tồn tại trên hệ thống";
                echo '<script type="text/javascript">alert("Hình ảnh số 2 đã tồn tại trên hệ thống!");',
                'window.location = "addNewProduct.php";',
                '</script>';
            }

            if (empty($error)){
                move_uploaded_file($_FILES['product-img-02']['tmp_name'], $target_file2);
            }
        }

        if (empty($error)){
            $sql = "insert into product(ID, Name, Code, Color, Image_1, Image_2, OPrice, PPrice, Sale, SoldOut, MOut, LOut, XLOut, Decription, Type) value ('','$p_name','$p_code','$p_color','$target_file1','$target_file2','$p_price','$p_dprice','$p_dpercent','','','','','$p_decription', '$p_type')";
            execute($sql);
            echo '<script type="text/javascript">alert("Thêm sản phẩm mới thành công!");',
				 'window.location = "addNewProduct.php";',
				 '</script>';
			die();
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
                    <li><a href="allProducts-03.php">Sản phẩm</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="addNewProduct.php" id="add-product-link">Thêm sản phẩm</a></li>
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
                <form method="post" enctype="multipart/form-data">
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
                    <input type="text" class="product-input" id="product-decrease-price" name="product-decrease-price" onkeyup="caculate()">
                    <hr class="info-hr">
                    <label class="product-label">Giảm giá:</label>
                    <span class="price-decrease-percent" name="price-decrease-percent">0%</span>
                    <hr class="info-hr">
                    <label class="product-label">Loại sản phẩm:</label>
                    <input type="radio" class="product-type" id="product-type-01" name="product-type" value="Áo" checked="checked">
                    <label class="product-label" for="product-type-01" id="product-type">Áo</label>
                    <input type="radio" class="product-type" id="product-type-02" name="product-type" value="Quần">
                    <label class="product-label" for="product-type-02" id="product-type">Quần</label>
                    <input type="radio" class="product-type" id="product-type-03" name="product-type" value="Giày">
                    <label class="product-label" for="product-type-03" id="product-type">Giày</label>
                    <input type="radio" class="product-type" id="product-type-04" name="product-type" value="Túi Xách">
                    <label class="product-label" for="product-type-04" id="product-type">Túi xách</label>
                    <hr class="info-hr">
                    <label class="product-label" for="product-img-01">Hình ảnh 1:</label>
                    <input type="file" class="product-input" id="product-img-01" name="product-img-01" required="true">
                    <hr class="info-hr">
                    <label class="product-label" for="product-img-02">Hình ảnh 2:</label>
                    <input type="file" class="product-input" id="product-img-02" name="product-img-02">
                    <hr class="info-hr">
                    <label class="product-label" for="product-decription">Mô tả:</label>
                    <br>
                    <textarea class="product-input" id="product-decription" name="product-decription" cols="70" rows="7"></textarea>
                    <br>
                    <button type="submit" class="save">Xác nhận</button>
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