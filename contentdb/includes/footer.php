<!-- jouw HTML voor een Footer komt hier... 
Benoem hier ten minste je naam en de tijd
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <footer>
        <p>Gemaakt door Daryi</p>
        <P>Huidige tijd: <?php date_default_timezone_set('Europe/Amsterdam'); echo date("H:i:s, d M Y"); ?></P> 
    </footer>
</body>
</html>
