<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>welcome</title>
</head>
<body>
<?php
    if (isset($_GET['naam']) && isset($_GET['email'])) {
        $naam = $_GET['naam'];
        $email = $_GET['email'];

        echo "<h1>De ingevulde gegevens zijn:</h1>";
        echo 'Naam: ' . $naam . "<br>";
        echo 'E-mail: ' . $email;
    } else {
        echo "<h1>Geen gegevens ontvangen</h1>";
    }
    ?>
</body>
</html>
