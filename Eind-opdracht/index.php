<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Eind_opdracht</title>
</head>
<body>
    <?php
    function fotoVerander($imagePath)
    {
        // Read the image file and assign its contents to a variable
        $imageData = file_get_contents($imagePath);

        // Output the image data as base64
        $imageBase64 = base64_encode($imageData);

        return $imageBase64;
    }

    date_default_timezone_set('Europe/Amsterdam');
    $tijd = date('H:i:s', time());

    $imageBase64 = '';
    $newImagePath = '';
    
    if ($tijd >= '06:00:00' && $tijd <= '12:00:00') {
        $newImagePath = '/var/www/Eind-opdracht/images/morning.png';
        $imageBase64 = fotoVerander($newImagePath);
        echo 'Goede morgen!<br>Het is nu'.$tijd;    

    } else if ($tijd >= '12:00:00' && $tijd < '18:00:00') {
        $newImagePath = '/var/www/Eind-opdracht/images/afternoon.png';
        $imageBase64 = fotoVerander($newImagePath);
        echo 'Goede Middag!<br>Het is nu'.$tijd;  

    } else if ($tijd >= '18:00:00' && $tijd <= '00:00:00') {
        $newImagePath = '/var/www/Eind-opdracht/images/evening.png';
        $imageBase64 = fotoVerander($newImagePath);
        echo 'Goede Avond!<br>Het is nu'.$tijd;

    } else {
        $newImagePath = '/var/www/Eind-opdracht/images/night.png';
        $imageBase64 = fotoVerander($newImagePath);
        echo '<p class="nachtFoto">Goede nacht!<br>Het is nu '.$tijd.'</p>'; 
    }
    ?>

    <img src="data:image/png;base64,<?php echo $imageBase64; ?>" alt="Image">
</body>
</html>
