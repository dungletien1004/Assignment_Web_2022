<!-- FAKE DATA -->
<?php
    session_start();
    include "./db/connectdb.php";
    global $conn;
    $isadmin = $_SESSION['admin'];
    $username = $_SESSION['username'];
    $result = mysqli_query($conn,"SELECT * from customer WHERE username = '$username' ");
    $row = mysqli_fetch_assoc($result);
    $avt = $row['avt'];
    global $page;
 
    ?>



<div class="header">
        <div class="logo">
            <a href="home.php">
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
                <a href="home.php" class=<?php echo ($page == 'home')? "active": ""?>>Trang chủ</a>
                <a href="<?php 
                    if($isadmin){
                        echo 'allProducts-03.php';
                    }
                    else{
                        echo 'allProducts-02.php';
                    }
                ?>">Sản phẩm</a>
                <a href="news.php">Tin tức</a>
                <!-- <a href="contact.php">Liên hệ</a> -->
                <!-- <a href="cart.php">Giỏ hàng</a> -->
                <?php
                if(!$isadmin){?>
                
                <a href="cart.php">Giỏ hàng</a>
                    <?php
                }
                
                ?>
            </nav>
            <div class="fas fa-list-ul icon menu-icon"></div>
            <div class="fas fa-search icon search-icon"></div>

            <!-- ACCOUNT -->

            <?php
                if($isadmin){?>
                 <div class="avt"> <img src="<?php echo $avt ?>"/>
                        <div class="list-action">
                            <a href="./profile.php">Thông tin cá nhân</a>
                            <a href = "./addNewProduct.php">Thêm sản phẩm</a>
                            <a href="logout.php" >Đăng xuất</a>

                        </div>
                    </div>
                    <?php
                }else{ ?>
                  <div class="avt"> <img src="<?php echo $avt ?>"/>
                        <div class="list-action">
                            <a href="./profile.php">Thông tin cá nhân</a>
                            <a href="logout.php" >Đăng xuất</a>
                        </div>
                    </div>
                <?php
                }
            ?>
        
        </div>
        <script src="js/header.js"></script>
</div>