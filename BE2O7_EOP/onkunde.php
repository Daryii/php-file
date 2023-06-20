<?php

$question1 = $question2 = $question3 = $question4 =  $question5 = $question6 = $question7  = "";

$question1eer = $question2eer = $question3eer = $question4eer =  $question5eer = $question6eer = $question7eer  = "";

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
    } 
}      
        echo "<h2>Onkunde:</h2>";

        echo "We zijn veel mensen die niet kunnen ".$question1." Neem nou ".$question2.", Zelf met de hulp van een ".$question4." of zelfs ".$question3." kan ".$question2." niet ".$question1.". Dat heeft niet te maken met een gebrek aan ".$question4.", maar met een te veel aan ".$question5.". Te veel perfectionisme leidt tot ".$question6." en dat is niet goed als je wilt ".$question3.". Helaas voor ".$question7."";
        
        echo "<p>Deze website is gemaakt door @Daryi! </p>";


        function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }


        "<p>Deze website is gemaakt door @Daryi! </p>";

?>