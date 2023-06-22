<!DOCTYPE html>
<html>
<head>
    <title>Resultaat</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.html">Er heerst paniek...</a>
            <a href="onkunde.html">Onkunde</a>
        </nav>
    </header>
    <main>
        <h2>Er heerst paniek</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $huisdier = $_POST["huisdier"];
            $persoon = $_POST["persoon"];
            $land = $_POST["land"];
            $verveelt = $_POST["verveelt"];
            $speelgoed = $_POST["speelgoed"];
            $spijbel = $_POST["spijbel"];
            $geld = $_POST["geld"];
            $bezigheid = $_POST["bezigheid"];

            if (empty($huisdier) || empty($persoon) || empty($land) || empty($verveelt) || empty($speelgoed) || empty($spijbel) || empty($geld) || empty($bezigheid)) {
                echo "<p>Alle velden zijn verplicht.</p>";
            } else {
                $print = "Er heerst paniek in het koningrijk ".$land.". Koning ".$spijbel. " Is ten einde raad en als koning <br>".$spijbel. "ten einde raads is, dan roept hij zijn ten-einde-raadscheer ".$persoon. "</br> </br>";
                $print .= '"' .$persoon. "! Het is een ramp! Het is een schande!".'" </br> </br>';
                $print .= '"Sire, Majesteit, Uwe Luidruchtigheid, wat is er aan de hand?" </br> </br>'                   ;
                $print .= '"Mijn ' .$huisdier. " is verdwenen! Zo maar, zonder waarschuwing. En ik had net " .$speelgoed. ' voor hem </br> gekocht!" </br> </br>';
                $print .= '"Majesteit, uw '.$huisdier.' komt vanzelf weer terug?" </br> </br>';
                $print .= '"Ja, da s leuk en aardig, maar hoe moet ik in de tussentijd '.$bezigheid.' leren?" </br> </br>';
                $print .= '"Maar sire, daar kunt u toch uw '.$geld.'voor gebruiken" </br> </br>';
                $print .=   '"'.$persoon.', je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had" </br> </br>';
                $print .= '"'.$verveelt.', Sire." </br> </br>';
                echo "<p>" . $print . "</p>";
            }
            
        }
        ?>
    </main>

    <footer>
        <p>Deze website is gemaakt door Daryi.</p>
    </footer>
    
</body>
</html>