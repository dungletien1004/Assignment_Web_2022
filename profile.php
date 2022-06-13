<?php session_start(); 
include "./db/connectdb.php";
global $conn;
 $username = $_SESSION['username'];
 $avt = $_SESSION['avt'];
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

    <link rel="stylesheet" href="./css/profile.css" />
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/base.css">
    <title>Profile</title>
    <script src="./js/profile.js"></script>
    <script src="./js/upload.js"></script>
  </head>
  <body>
    <!-- Header -->
    <?php include 'components/header.php' ?>
    <!-- CONTENT -->
    <div class="wrapper">
      <h1 class="wapper_title">Hồ sơ của tôi</h1>
      <form action="profile_submit.php" method="post" enctype="multipart/form-data" >
        <div class="wrapper_group" >
        <div class="wrapper_content">
          <div class="wrapper_card">
            <h2 class="content_title">Tên đăng nhập :</h2>
            <input
              type="text"
              name="username"
              readonly = "readonly"
             <?php
             echo "value = '$username'";
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
             echo "value = '$fullname'";
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
             echo "value = '$email'";
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
              id="input4"
              class="content_input"
              <?php
             echo "value = '$phone'";
             ?>

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
             echo "value = '$bdate'";
             ?>

            />
          </div>
        </div>
        <div class="wrapper_line"></div>
       <!-- <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post" enctype="multipart/form-data">
       <div class="wrapper_img">
          <img
            src="<?php echo $avt; ?>"
            alt=""
            class="my_img"
          />
          <input type="file" name="img" id="fileToUpLoad" >
          <input type="submit" value="Lưu ảnh" name="guithongtin" class="img_button">
        </div>
       </form> -->
       
 <!-- Upload image -->
      <div class="upload_img">                                   
          <div class="update_img">
            <div class="TgSfgo">
                <?php 
                    $sql = "SELECT * from customer WHERE username = '$username' ";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    if (empty($row['avt'])) : 
                        
                ?>
                <img src="img/avt/avt1.png" onClick="triggerClick()" class="my_img" id="profileDisplay">
                <?php else : ?>
                <img class="my_img" src="<?php echo $row['avt'] ?>" alt="<?php echo $row['username']; ?>" onClick="triggerClick()" id="profileDisplay">
                <?php endif; ?>
            </div>
          </div>
          <input type="file" accept=".jpg,.jpeg,.png" name="profileImage" onChange="displayImage(this)" alt="<?php echo $row['name']; ?>" id="profileImage" class="form-control" style="display: none;">
          
          
          <span class="text-danger"><?php if(isset($img_error)) echo $img_error; ?></span>
          <div class="_3Jd4Zu">
              <div class="_3UgHT6">Dụng lượng file tối đa 1 MB</div>
              <div class="_3UgHT6">Định dạng: .JPEG, .PNG, .JPG</div>
          </div>
          
          <?php ?>
        </div>
                                    <!-- End upload image -->
      </div>
      <button type="submit" class="save">Lưu</button></form>
    
    </div>
    <!-- FOOTER -->
    <?php include 'components/footer.php'?>

  </body>
</html>
