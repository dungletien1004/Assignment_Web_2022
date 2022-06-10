<?php session_start(); 
include "../connectdb.php";
global $conn;
 $username = $_SESSION['username'];
 $result = mysqli_query($conn,"SELECT * from customer WHERE username = '$username'");
 $row = mysqli_fetch_assoc($result);
 $fullname = $row['fullname'];
 $email = $row['email'];
 $phone = $row['phone'];
 $gender = $row['gender'];
 $bdate = $row['bdate'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />

    <link rel="stylesheet" href="./assets/css/style.css" />
    <title>Profile</title>
  </head>
  <body>
    <!-- Header -->
    <div class="header">
      <div class="logo">
        <a href="./index.html">
          <img src="./assets/img/Logo.png" alt="" />
          <div class="logo-text">BKU <span>Team</span></div>
        </a>
      </div>
      <div class="search-bar">
        <label for="search-box" class="fas fa-search"></label>
        <input
          type="search"
          name=""
          placeholder="Type to search..."
          id="search-box"
        />
      </div>
      <div class="nav">
        <nav class="nav-bar">
          <a href="" style="color: black">Trang chủ</a>
          <a href="">Sản phẩm</a>
          <a href="">Tin tức</a>
          <a href="">Liên hệ</a>
          <a href="">Giỏ hàng</a>
        </nav>
        <div class="fas fa-list-ul icon menu-icon"></div>
        <div class="fas fa-search icon search-icon"></div>
        <div class="fas fa-user icon user-icon"></div>
      </div>
    </div>
    <!-- CONTENT -->
    <div class="wrapper">
      <h1 class="wapper_title">Hồ sơ của tôi</h1>
      <form action="profile_submit.php" method="post"><div class="wrapper_group">
        <div class="wrapper_content">
          <div class="wrapper_card">
            <h2 class="content_title">Tên đăng nhập :</h2>
            <input
              type="text"
              name="username"
              readonly = "readonly"
             <?php
             echo "value = $username";
             ?>
              id="input1"
              class="content_input"
            />
          </div>

          <div class="wrapper_card">
            <h2 class="content_title">Họ và tên :</h2>
            <input
              type="text"
              name="fullname"
              <?php
             echo "value = $fullname";
             ?>
              id="input2"
              class="content_input"
            />
          </div>

          <div class="wrapper_card">
            <h2 class="content_title">Email :</h2>
            <input
              type="email"
              name="email"
              <?php
             echo "value = $email";
             ?>
              id="input3"
              class="content_input"
            />
          </div>

          <div class="wrapper_card">
            <h2 class="content_title">Số điện thoại :</h2>
            <input
              type="tel"
              name="phone"
              <?php
             echo "value = $phone";
             ?>
              id="input4"
              class="content_input"
            />
          </div>

          <div class="gender">
            <h2 class="content_title">Giới tính :</h2>
            <input
              type="radio"
              id="Male"
              name="gender"
              value="Male"
              <?php
              if($gender == 'Male'){
                echo "checked";
              }
              ?>
            />
            <label for="Male">Nam</label><br />
            <input type="radio" id="Female" name="gender" value="Female" 
             <?php
              if($gender == 'Female'){
                echo "checked";
              }
              ?> 
              />
            <label for="Female">Nữ</label><br />
            <input type="radio" id="Others" name="gender" value="Others" 
            <?php
              if($gender == 'Others'){
                echo "checked";
              }
              ?>
            />
            <label for="Others">Khác</label>
          </div>
          <div class="birthday">
            <h2 class="content_title">Ngày sinh :</h2>
            <input
              type="date"
              id="birthday"
              name="bdate"
              <?php
             echo "value = $bdate";
             ?>

            />
          </div>
        </div>
        <div class="wrapper_line"></div>
        <div class="wrapper_img">
          <img
            src="./assets/img/273174434_2138400876310866_2065875880148628438_n.jpg"
            alt=""
            class="my_img"
          />
          <button class="img_button">Chọn ảnh</button>
        </div>
       
      </div>
      <button type="submit" class="save">Lưu</button></form>
    </div>
    <!-- FOOTER -->
    <div class="footer container">
      <div class="row">
        <div class="col-sm-6 col-footer">
          <div class="contact">
            <div class="logo">
              <a href="./index.html">
                <img src="./assets/img/Logo.png" alt="" />
                <div class="logo-text">
                  <span style="color: #e70e0e">BKU </span> <span>Team</span>
                </div>
              </a>
            </div>
            <a href="#"><i class="fas fa-phone"></i> 123 456 789</a>
            <a href="#"><i class="fas fa-envelope"></i> abc@gmail.com</a>
            <a href="#"
              ><i class="fas fa-map-marker-alt"></i> 123 Trần Phú, Bến Nghé,
              Quận 1, TP.HCM</a
            >
          </div>
          <div class="list-service">
            <span>Chăm sóc khách hàng</span>
            <a href="#">Hướng dẫn mua hàng</a>
            <a href="#">Thanh toán</a>
            <a href="#">Vận chuyển</a>
            <a href="#">Chính sách hoàn tiền</a>
          </div>
        </div>
        <div class="col-sm-6 col-footer">
          <div class="list-service">
            <span>Dịch vụ</span>
            <a href="#">Khuyến mãi</a>
            <a href="#">Đăng kí thành viên</a>
            <a href="#">Giảm giá</a>
            <a href="#">Giao hàng tận nơi</a>
          </div>
          <div class="download">
            <span>Tải ứng dụng</span>
            <a href="#"><img src="./assets/img/QRcode.png" alt="" /></a>
          </div>
        </div>
      </div>
      <div class="social">
        <div class="social-icon">
          <div><a href="#" class="fab fa-instagram icon"></a></div>
          <div><a href="#" class="fab fa-github icon"></a></div>
          <div><a href="#" class="fab fa-facebook-f icon"></a></div>
          <div><a href="#" class="fab fa-twitter icon"></a></div>
          <div><a href="#" class="fab fa-linkedin-in icon"></a></div>
        </div>
        <hr />
        <span>All right reserved</span>
      </div>
    </div>
    <script src="./assets/js/main.js"></script>
  </body>
</html>
