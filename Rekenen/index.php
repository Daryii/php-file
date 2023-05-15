<?php

function rekenen($getal){
    for($x = 1 ; $x <=10; $x++){
        $antwoord = $x * $getal;
        echo "$x * $getal = $antwoord <br>";
    }
    echo "<br>";
}   

$numbers = array(3,5,8,12);

foreach($numbers as $value){
    rekenen($value) ;
}
?>      
