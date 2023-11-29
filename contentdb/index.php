<?php 
    include('db/connection.php'); 

    $selectedId = isset($_GET['id']) ? $_GET['id'] : 1;

    $stmt = $conn->prepare('SELECT * FROM onderwerpen WHERE id = :selectedId');
    $stmt->bindParam(':selectedId', $selectedId); // Bind the parameter
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch instead of setFetchMode

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>J2F1BELP5L2 - Content uit je database</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- laad hier via php je header in (vanuit je includes map) -->
    <?php include('includes/header.php'); ?>
    <!-- Haal hier uit de URL welke pagina uit het menu is opgevraagd. Gebruik deze om de content uit de database te halen. -->

    <div id="content">
        <?php
            // Controleer of er resultaten zijn
            if ($result) {
                echo '<h2 class="pstyle">' . $result['name'] . '</h2>';
                echo '<p class="pstyle">' . $result['description'] . '</p>';
                echo '<img src="' . $result['image'] . '" alt="' . $result['name'] . '">';
            } else {
                echo '<p>Geen resultaten gevonden.</p>';
            }
        ?>
    </div>
    <!-- Laat hier de content die je op hebt gehaald uit de database zien op de pagina. -->


    <!-- laad hier via php je footer in (vanuit je includes map)-->
    <?php include('includes/footer.php'); ?>


</body>
</html>
