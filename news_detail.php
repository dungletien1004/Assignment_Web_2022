<?php 
    session_start();
    include 'db/db_connect.php';
    $con = connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes Shop - News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/news_detail.css">
</head>
<body>
    <?php include 'components/header.php' ?>
    <div class="news-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                        $pid = intval($_GET['nid']);
                        $query = "SELECT * FROM news WHERE news_id='$pid'";
                        $result = mysqli_query($con, $query);
                        
                    ?>
                    <?php foreach($result as $data): ?>
                    <div class="post">
                        <h1 class="title"><?php echo htmlentities($data['title']) ?></h1>
                        <h4 class="author">Written by <?php echo htmlentities($data['author']) ?></h4>
                        <p class="date"><?php echo htmlentities($data['postDate']) ?></p>
                        <p class="sub-title"><?php echo htmlentities($data['sub_title']) ?></p>
                        <div class="image">
                            <img src="<?php echo htmlentities($data['postImage']) ?>" alt="">
                        </div>
                        <div class="content">
                                <?php $pt=$data['content'];
                                echo (substr($pt,0));?>
                        </div>
                        <button class="originalPost"><a href="<?php echo $data['postURL'] ?>">Xem bài viết gốc</a></button>
                    </div>
                    
                 
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-4">
                    <div class="popular-news">
                        <div class="heading">POPULAR NEWS</div>
                        <?php 
                            $news = 'SELECT news_id, title FROM news';
                            $news_result = mysqli_query($con, $news);
                        ?>
                        <?php foreach($news_result as $data): ?>
                            <span class="news_title">
                                <a href="news_detail.php?nid=<?php echo htmlentities($data['news_id'])?>"><?php echo htmlentities($data['title']) ?></a>
                                <hr/>
                            </span>
                        <?php endforeach; ?>
                    </div>


                </div>
            </div>
            
        </div>

    </div>

    <?php include './components/footer.php' ?>
   

</body>
</html>