<?php
include "../connectdb.php";
global $conn;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <title>Sign up Page</title>
  </head>
  <body>
    <!-- Header -->
    <div class="header">
      <div class="logo">
        <img src="./assets/img/clothes.png" alt="" class="logo_img" />
        <a href="./login.html" class="link"
          ><div class="logo_content">BKU <span>Team</span></div></a
        >
      </div>
    </div>
    <div class="login_container">
      <div class="login_content">
        <div class="group_title">
          <a href="../login/login.php" class="title_login">Đăng nhập</a>
          <p class="title_signup">Đăng ký</p>
        </div>
        <div class="login_title">Đăng ký</div>
        <?php          
        if($_POST){
          if(isset($_POST['submit']) && $_POST["fullname"] != ''&& $_POST["username"] != '' && $_POST["password"] != '' && $_POST["repassword"] != '' && $_POST['checkbox']  != ''){
            $fullname = $_POST["fullname"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
            $checkbox = $_POST['checkbox'];
            if($password != $repassword){
              echo '<p style = "color:red ;margin-left:10%;">Mật khẩu không trùng khớp </p>';
            }
            elseif(strlen($password) < 6){
              echo '<p style = "color:red ;margin-left:10%;">Vui lòng nhập mật khẩu tối thiểu 6 ký tự</p>';

            }
            else{
              $sql = "SELECT * from customer WHERE username = '$username' ";
              $old = mysqli_query($conn,$sql);
              if(mysqli_num_rows($old)){
                echo '<p style = "color:red ;margin-left:10%;">Tên đăng nhập đã tồn tại</p>';
              }
              else{
                echo '<p style = "color:red ;margin-left:10%;">Đăng ký thành công</p>';
                $new_sql =  "INSERT INTO `customer` (fullname,username,password) values ('$fullname','$username','$password')";
                mysqli_query($conn,$new_sql);
              }
            }
          }
          else{

            echo '<p style = "color:red ;margin-left:10%;">Vui lòng nhập thông tin </p>';
          }

        } 
        ?>
        <form action="signup.php" method="post" class="form_signup" id="form-1">
          <div class="login_input">
            <div class="col-3">
              <input
                class="effect-1"
                type="text"
                name="fullname"
                placeholder="Họ và tên"
                id="fullname"
              />
              <span class="focus-border"></span>
              <span class="form-message"></span>
            </div>
            <div class="col-3">
              <input
                class="effect-1"
                type="text"
                name="username"
                placeholder="Tên đăng nhập"
                id="username"
              />
              <span class="focus-border"></span>
              <span class="form-message"></span>
            </div>
            <div class="col-3">
              <input
                class="effect-1"
                type="password"
                name="password"
                placeholder="Mật khẩu"
                id="pass"
              />
              <span class="focus-border"></span>
              <span class="form-message"></span>
            </div>
            <div class="col-3">
              <input
                class="effect-1"
                type="password"
                name="repassword"
                placeholder="Nhập lại mật khẩu"
                id="re-pass"
              />
              <span class="focus-border"></span>
              <span class="form-message"></span>
            </div>
          </div>
          <div class="confirm">
            <input type="checkbox" name="checkbox" id="checkbox" />
            <label for="checkbox">Tôi đồng ý với điều khoản</label><br />
          </div>

          <button class="login_button" type="submit" name="submit">
            <p class="button_text">Đăng Ký</p>
          </button>
        </form>
      </div>
      <div class="login_img">
        <img src="./assets/img/logo.png" alt="" class="img_logo" />
      </div>
    </div>
    <script src="./assets/js/signup.js"></script>
    <script>
      Validator({
        form: "#form-1",
        error: ".form-message",
        rules: [
          Validator.isRequired("#fullname"),
          Validator.isUsername("#username"),
          Validator.isPass("#pass", 6),
          Validator.isConfirmed(
            "#re-pass",
            function () {
              return document.querySelector("#form-1 #pass").value;
            },
            "Mật khẩu không trùng khớp"
          ),
        ],
      });
    </script>
  </body>
</html>