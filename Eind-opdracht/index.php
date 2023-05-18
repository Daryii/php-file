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

    if ($tijd >= '00:06:00' && $tijd <= '00:12:00') {
        $imagePath = '/var/www/Eind-opdracht/image/morning.png';
        $imageBase64 = fotoVerander($imagePath);
    } else if ($tijd >= '00:12:00' && $tijd <= '00:18:00') {
        $imagePath = '/var/www/Eind-opdracht/image/afternoon.png';
        $imageBase64 = fotoVerander($imagePath);
    }
    ?>

    <img src="data:image/png;base64,<?php echo $imageBase64; ?>" alt="Image">
</body>
</html>
