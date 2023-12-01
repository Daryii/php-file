<<?php include ('db/connection.php'); 

    $query = "SELECT * FROM characters ORDER BY name";
    $stmt = $conn->query($query);

    $characters = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header><h1>Alle <?php echo count($characters); ?> characters uit de database</h1>

</header>

<div id="container">
    
    <div class="left-container">
        <?php
        $leftCharacters = array_slice($characters, 0, 5); 
        foreach ($leftCharacters as $character):
        ?>
            <a class="item" href="character.php?id=<?php echo $character['id']; ?>">
            <div class="left">
            <img class="avatar" src="resources/images/<?php echo $character['avatar']; ?>">
        </div>
        <div class="right">
            <h2><?php echo $character['name'];?></h2>
            <div class="stats">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span><?php echo $character['health']; ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span><?php echo $character['attack']; ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span><?php echo $character['defense']; ?></li>
                </ul>
            </div>
        </div>
        <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="right-container">
        <?php
        $rightCharacters = array_slice($characters, 5); 
        foreach ($rightCharacters as $character):
        ?>
            <a class="item" href="character.php?id=<?php echo $character['id']; ?>">
            <div class="left">
            <img class="avatar" src="resources/images/<?php echo $character['avatar']; ?>">
        </div>
        <div class="right">
            <h2><?php echo $character['name'];?></h2>
            <div class="stats">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span><?php echo $character['health'];?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php echo $character['attack'];?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php echo $character['defense'];?></li>
                </ul>
            </div>
        </div>
        <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="clear"></div>
</div>
<footer>&copy; [Daryi] 2023</footer>
</body>
</html>

