<?php
    require_once('dbhelp.php');
    if (isset($_POST['confirm-change'])){
        $p_id1 = $target_file = $p_imgLink1 = '';
        if (isset($_POST['ID'])){
            $p_id1 = $_POST['ID'];
        }
        if (isset($_POST['product-img-link-02'])){
            $p_imgLink1 = 'C:/xampp/htdocs'.mb_substr($_POST['product-img-link-02'], 16);
        }
        $error = array();
        // Xử lý ảnh
        // Bước 1: Tạo thư mục lưu file
        $target_dir = "C:/xampp/htdocs/Assignment_Web_2022/images/";
        if (!empty($_FILES['product-img'])){
            $target_file = $target_dir . basename($_FILES['product-img']['name']);
            
            // Kiểm tra kích thước file
            $size_file = $_FILES['product-img']['size'];
            if ($size_file > 10485760){
                $error['Image'] = "Hình ảnh bạn chọn không được quá 5MB";
                echo '<script type="text/javascript">alert("Hình ảnh không được quá 10MB!");',
                'window.location = "editProductDetail.php?id='.$p_id1.'";',
                '</script>';
            }

            // Kiểm tra loại file
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_type_allow = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($file_type), $file_type_allow)){
                $error['Image'] = "Định dạng hình ảnh không đúng";
                echo '<script type="text/javascript">alert("Định dạng hình ảnh không đúng!");',
                'window.location = "editProductDetail.php?id='.$p_id1.'";',
                '</script>';
            }

            if (file_exists($target_file)){
                $error['picture'] = "File bạn chọn đã tồn tại trên hệ thống";
                echo '<script type="text/javascript">alert("Hình ảnh đã tồn tại trên hệ thống!");',
                'window.location = "editProductDetail.php?id='.$p_id1.'";',
                '</script>';
            }

            if (empty($error)){
                move_uploaded_file($_FILES['product-img']['tmp_name'], $target_file);
            }
        }
        if (empty($error)){
            $sql = "select * from product where ID = '$p_id1'";
            $productList = executeResult($sql);
            if ($productList != NULL){
                $std = $productList[0];
                if (strcasecmp($p_imgLink1, $std['Image_1']) == 0){
                    $sql = "update product set Image_1 = '$target_file' where ID = '$p_id1'";
                    execute($sql);
                    echo '<script type="text/javascript">alert("Đổi hình ảnh thành công");',
                        'window.location = "editProductDetail.php?id='.$p_id1.'";',
                        '</script>';
                }
                else{
                    $sql = "update product set Image_2 = '$target_file' where ID = '$p_id1'";
                    execute($sql);
                    echo '<script type="text/javascript">alert("Đổi hình ảnh thành công");',
                        'window.location = "editProductDetail.php?id='.$p_id1.'";',
                        '</script>';
                }
            }
			die();
		}
    }

    if (isset($_POST['confirm-delete'])){
        $p_id2 = $p_imgLink2 = $p_img2 = '';
        if (isset($_POST['ID'])){
            $p_id2 = $_POST['ID'];
        }
        if (isset($_POST['product-img-link-01'])){
            $p_imgLink2 = 'C:/xampp/htdocs'.mb_substr($_POST['product-img-link-01'], 16);
        }
        
        if (empty($error)){
            $sql = "select * from product where ID = '$p_id2'";
            $productList = executeResult($sql);
            if ($productList != NULL){
                $std = $productList[0];
                $p_img2 = $std['Image_2'];
                $p_imgTmp = mb_substr($p_imgLink2, 43);
                if (strcasecmp($p_imgLink2, $std['Image_1']) == 0){
                    unlink("images/$p_imgTmp");
                    $sql = "update product set Image_1 = '$p_img2', Image_2 = '' where ID = '$p_id2'";
                    execute($sql);
                    echo '<script type="text/javascript">alert("Xóa hình ảnh thành công");',
                        'window.location = "editProductDetail.php?id='.$p_id2.'";',
                        '</script>';
                }
                else{
                    unlink("images/$p_imgTmp");
                    $sql = "update product set Image_2 = '' where ID = '$p_id2'";
                    execute($sql);
                    echo '<script type="text/javascript">alert("Xóa hình ảnh thành công");',
                        'window.location = "editProductDetail.php?id='.$p_id2.'";',
                        '</script>';
                }
            }
			die();
		}
    }
    if(isset($_POST['confirm-edit'])){
        $p_name = $p_code = $p_color = $target_file = $p_price = $p_dprice = $p_dpercent = '';
        $p_id = $p_type = $p_decription = $p_soldout = $p_mout = $p_lout = $p_xlout = '';
        $error = array();

        if (isset($_POST['ID'])){
            $p_id = $_POST['ID'];
        }

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

        if (isset($_POST['product-sold-out'])){
            $p_soldout = $_POST['product-sold-out'];
        }

        if (isset($_POST['product-M-out'])){
            $p_mout = $_POST['product-M-out'];
        }

        if (isset($_POST['product-L-out'])){
            $p_lout = $_POST['product-L-out'];
        }

        if (isset($_POST['product-XL-out'])){
            $p_xlout = $_POST['product-XL-out'];
        }

        $sql = "select * from product where Code = '$p_code'";
        $productList = executeResult($sql);
        $std = $productList[0];
        $id = $std['ID'];
        if (strcasecmp($p_id, $id) != 0){
            $error['Code'] = "Mã sản phẩm đã tồn tại trên hệ thống";
            echo '<script type="text/javascript">alert("Mã sản phẩm đã tồn tại trên hệ thống!");',
            'window.location = "editProductDetail.php?id='.$p_id.'";',
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
        if ($_FILES['product-img-2']['name'] != ''){
            $target_file2 = $target_dir . basename($_FILES['product-img-2']['name']);
            
            // Kiểm tra kích thước file
            $size_file2 = $_FILES['product-img-2']['size'];
            if ($size_file2 > 10485760){
                $error['Image2'] = "Hình ảnh bạn chọn không được quá 5MB";
                echo '<script type="text/javascript">alert("Hình ảnh không được quá 10MB!");',
                'window.location = "editProductDetail.php?id='.$p_id.'";',
                '</script>';
            }

            // Kiểm tra loại file
            $file_type2 = pathinfo($target_file2, PATHINFO_EXTENSION);
            $file_type_allow = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($file_type2), $file_type_allow)){
                $error['Image2'] = "Định dạng hình ảnh không đúng";
                echo '<script type="text/javascript">alert("Định dạng hình ảnh không đúng!");',
                'window.location = "editProductDetail.php?id='.$p_id.'";',
                '</script>';
            }

            // Kiểm tra file đã tồn tại trê hệ thống
            if (file_exists($target_file2)){
                $error['picture'] = "File bạn chọn đã tồn tại trên hệ thống";
                echo '<script type="text/javascript">alert("Hình ảnh đã tồn tại trên hệ thống!");',
                'window.location = "editProductDetail.php?id='.$p_id.'";',
                '</script>';
            }

            if (empty($error)){
                move_uploaded_file($_FILES['product-img-2']['tmp_name'], $target_file2);
            }
        }

        if (empty($error)){
            $sql = "select * from product where ID = '$p_id'";
            $productList = executeResult($sql);
            if ($productList != NULL){
                $std = $productList[0];
                $p_img2 = $std['Image_2'];
                if (strcasecmp($p_img2, '') == 0){
                    $sql = "update product set Name = '$p_name', Code = '$p_code', Color = '$p_color', Image_2 = '$target_file2', OPrice = '$p_price', PPrice = '$p_dprice', Sale = '$p_dpercent', SoldOut = '$p_soldout', MOut = '$p_mout', LOut = '$p_lout', XLOut = '$p_xlout', Decription = '$p_decription', Type = '$p_type' where ID = '$p_id'";
                }
                else{
                    $sql = "update product set Name = '$p_name', Code = '$p_code', Color = '$p_color', OPrice = '$p_price', PPrice = '$p_dprice', Sale = '$p_dpercent', SoldOut = '$p_soldout', MOut = '$p_mout', LOut = '$p_lout', XLOut = '$p_xlout', Decription = '$p_decription', Type = '$p_type' where ID = '$p_id'";
                }
                execute($sql);
                echo '<script type="text/javascript">alert("Chỉnh sửa thông tin thành công!");',
                    'window.location = "editProductDetail.php?id='.$p_id.'";',
                    '</script>';
                die();
            }
        }
    }

    $ppp_id = '';
    if (isset($_GET['id'])){
        $ppp_id = $_GET['id'];
        $sql = "select * from product where ID = '$ppp_id'";
        $productList = executeResult($sql);
        if ($productList != NULL){
            $std = $productList[0];
            $pp_ID = $std['ID'];
            $pp_name = $std['Name'];
            $pp_code = $std['Code'];
            $pp_color = $std['Color'];
            $pp_image1 = '.'.mb_substr($std['Image_1'], 35);
            $pp_image2 = $std['Image_2'];
            $pp_price = $std['OPrice'];
            $pp_dprice = $std['PPrice'];
            $pp_dpercent = $std['Sale'];
            $pp_soldout = $std['SoldOut'];
            $pp_mout = $std['MOut'];
            $pp_lout = $std['LOut'];
            $pp_xlout = $std['XLOut'];
            $pp_decription = $std['Decription'];
            $pp_type = $std['Type'];
        }
        if (strcasecmp($pp_image2, '') != 0){
            $pp_image2 = '.'.mb_substr($std['Image_2'], 35);
        }

        if (strcasecmp($pp_dprice, '') == 0){
            $pp_dprice = '';
            $pp_dpercent = '0';
        }
        else{
            $pp_dpercent = (string)(ceil(100 - (float)$pp_dpercent));
        }
    }

    if (isset($_POST['search-holder'])){
        $p_text = $_POST["search-holder"];
        header("Location: allProducts-03.php?search-holder=".$p_text);
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
                    <img class="product-master-img" src="<?php echo $pp_image1 ?>" alt="Product" onclick="editLeave()">
                    <?php
                        if (strcasecmp($pp_image2, '') != 0){
                            echo
                            '
                            <img class="product-slave-img" id="product-slave-img-01" src="'.$pp_image1.'" alt="Product" onclick="changeImg1()" onclick="editLeave()">
                            <img class="product-slave-img" id="product-slave-img-02" src="'.$pp_image2.'" alt="Product" onclick="changeImg2()" onclick="editLeave()">
                            <div class="edit-container">
                                <i class="fa-solid fa-ellipsis-vertical" id="edit-sysbol" onclick="editHover()"></i>
                                <div class="edit-dropdown-menu">
                                    <a class="delete" onclick="openConfirmDelete()">Xóa</a>
                                    <a class="edit" onclick="openChangeImg()">Thay đổi</a>
                                </div>
                            </div>
                            ';
                        }
                        else{
                            echo
                            '
                            <img class="product-slave-img" id="product-slave-img-01" src="'.$pp_image1.'" alt="Product" onclick="editLeave()">
                            <img class="product-slave-img" id="product-slave-img-02" src="'.$pp_image2.'" alt="Product" onclick="editLeave()" style="display: none;">
                            <div class="edit-container">
                                <i class="fa-solid fa-ellipsis-vertical" id="edit-sysbol" onclick="editHover()"></i>
                                <div class="edit-dropdown-menu">
                                    <a class="delete" onclick="openConfirmDelete()" style="display: none;">Xóa</a>
                                    <a class="edit" onclick="openChangeImg()">Thay đổi</a>
                                </div>
                            </div>
                            ';
                        }
                    ?>
                </div>
                <div class="middle-right-collum" onclick="editLeave()">
                    <form method="post" enctype="multipart/form-data">
                        <input type="number" class="product-ID" name="ID" value="<?=$pp_ID?>">
                        <label class="product-label" for="product-name">Tên sản phẩm:</label>
                        <input type="text" class="product-input" id="product-name" name="product-name" required="true" value="<?php echo $pp_name ?>">
                        <hr class="info-hr">
                        <label class="product-label" for="product-code">Mã sản phẩm:</label>
                        <input type="text" class="product-input" id="product-code" name="product-code" required="true" value="<?php echo $pp_code ?>">
                        <hr class="info-hr">
                        <label class="product-label" for="product-color">Màu sản phẩm:</label>
                        <input type="text" class="product-input" id="product-color" name="product-color" required="true" value="<?php echo $pp_color ?>">
                        <hr class="info-hr">
                        <label class="product-label" for="product-price">Giá gốc:</label>
                        <input type="text" class="product-input" id="product-price" name="product-price" required="true" value="<?php echo $pp_price ?>" onkeyup="caculate()">
                        <hr class="info-hr">
                        <label class="product-label" for="product-decrease-price">Giá giảm:</label>
                        <input type="text" class="product-input" id="product-decrease-price" name="product-decrease-price" value="<?php echo $pp_dprice ?>" onkeyup="caculate()">
                        <hr class="info-hr">
                        <label class="product-label">Giảm giá:</label>
                        <span class="price-decrease-pecent"><?php echo $pp_dpercent ?>%</span>
                        <hr class="info-hr">
                        <label class="product-label" for="product-sold-out">Hết hàng:</label>
                        <?php
                            if ($pp_soldout == '1'){
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
                            if ($pp_mout == '1'){
                                echo
                                '<input type="checkbox" class="product-input" id="product-M-out" name="product-M-out" value="1" checked="checked">';
                            }
                            else{
                                echo
                                '<input type="checkbox" class="product-input" id="product-M-out" name="product-M-out" value="1">';
                            }

                            echo
                            '<label class="product-label" for="product-L-out" id="product-size-out">L</label>';
                            if ($pp_lout == '1'){
                                echo
                                '<input type="checkbox" class="product-input" id="product-L-out" name="product-L-out" value="1" checked="checked">';
                            }
                            else{
                                echo
                                '<input type="checkbox" class="product-input" id="product-L-out" name="product-L-out" value="1">';
                            }

                            echo
                            '<label class="product-label" for="product-XL-out" id="product-size-out">XL</label>';
                            if ($pp_xlout == '1'){
                                echo
                                '<input type="checkbox" class="product-input" id="product-XL-out" name="product-XL-out" value="1" checked="checked">';
                            }
                            else{
                                echo
                                '<input type="checkbox" class="product-input" id="product-XL-out" name="product-XL-out" value="1">';
                            }

                            if (strcasecmp($pp_image2, '') == 0){
                                echo
                                '
                                <hr class="info-hr">
                                <label class="product-label" for="product-img-2">Thêm hình ảnh:</label>
                                <input type="file" class="product-input" id="product-img-2" name="product-img-2">
                                ';
                            }

                            echo
                            '
                            <hr class="info-hr">
                            <label class="product-label">Loại sản phẩm:</label>
                            ';
                            if (strcasecmp($pp_type, 'Áo') == 0){
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

                            if (strcasecmp($pp_type, 'Quần') == 0){
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

                            if (strcasecmp($pp_type, 'Giày') == 0){
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

                            if (strcasecmp($pp_type, 'Túi xách') == 0){
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
                        <textarea class="product-input" id="product-decription" name="product-decription" cols="40" rows="7"><?php echo $pp_decription ?></textarea>
                        <br>
                        <input type="submit" class="save" name="confirm-edit" value="Xác nhận">
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
                        <input type="number" class="product-ID" name="ID" value="<?=$pp_ID?>">
                        <input type="text" class="product-img-link-01" name="product-img-link-01" value="<?=$pp_image1?>">
                        <input type="submit" class="confirm-delete" name="confirm-delete" value="Xác nhận">
                    </form>
                </div>
            </div>
        </div>
        <div class="change-img-modal">
            <div id="change-img-container">
                <div class="change-img-btn">
                    <form method="post" enctype="multipart/form-data">
                        <label for="product-img" class="change-img-title">Chọn ảnh để thay thế:</label>
                        <input type="file" class="product-img" id="product-img" name="product-img"  required="true">
                        <br>
                        <input class="cancle-change" onclick="closeChangeImg()" value="Hủy">
                        <input type="number" class="product-ID" name="ID" value="<?=$pp_ID?>">
                        <input type="text" class="product-img-link-02" name="product-img-link-02" value="<?=$pp_image1?>">
                        <input type="submit" class="confirm-change" name="confirm-change" value="Xác nhận">
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