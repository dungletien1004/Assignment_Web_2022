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
    <title>Login Page</title>
    
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
          <p class="title_login">Đăng nhập</p>
          <a href="../signup/signup.php" class="title_signup">Đăng ký</a>
        </div>
        <div class="login_title">Đăng nhập</div>
        <?php     
        session_start();     
        if($_POST){
          $user_name = $_POST['user_name'];
          $user_pass = $_POST['user_pass'];
          $result = mysqli_query($conn,"SELECT * from customer WHERE username = '$user_name' and password = '$user_pass' ");
          $row = mysqli_fetch_assoc($result);
          if($row){
            $check = $row['admin'];
            
            if($check == 0){
              $_SESSION['username'] = $user_name; 
              header("Location: ../profile/profile.php");
            }
            else{
              header("Location: ../news.html");
            }
          }else{
            echo '<p style = "color:red ;margin-left:10%;">Tên đăng nhập hoặc mật khẩu không đúng </p>';
          }
        } 
        ?>
        <form action="login.php" method="post" class="login_input">
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Tên đăng nhập" name="user_name"/>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="password" placeholder="Mật khẩu" name="user_pass" />
            <span class="focus-border"></span>
          </div>
          <p class="reset_pass">Quên mật khẩu?</p>
          <button class="login_button" type="submit" name="login">
          <p class="button_text">Đăng nhập</p>
        </button>
        </form>

        
      </div>
      <div class="login_img">
        <img src="./assets/img/logo.png" alt="" class="img_logo" />
      </div>
    </div>
  </body>
</html>
