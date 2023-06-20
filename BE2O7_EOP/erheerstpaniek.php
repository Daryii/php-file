<?php

$question1 = $question2 = $question3 = $question4 =  $question5 = $question6 = $question7 = $question8 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["question1"])) {
        $question1 = test_input($_POST["question1"]);

      }if (isset($_POST["question2"])) {
        $question2 = test_input($_POST["question2"]);

     } if (isset($_POST["question3"])) {
        $question3 = test_input($_POST["question3"]);
       
    } if (isset($_POST["question4"])) {
        $question4 = test_input($_POST["question4"]);

    } if (isset($_POST["question5"])) {
        $question5 = test_input($_POST["question5"]);

    } if (isset($_POST["question6"])) {
        $question6 = test_input($_POST["question6"]);

    } if (isset($_POST["question7"])) {
        $question7 = test_input($_POST["question7"]);

    } if (isset($_POST["question8"])) {
        $question8 = test_input($_POST["question8"]);
    } 
}      
        echo "<h2>Er heerst paniek...:</h2>";

        echo "Er heerst paniek in het koninkrij ".$question3.". Koning ".$question6." is ten einde raad en als koning Egmond ten einde raad is, dan roept hij zijn ten-einde-raadsheer ".$question2.".
        <br><br>
        '".$question2." Het is een ramp! Het is een schande!'
        <br><br>
        'Sire, Majesteit, Uwe Luidruchigheid, wat is er aan de hand?'
        <br><br>
        'Mijn ".$question1." is verdwenen! Zo maar, zonder waarschuwing. En ik had net ".$question5." voor hem gekocht!'
        <br><br>
        'Majesteit, uw ".$question1." komt vast vanzelf weer terug?'
        <br><br>
        'ja, da's leuk en aardig, maar hoe moet ik in de tussentijd ".$question8." leren?'
        <br><br>
        'Maae Sire, daar kunt u toch uw ".$question7." voor gebruiken.'
        <br><br>
        'Spinoza, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had.'
        <br><br>
        '".$question4.", Sire.'
        ";

        echo "<p>Deze website is gemaakt door @Daryi! </p>";


        function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }
?>