<!-- jouw HTML voor een Header komt hier... 
Gebruik hier tenminste een header afbeelding en een menu
Zorg dat je in het menu bij elk item een url parameter zet
om te bepalen welke inhoud er ingeladen moet worden in je html
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
    <header>
        <img class="headerimg" src="images/header.jpg" alt="Headerfoto">
        <nav>
        <ul>
            <?php
                // Fetch all items from the database to populate the navigation menu
                $menuQuery = $conn->prepare('SELECT id FROM onderwerpen');
                $menuQuery->execute();
                $menuItems = $menuQuery->fetchAll(PDO::FETCH_ASSOC);

                // Display each menu item with a generic link
                foreach ($menuItems as $index => $menuItem) {
                    echo '<li><a href="index.php?id=' . $menuItem['id'] . '">nav' . ($index + 1) . '</a></li>';
                }
            ?>
        </ul>
    </nav>
    </header>
</body>
</html>


