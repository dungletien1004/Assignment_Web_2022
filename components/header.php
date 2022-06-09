<!-- FAKE DATA -->
<?php
    $_SESSION['id_user'] = 1;
    $_SESSION['is_admin'] = true;
    $_SESSION['avt'] = 'img/avt.jpg';
    global $page;
    


?>



<div class="header">
        <div class="logo">
            <a href="index.php">
                <img src="./img/Logo.png" alt="">
                <div class="logo-text">
                    BKU <span>Team</span>
                </div>
            </a>
        </div>
        <div class="search-bar">
            <label for="search-box" class="fas fa-search"></label>
            <input type="search" name="" placeholder="Type to search..." id="search-box">
        </div>
        <div class="nav">
            <nav class="nav-bar">
                <a href="index.php" class=<?php echo ($page == 'home')? "active": ""?>>Trang chủ</a>
                <a href="listProduct.php">Sản phẩm</a>
                <a href="news.php">Tin tức</a>
                <!-- <a href="contact.php">Liên hệ</a> -->
                <!-- <a href="cart.php">Giỏ hàng</a> -->
                <a href="signup.php">Đăng kí</a>
            </nav>
            <div class="fas fa-list-ul icon menu-icon"></div>
            <div class="fas fa-search icon search-icon"></div>

            <!-- ACCOUNT -->
            <?php
            if (!isset($_SESSION['id_user'])) { ?>
                <a href="login.php"><div class="fas fa-user icon user-icon"></div></a>
            <?php
            } else { ?>
                <?php
                if (isset($_SESSION["is_admin"])) { ?>
                    <div class="avt"> <img src="<?php echo $_SESSION['avt'] ?>"/>
                        <div class="list-action">
                            <a href="admin/admin.php">Admin</a>
                            <a href="logout.php" >Đăng xuất</a>

                        </div>
                    </div>
                <?php
                } else { ?>
                    <div class="avt" background="<?php echo $_SESSION['avt'] ?>"> 
                        <div class="list-action">
                            <a href="info.php">Thông tin cá nhân</a>
                            <a href="cart.php" >Giỏ hàng</a>
                            <a href="logout.php">Đăng xuất</a>

                        </div>
                    </div>
                <?php
                } ?>

            <?php
            } ?>
        
        </div>
        <script src="js/header.js"></script>
</div>