<?php

$voornaam = 'Daryi ';
$achternaam = 'Woldeghiorhis ';

$foto = 'apple.jpg';

$randomtekst = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem deleniti quidem quae? Nesciunt qui quo, ullam eos, modi delectus vitae ducimus pariatur omnis autem at doloribus? Nostrum voluptas ducimus eos.
';

for ($x = 0; $x < 10; $x++){
    echo '<br><br>';
    echo $voornaam,$achternaam,$x;
    echo '<br>';
    echo '<img src="' . $foto . '" alt=Apple">';
    echo '<br>';
    echo $randomtekst;
}


?>