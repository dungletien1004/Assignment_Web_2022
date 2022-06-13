<?php
include "./connectdb.php";
global $conn;
if(isset($_POST["submit"]))
{
    $target_dir = "/img/avt/";
    $file = $_FILES['fileToUpload']['name'];
    $target_file = $target_dir . $file;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
        if($check !== false) {
            echo $target_file;
            $uploadOk = 1;
            header("Location: ./trangchu.php");
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
}
else{
  header("Location: ./news.php");;
}
?>