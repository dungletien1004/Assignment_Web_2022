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
        }
        if (strcasecmp($p_image2, '') != 0){
            $p_image2 = '.'.mb_substr($std['Image_2'], 35);
        }
        $p_dpercent = (string)(ceil(100 - (float)$p_dpercent));
    }

    if (isset($_POST['search-holder'])){
        $p_text = $_POST["search-holder"];
        header("Location: allProducts-02.php?search-holder=".$p_text);
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
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
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
                        <input type="search" class="search-bar" name="search-holder" placeholder="T??m ki???m" size="50">
                    </form>
                </div>
                <ul class="header-nav" onclick="userLeave()">
                    <li><a href="#">Trang ch???</a></li>
                    <li><a href="allProducts-02.php" id="product-link">S???n ph???m</a></li>
                    <li><a href="#">Tin t???c</a></li>
                    <li><a href="#">Li??n h???</a></li>
                    <li><a href="#">Gi??? h??ng</a></li>
                </ul>
                <div class="user-menu">
                    <div class="user-icon" onclick="userHover()">
                        <i class="fa-solid fa-user-large"></i>
                    </div>
                    <div class="user-dropdown-menu">
                        <a href="#" class="user-info">T??i kho???n c???a t??i</a>
                        <form method="post" action="">
                            <button class="logout">????ng Xu???t</button>
                        </form>
                    </div>
                </div>
            </div>
        </header> -->
        <?php include 'components/header.php' ?>
        <div class="clearfix" style="margin: 60px;"></div>
        <div class="middle" onclick="userLeave()">
        <div class="middle-top">
                <div class="middle-left-collum">
                    <img class="product-master-img" src="<?php echo $p_image1 ?>" alt="Product">
                    <?php
                        if (strcasecmp($p_image2, '') != 0){
                            echo
                            '
                            <img class="product-slave-img" id="product-slave-img-01" src="'.$p_image1.'" alt="Product" onclick="changeImg1()" onclick="editLeave()">
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
                </div>
                <div class="middle-right-collum">
                    <div class="product-detail-name"><?php echo $p_name ?> / <?php echo $p_color ?></div>
                    <div class="product-detail-code"><?php echo $p_code ?></div>
                    <hr class="info-hr">
                    <div class="price-container">
                        <?php
                            if (strcasecmp($std['Sale'], '') != 0){
                                echo
                                '
                                <span class="price-decrease-pecent">-'.$p_dpercent.'%</span>
                                <span class="price-decrease">'.$p_dprice.'$</span>
                                <span class="product-detail-price">'.$p_price.'$</span>
                                ';
                            }
                            else{
                                echo
                                '
                                <span class="price-decrease-pecent" style="background-color: white; color: black; font-size: 170%;">'.$p_price.'$</span>
                                ';
                            }
                        ?>
                    </div>
                    <hr class="info-hr">
                    <div class="size-container">
                    <?php
                            if ((strcasecmp($p_mout, '') == 0) && (strcasecmp($p_lout, '') == 0) && (strcasecmp($p_xlout, '') == 0)){
                                echo
                                '
                                <div class="m-size" onclick="mSize()">M</div>
                                <div class="l-size" onclick="lSize()">L</div>
                                <div class="xl-size" onclick="xlSize()">XL</div>
                                ';
                            }
                            else{
                                if (strcasecmp($p_mout, '') != 0){
                                    if (strcasecmp($p_lout, '') != 0){
                                        echo
                                        '
                                        <div class="m-size" style="background-color: #A3A3A3; color: white;">M</div>
                                        <div class="l-size" style="background-color: #A3A3A3; color: white;">L</div>
                                        <div class="xl-size" onclick="xlSize4()" onload="xlSize4()">XL</div>
                                        ';
                                    }
                                    else{
                                        if (strcasecmp($p_xlout, '') != 0){
                                            echo
                                            '
                                            <div class="m-size" style="background-color: #A3A3A3; color: white;">M</div>
                                            <div class="l-size" onclick="lSize5()" onload="lSize5()">L</div>
                                            <div class="xl-size" style="background-color: #A3A3A3; color: white;">XL</div>
                                            ';
                                        }
                                        else{
                                            echo
                                            '
                                            <div class="m-size" style="background-color: #A3A3A3; color: white;">M</div>
                                            <div class="l-size" onclick="lSize1()" onload="lSize1()">L</div>
                                            <div class="xl-size" onclick="xlSize1()" onload="xlSize1()">XL</div>
                                            ';
                                        }
                                    }
                                    
                                }
                                else{
                                    if (strcasecmp($p_lout, '') != 0){
                                        if (strcasecmp($p_xlout, '') != 0){
                                            echo
                                            '
                                            <div class="m-size" onclick="mSize6()">M</div>
                                            <div class="l-size" style="background-color: #A3A3A3; color: white;">L</div>
                                            <div class="xl-size" style="background-color: #A3A3A3; color: white;">XL</div>
                                            ';
                                        }
                                        else{
                                            echo
                                            '
                                            <div class="m-size" onclick="mSize2()">M</div>
                                            <div class="l-size" style="background-color: #A3A3A3; color: white;">L</div>
                                            <div class="xl-size" onclick="xlSize2()">XL</div>
                                            ';
                                        }
                                    }
                                    else{
                                        if (strcasecmp($p_xlout, '') != 0){
                                            echo
                                            '
                                            <div class="m-size" onclick="mSize3()">M</div>
                                            <div class="l-size" onclick="lSize3()">L</div>
                                            <div class="xl-size" style="background-color: #A3A3A3; color: white;">XL</div>
                                            ';
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                    <hr class="info-hr">
                    <form method="post" action="./addProduct.php">
                        <div class="number-container">
                            <span class="minus" onclick="decreaseNumber()"><i class="fa-solid fa-minus"></i></span>
                            <input id="number" name="number" value="1" size="2">
                            <span class="plus" onclick="increaseNumber()"><i class="fa-solid fa-plus"></i></span>
                        </div>
                        <hr class="info-hr">
                        <input type="number" id="product-id" name="ID" value="<?php echo $p_ID ?>">
                        <?php
                            if (strcasecmp($p_mout, '') != 0){
                                if (strcasecmp($p_lout, '') != 0){
                                    echo
                                    '<input type="text" id="product-size" name="size" value="XL">';
                                }
                                else{
                                    echo
                                    '<input type="text" id="product-size" name="size" value="L">';
                                }
                            }
                            else{
                                echo
                                '<input type="text" id="product-size" name="size" value="M">';
                            }
                        ?>
                        <input type="submit" class="add-to-cart" name="add-to-cart" value="Th??m V??o Gi??? H??ng">
                    </form>
                    <div class="product-detail-decription">
                        M?? t???
                        <br>
                        <p class="product-decription" cols="70" rows="7"><?php echo $p_decription ?></p>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="middle-bottom">
                <h1 class="middle-bottom-title">S???N PH???M LI??N QUAN</h1>
                <?php
                    require_once('dbhelp.php');
                    $sql = 'select * from product order by CHAR_LENGTH(Name)';
                    $productList = executeResult($sql);
                    for($i = 0; $i < 8; $i++){
                        $std = $productList[$i];
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
                    123 Tr???n Ph??, B???n Ngh??, Qu???n 1, TP.HCM
                </div>
            </div>
            <div class="footer-collum-2">
                <h3 class="title">
                    Ch??m s??c kh??ch h??ng
                </h3>
                <ul class="care-item">
                    <li><a href="#">H?????ng d???n mua h??ng</a></li>
                    <li><a href="#">Thanh to??n</a></li>
                    <li><a href="#">V???n chuy???n</a></li>
                    <li><a href="#">Ch??nh s??ch ho??n ti???n</a></li>
                </ul>
            </div>
            <div class="footer-collum-3">
                <h3 class="title">
                    D???ch v???
                </h3>
                <ul class="care-item">
                    <li><a href="#">Khuy???n m??i</a></li>
                    <li><a href="#">????ng k?? th??nh vi??n</a></li>
                    <li><a href="#">Gi???m gi??</a></li>
                    <li><a href="#">Giao h??ng t???n n??i</a></li>
                </ul>
            </div>
            <div class="footer-collum-4">
                <h3 class="title-1">
                    T???i ???ng d???ng
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