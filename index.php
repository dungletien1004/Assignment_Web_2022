<?php
    global $page;
    $page = "home";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/home.css">
    <!-- <link rel="stylesheet" href="./assets/css/home.css"> -->
    
    <title>Fashion Shop</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'components/header.php' ?>
    <!-- SLIDER -->
    <div class="swiper slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background: url(./img/slider/slide-1.jpg) top center / cover no-repeat;">
                <div class="content">
                    <div class="text">
                        <div class="heading">SUMMER OUTFIT</div>
                    </div>
                    <a href="#" class="slide-btn">View detail</a>
                </div>
            </div>
            <div class="swiper-slide slide" style="background: url(./img/slider/slide-2.jpg) top center / cover no-repeat;">
                <div class="content">
                    <div class="text">
                        <div class="heading">SALE OFF</div>
                    </div>
                    <a href="#" class="slide-btn">View detail</a>
                </div>
            </div>
            <div class="swiper-slide slide" style="background: url(./img/slider/slide-3.jpg) top center / cover no-repeat;">
                <div class="content">
                    <div class="text">
                        <div class="heading">FOR WOMEN</div>                    
                    </div>
                    <a href="#" class="slide-btn">View detail</a>
                </div>
            </div>
            
            
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        
    </div>
    

    

    <!-- TOP SALE -->
    <!-- <div class="top-sale">
        <div class="heading">BEST SELLER</div>
        <div class="swiper top-products">
            <div class="swiper-wrapper">
                
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </div> -->
    
    <!-- ABOUT US -->
    <div class="about">
        <div class="img"><img src="img/about.jpg" alt=""></div>
        <div class="content">
            <h2>Welcome to our clothes shop!</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi optio at, saepe accusamus dolorum, quos eos nesciunt amet exercitationem illum quis nostrum, repellat quaerat eum debitis fugit alias magnam omnis!</p>
            <button class="viewProduct"><a href="listProduct">Xem sản phẩm</a></button>
            <div class="standard">
                <div class="standard-item">
                    <img src="img/standard/clothes.png" alt="Clothes">
                    <span>Chất lượng cao</span>
                </div>
                <div class="standard-item">
                    <img src="img/standard/delivery.png" alt="Delivery">
                    <span>Giao hàng nhanh</span>
                </div>
                <div class="standard-item">
                    <img src="img/standard/brand.png" alt="Brand">
                    <span>Nhãn hàng nổi tiếng</span>
                </div>
            </div>
        </div>
    </div>

    
    <!-- ORDER -->
    <div class="order">
        <div class="heading-order">ĐẶT HÀNG</div>
        <h4>Bạn có thể đặt hàng mà không cần đăng kí tài khoản</h4>
        <form action="" method="POST">
            <div class="box-container">

                <div class="box">
                    <div class="input-data">
                        <label for="name">Họ tên:</label>
                        <input name="name" id="name" type="text" placeholder="Nhập tên...">
                    </div>
                    <div class="input-data">
                        <label for="name">Tên sản phẩm:</label>
                        <input name="product" id="product" type="text" placeholder="Nhập sản phẩm...">
                    </div>
                    <div class="input-data">
                        <label for="note">Ghi chú kèm theo:</label>
                        <input name="note" id="note" type="text" placeholder="Nhập ghi chú...">
                    </div>
                    <div class="input-data">
                        <label for="address">Địa chỉ:</label>
                        <input id="product" type="text" placeholder="Nhập địa chỉ...">
                    </div>
                </div>
                <div class="box">
                    <div class="input-data">
                        <label for="number">Số lượng sản phẩm:</label>
                        <input name="number" id="number" type="number" placeholder="Nhập số lượng...">
                    </div>
                    <div class="input-data">
                        <label for="phone">Số điện thoại:</label>
                        <input name="phone" id="phone" type="text" placeholder="Nhập số điện thoại...">
                    </div>
                    <div class="input-data">
                        <label for="email">Email:</label>
                        <input name="email" id="email" type="email" placeholder="Nhập email...">
                    </div>
                    <div class="input-data">
                        <span>Địa chỉ của chúng tôi:</span>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4946681007846!2d106.65843061471834!3d10.773374292323565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec3c161a3fb%3A0xef77cd47a1cc691e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIC0gxJDhuqFpIGjhu41jIFF14buRYyBnaWEgVFAuSENN!5e0!3m2!1svi!2s!4v1654700345659!5m2!1svi!2s" width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    
                </div>
            </div>
            <button type="submit" class="submitOrder">Gửi đơn hàng</button>
        </form>

    </div>
    
    <!-- FOOTER -->
    <?php include 'components/footer.php'?>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./js/home.js"></script>
</body>
</html>
