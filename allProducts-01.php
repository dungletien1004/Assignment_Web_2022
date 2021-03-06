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
        <link rel="stylesheet" href="./css/allProducts-01.css">
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
        <!-- HEADER -->
        <div class="header">
                <div class="logo">
                    <a href="./index.php">
                        <img src="./img/Logo.png" alt="">
                        <div class="logo-text">
                            BKU <span>Team</span>
                        </div>
                    </a>
                </div>
                <div class="search-bar">
                    <form method="post">
                        <label for="search-box" class="fas fa-search"></label>
                        <input type="search" name="search-holder" placeholder="Type to search..." id="search-box">
                    </form>
                   
                </div>
                <div class="nav">
                    <nav class="nav-bar">
                        <a href="./index.php" >Trang ch???</a>
                        <a href="./allProducts-01.php" style="color:black;">S???n ph???m</a>
                        <a href="./index.php#contact">Li??n h???</a>
                        <a href="./signup.php">????ng K??</a>
                    </nav>
                    <div class="fas fa-list-ul icon menu-icon"></div>
                    <div class="fas fa-search icon search-icon"></div>
                    <a href="./login.php"><div class="fas fa-user icon user-icon"></div></a>
                </div>
            </div>
            <div class="clearfix" style="margin: 40px;"></div>
            <div class="header-bottom" onclick="userLeave()">
                <img class="logo-2" src="./images/Logo-02.png" alt="Logo">
            </div>
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
                                if (strcasecmp($p_text, 'T???t C???') == 0){
                                    echo
                                    '
                                    <form method="post">
                                        <button type="submit" class="menu-all" name="search-click" style="color: #E70E0E;">
                                            <i class="fa-solid fa-arrow-right-long" id="all-icon" style="display: inline;"></i>
                                            T???t C???
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="T???t C???">
                                    </form>
                                    <hr class="all-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-shirt" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shirt-icon" style="display: none;"></i>
                                            ??o
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="??o">
                                    </form>
                                    <hr class="shirt-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-pants" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="pants-icon" style="display: none;"></i>
                                            Qu???n
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Qu???n">
                                    </form>
                                    <hr class="pants-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shoes" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shoes-icon" style="display: none;"></i>
                                            Gi??y
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Gi??y">
                                    </form>
                                    <hr class="shoes-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-bags" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="bags-icon" style="display: none;"></i>
                                            T??i X??ch
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="T??i X??ch">
                                    </form>
                                    <hr class="bags-hr" style="display: none;">
                                    ';
                                }
                                if (strcasecmp($p_text, '??o') == 0){
                                    echo
                                    '
                                    <form method="post">
                                        <button type="submit" class="menu-all" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="all-icon" style="display: none;"></i>
                                            T???t C???
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="T???t C???">
                                    </form>
                                    <hr class="all-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-shirt" name="search-click" style="color: #E70E0E;">
                                            <i class="fa-solid fa-arrow-right-long" id="shirt-icon" style="display: inline;"></i>
                                            ??o
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="??o">
                                    </form>
                                    <hr class="shirt-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-pants" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="pants-icon" style="display: none;"></i>
                                            Qu???n
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Qu???n">
                                    </form>
                                    <hr class="pants-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shoes" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shoes-icon" style="display: none;"></i>
                                            Gi??y
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Gi??y">
                                    </form>
                                    <hr class="shoes-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-bags" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="bags-icon" style="display: none;"></i>
                                            T??i X??ch
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="T??i X??ch">
                                    </form>
                                    <hr class="bags-hr" style="display: none;">
                                    ';
                                }
                                if (strcasecmp($p_text, 'Qu???n') == 0){
                                    echo
                                    '
                                    <form method="post">
                                        <button type="submit" class="menu-all" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="all-icon" style="display: none;"></i>
                                            T???t C???
                                        </button>
                                        <input type="text" class="search-product" name="search-all" value="T???t C???">
                                    </form>
                                    <hr class="all-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shirt" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shirt-icon" style="display: none;"></i>
                                            ??o
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="??o">
                                    </form>
                                    <hr class="shirt-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-pants" name="search-click" style="color: #E70E0E;">
                                            <i class="fa-solid fa-arrow-right-long" id="pants-icon" style="display: inline;"></i>
                                            Qu???n
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Qu???n">
                                    </form>
                                    <hr class="pants-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-shoes" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shoes-icon" style="display: none;"></i>
                                            Gi??y
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Gi??y">
                                    </form>
                                    <hr class="shoes-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-bags" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="bags-icon" style="display: none;"></i>
                                            T??i X??ch
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="T??i X??ch">
                                    </form>
                                    <hr class="bags-hr" style="display: none;">
                                    ';
                                }
                                if (strcasecmp($p_text, 'Gi??y') == 0){
                                    echo
                                    '
                                    <form method="post">
                                        <button type="submit" class="menu-all" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="all-icon" style="display: none;"></i>
                                            T???t C???
                                        </button>
                                        <input type="text" class="search-product" name="search-all" value="T???t C???">
                                    </form>
                                    <hr class="all-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shirt" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shirt-icon" style="display: none;"></i>
                                            ??o
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="??o">
                                    </form>
                                    <hr class="shirt-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-pants" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="pants-icon" style="display: none;"></i>
                                            Qu???n
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Qu???n">
                                    </form>
                                    <hr class="pants-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-shoes" name="search-click" style="color: #E70E0E;">
                                            <i class="fa-solid fa-arrow-right-long" id="shoes-icon" style="display: inline;"></i>
                                            Gi??y
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Gi??y">
                                    </form>
                                    <hr class="shoes-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-bags" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="bags-icon" style="display: none;"></i>
                                            T??i X??ch
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="T??i X??ch">
                                    </form>
                                    <hr class="bags-hr" style="display: none;">
                                    ';
                                }
                                if (strcasecmp($p_text, 'T??i X??ch') == 0){
                                    echo
                                    '
                                    <form method="post">
                                        <button type="submit" class="menu-all" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="all-icon" style="display: none;"></i>
                                            T???t C???
                                        </button>
                                        <input type="text" class="search-product" name="search-all" value="T???t C???">
                                    </form>
                                    <hr class="all-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shirt" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shirt-icon" style="display: none;"></i>
                                            ??o
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="??o">
                                    </form>
                                    <hr class="shirt-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-pants" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="pants-icon" style="display: none;"></i>
                                            Qu???n
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Qu???n">
                                    </form>
                                    <hr class="pants-hr" style="display: none;">
                                    <form method="post">
                                        <button type="submit" class="menu-shoes" name="search-click" style="color: black;">
                                            <i class="fa-solid fa-arrow-right-long" id="shoes-icon" style="display: none;"></i>
                                            Gi??y
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="Gi??y">
                                    </form>
                                    <hr class="shoes-hr" style="display: block;">
                                    <form method="post">
                                        <button type="submit" class="menu-bags" name="search-click" style="color: #E70E0E;">
                                            <i class="fa-solid fa-arrow-right-long" id="bags-icon" style="display: inline;"></i>
                                            T??i X??ch
                                        </button>
                                        <input type="text" class="search-product" name="search-holder" value="T??i X??ch">
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
                                        T???t C???
                                    </button>
                                    <input type="text" class="search-product" name="search-holder" value="T???t C???">
                                </form>
                                <hr class="all-hr">
                                <form method="post">
                                    <button type="submit" class="menu-shirt" name="search-click">
                                        <i class="fa-solid fa-arrow-right-long" id="shirt-icon"></i>
                                        ??o
                                    </button>
                                    <input type="text" class="search-product" name="search-holder" value="??o">
                                </form>
                                <hr class="shirt-hr">
                                <form method="post">
                                    <button type="submit" class="menu-pants" name="search-click">
                                        <i class="fa-solid fa-arrow-right-long" id="pants-icon"></i>
                                        Qu???n
                                    </button>
                                    <input type="text" class="search-product" name="search-holder" value="Qu???n">
                                </form>
                                <hr class="pants-hr">
                                <form method="post">
                                    <button type="submit" class="menu-shoes" name="search-click">
                                        <i class="fa-solid fa-arrow-right-long" id="shoes-icon"></i>
                                        Gi??y
                                    </button>
                                    <input type="text" class="search-product" name="search-holder" value="Gi??y">
                                </form>
                                <hr class="shoes-hr">
                                <form method="post">
                                    <button type="submit" class="menu-bags" name="search-click">
                                        <i class="fa-solid fa-arrow-right-long" id="bags-icon"></i>
                                        T??i X??ch
                                    </button>
                                    <input type="text" class="search-product" name="search-holder" value="T??i X??ch">
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
                        if (strcasecmp($p_text, 'T???t C???') != 0) {
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
                            else{
                                echo
                                '<div class="product-item">
                                    <a onclick=\'window.open("productDetail-01.php?id='.$std['ID'].'","_self")\'>
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
                    <?php
                        if ($currentPage != 1){
                            $previousPage = $currentPage - 1;
                            echo
                            '<a href="allProducts-01.php?page='.$previousPage.'" class="move"><i class="fa-solid fa-left-long"></i></a>';
                        }
                        for ($i = 1; $i <= $totalPage; $i++){
                            if ($i != $currentPage){
                                echo
                                '<a href="allProducts-01.php?page='.$i.'" class="move">'.$i.'</a>';
                            }
                            else{
                                echo
                                '<a href="allProducts-01.php?page='.$i.'" class="move" style="color: #838181;">'.$i.'</a>';
                            }
                        }
                        if ($currentPage != $totalPage){
                            $nextPage = $currentPage + 1;
                            echo
                            '<a href="allProducts-01.php?page='.$nextPage.'" class="move"><i class="fa-solid fa-right-long"></i></a>';
                        }
                    ?>
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
        <script src="./js/allProducts-01.js"></script>
    </body>
</html>