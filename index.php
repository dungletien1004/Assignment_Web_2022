<?php
    include_once 'db/connectdb.php';
    global $conn;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- <link rel="stylesheet" href="./assets/css/home.css"> -->
    
    <script>
        function addContact() {
            $('form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'be/addContact.php',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data)
                    }
                });

            });

        }
    </script>



    <title>Clothes Shop</title>
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
            <label for="search-box" class="fas fa-search"></label>
            <input type="search" name="" placeholder="Type to search..." id="search-box">
        </div>
        <div class="nav">
            <nav class="nav-bar">
                <a href="" style="color:black;">Trang ch???</a>
                <a href="./allProducts-01.php">S???n ph???m</a>
                <a href="#contact">Li??n h???</a>
                <a href="./signup.php">????ng K??</a>
            </nav>
            <div class="fas fa-list-ul icon menu-icon"></div>
            <div class="fas fa-search icon search-icon"></div>
            <a href="./login.php"><div class="fas fa-user icon user-icon"></div></a>
        </div>
    </div>
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
            <button class="viewProduct"><a href="./allProducts-01.php">Xem s???n ph???m</a></button>
            <div class="standard">
                <div class="standard-item">
                    <img src="img/standard/clothes.png" alt="Clothes">
                    <span>Ch???t l?????ng cao</span>
                </div>
                <div class="standard-item">
                    <img src="img/standard/delivery.png" alt="Delivery">
                    <span>Giao h??ng nhanh</span>
                </div>
                <div class="standard-item">
                    <img src="img/standard/brand.png" alt="Brand">
                    <span>Nh??n h??ng n???i ti???ng</span>
                </div>
            </div>
        </div>
    </div>

    
    <!-- ORDER -->
    <div class="contact" id="contact">
        <div class="heading-contact">LI??N H???</div>
        <form action="" method="POST" id="contactForm">
            <div class="box-container">

                <div class="box">
                    <div class="input-data">
                        <label for="name">H??? t??n:</label>
                        <input name="name" id="name" type="text" placeholder="Nh???p t??n...">
                    </div>
                    <div class="input-data">
                        <label for="note">L???i nh???n:</label>
                        <input name="message" id="note" type="text" placeholder="Nh???p l???i nh???n...">
                    </div>
                    <div class="input-data">
                        <label for="address">?????a ch???:</label>
                        <input name="address" id="product" type="text" placeholder="Nh???p ?????a ch???...">
                    </div>
                </div>
                <div class="box">
                    <div class="input-data">
                        <label for="phone">S??? ??i???n tho???i:</label>
                        <input name="phone" id="phone" type="text" placeholder="Nh???p s??? ??i???n tho???i...">
                    </div>
                    <div class="input-data">
                        <label for="email">Email:</label>
                        <input name="email" id="email" type="email" placeholder="Nh???p email...">
                    </div>
                    <div class="input-data">
                        <span>?????a ch??? c???a ch??ng t??i:</span>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4946681007846!2d106.65843061471834!3d10.773374292323565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec3c161a3fb%3A0xef77cd47a1cc691e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIC0gxJDhuqFpIGjhu41jIFF14buRYyBnaWEgVFAuSENN!5e0!3m2!1svi!2s!4v1654700345659!5m2!1svi!2s" width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    
                </div>
            </div>
            <button type="submit" class="submitContact" onclick="addContact()">G???i li??n h???</button>
        </form>

    </div>
    
    <!-- FOOTER -->
    <?php include 'components/footer.php'?>



    
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    
    <script src="./js/home.js"></script>
</body>
</html>
