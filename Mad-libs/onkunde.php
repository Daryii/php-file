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
        <h2>Onkunde</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $kunnen = $_POST["kunnen"];
            $persoon = $_POST["persoon"];
            $getal = $_POST["getal"];
            $beste_eigenschap = $_POST["beste_eigenschap"];
            $vakantie = $_POST["vakantie"];
            $slechte_eigenschap = $_POST["slechte_eigenschap"];
            $overkomen = $_POST["overkomen"];

            if (empty($kunnen) || empty($persoon) || empty($getal) || empty($beste_eigenschap) || empty($vakantie) || empty($slechte_eigenschap) || empty($overkomen)) {
                echo "<p>Alle velden zijn verplicht.</p>";
            } else {
                $result = "Er zijn veel mensen die niet kunnen " .$kunnen.". Neem nou " .$persoon. ". Zelf met de hulp <br/>" ;
                $result .= "van een " .$vakantie. " of zelfs " .$getal. " kan " .$persoon. " niet " .$kunnen."." ;
                $result .= "Dat heeft niet te maken met <br/> een gebrek aan " .$beste_eigenschap. ", maar met een te veel aan ".$slechte_eigenschap.". Te veel aan ".$slechte_eigenschap. "<br/>";
                $result .= "leidt tot ".$overkomen. " en dat is niet goed als je wilt ".$kunnen.". Helaas voor ".$persoon.".";

                echo "<p>" . $result . "</p>";
            }
        }
        ?>

        <a href="onkunde.html">Terug naar Onkunde </a>
    </main>

    <footer>
        <p>Deze website is gemaakt door Daryi.</p>
    </footer>
    
</body>
</html>