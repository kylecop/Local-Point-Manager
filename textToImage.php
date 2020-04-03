<!DOCTYPE html>
<?php
//include phpTextToImage class
require_once 'phpTextToImage.php';

//create img object
$img = new phpTextToImage;
?>
<html lang="en">
    <head>
        <title>Convert Text To Image In PHP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h2 class="text-danger">Convert Text To Image In PHP</h2>
            <h4>Refresh Your Page To Change Color</h4>
            <?php
            //create image from text
            $text = 'Welcome to Legend Blogs.\nConvert Text To Image In PHP.';
            $img->createImage($text);
            //display image
            
            $fileName = "legendblogs";
            $img->saveAsPng($fileName);
            
            ?>
            <img src="<?php echo $fileName; ?>.png" />
        </div>

    </body>
</html>
