<?php 

require_once 'models/NASA-API.php';

    //call the function
    $api = New Buzz();
    $episodes = $api->getEp();
    //$result[ "node" ]->created;
 

    $date = $episodes->date;
    $dateTime = new DateTime($date);
    
    $formatDate = $dateTime->format('M d Y');
    $img = $episodes->url;
    $imgHD = $episodes->hdurl;
    $info = $episodes->explanation;
    $title = $episodes->title;
    //echo($formatDate);
    //print_r($episodes)
    //var_dump($imgHD);
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

</head>
<body>
    <div id="site-container">
        <h1>Picture of the Day for <?php echo $formatDate; ?></h1>
        <h3 id="img-title"><?php echo $title ?></h3>
        <div id="image-container">
            <?php 
            echo "<img id='space-pic' src=$img alt='APOD IMAGE OF THE DAY'>"; ?>
            <div>
                <button>Like <i class="far fa-heart"></i></button>
                <a href=<?php echo $imgHD ?>><button>See image in HD</button></a>
                
                <!--
                    != like -> star outline
                    = like -> filled star
                -->
            </div>
            
            <h2>About this image: </h2>
            <p><?php echo $info ?></p>
        </div>
    </div>

</body>
</html>




