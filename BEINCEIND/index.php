<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lab 2 - Includes en require</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- laad hier via php je header in (vanuit je includes map) -->
  <?php include 'includes/header.php';?>

  <!-- laad hier via php de juiste contentpagina in (vanuit de pages map) in. Welke geselecteerd moet worden kun je uit de URL halen (URL_Params).-->
  <?php
    // Haal de waarde van de 'onderwerp' URL-parameter op
    $onderwerp = isset($_GET['onderwerp']) ? $_GET['onderwerp'] : 'onderwerp1';

    // Gebruik de waarde van de URL-parameter om de juiste pagina in te laden
    $pagina = "pages/$onderwerp.php";
    
    // Controleer of de pagina bestaat voordat je deze include
    if (file_exists($pagina)) {
      include $pagina;
    } else {
      echo "De opgevraagde pagina bestaat niet.";
    }
  ?>

  <!-- laad hier via php je footer in (vanuit je includes map)-->
  <?php include 'includes/footer.php';?>

</body>
</html>
