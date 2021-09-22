<?php 
session_start();

require_once 'models/NASA-API.php';

    //call the function
    $api = New PicOfDay();
    $episodes = $api->getPic();
 
    //Display Data
    $date = $episodes->date;
    $dateTime = new DateTime($date);
    
    $formatDate = $dateTime->format('M d Y');
    $img = $episodes->url;
    $imgHD = $episodes->hdurl;
    $info = $episodes->explanation;
    $title = $episodes->title;


    $_SESSION["likeStatus"] = False;


    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astronomy Image of the Day</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&family=Roboto&display=swap"" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/folder.js"></script>

</head>
<body>
    <div id="site-container">
        <h1>Picture of the Day for <?php echo $formatDate; ?></h1>
        <h3 id="img-title"><?php echo $title ?></h3>
        <div id="image-container">
            <?php 
            echo "<img id='space-pic' src=$img alt='APOD IMAGE OF THE DAY'>"; ?>
            <div id="button-block">
                
                <a href=<?php echo $imgHD ?>><button id="hdLink">See image in HD</button></a>
                <form id="likeForm" method="POST" action="">
                    <input type="submit" id="likeBtn" name="likeBtn" value="Like"/>
                </form>
            <?php
                //Submit Form Result
                if(isset($_POST['likeBtn'])){
                        $msg = "Image liked! &#10084;"	;
                        $_SESSION["likeStatus"] = True;
                        echo $msg;
                    }                  

            ?>
                
            </div>
            <div class="pic-info">
                <h2>About this image: </h2>
                <p><?php echo $info ?></p>
            </div>

        </div>
    </div>

</body>
</html>




