<?php
   session_start();
   include 'db/db_connect.php';
   $con = connect();

?>
   


!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
   <link rel="stylesheet" href="css/header.css">
   <link rel="stylesheet" href="css/news.css">
   <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/base.css">
   <title>Document</title>
</head>
<body>

   <!-- HEADER -->
   <?php include 'components/header.php' ?>
   <div class="news container">
     

      
      <?php
         //$query = mysqli_query($con, 'SELECT news.news_id AS pid, news.title AS title, news.sub_title AS sub_title, news.author AS author, news.content AS content, news.postURL AS postURL, news.postImage AS postImage, news.postDate as postDate FROM news');
         $query = 'SELECT * FROM news';
         $result = mysqli_query($con, $query);
         
      ?>
      <div class="news">
         <?php foreach($result as $data): ?>
            

            <div class="news-wrapper">
               <div class="news-item">
                  <div class="image"><img src="<?php echo htmlentities($data['postImage']) ?>" alt=""></div>
                  <div class="sub-content">
                     <span><i class="fas fa-calendar"></i><?php echo htmlentities($data['postDate']) ?></span>
                     <span><i class="fas fa-user"></i><?php echo htmlentities($data['author']) ?></span>
                  </div>
                  <div class="content">
                     <h2><?php echo htmlentities($data['title']) ?></h2>
                     <p><?php echo htmlentities($data['sub_title']) ?> </p>
                     <button><a href="news_detail.php?nid=<?php echo htmlentities($data['news_id']) ?>">Xem chi tiết</a></button>
         
                  </div>
               </div>

            </div>
         
         <?php endforeach; ?>

      </div>
      

   </div>
   <?php include 'components/footer.php' ?>
</body>
</html>