<?php
function lijst_optellen($numbers) {
    $sum = 0;

    foreach ($numbers as $number){
        if($number % 2 == 0 ){
            $sum += $number;
        }
    }

    return $sum;

}
$getallenLijst = [1, 2, 3, 4];

$result = lijst_optellen($getallenLijst);






function langest_woord_optellen($numbers) {
    $sum = 0;

    foreach ($numbers as $number){
        if(strlen($number) > strlen($sum)){
            $sum = $number;
        }
    }

    return $sum;

}
$getallenLijst = ['kat', 'hond', 'olifant'];

$result = langest_woord_optellen($getallenLijst);

 



function Worden_sorten($numbers) {
    $to_sort = true;
    while ($to_sort) {
        $to_sort = false;
        for ($x = 0; $x < count($numbers) - 1; $x++) {
            if ($numbers[$x] > $numbers[$x + 1]) {
                $temp = $numbers[$x];
                $numbers[$x] = $numbers[$x + 1];
                $numbers[$x + 1] = $temp;
                $to_sort = true;
            }
        }
    }
    return $numbers;
}

$getallenLijst = [33, 2, 4, 11, 66, 0];
$result = Worden_sorten($getallenLijst);
// echo implode(', ', $result);



function gcd($number1,$number2) {

    while($number2 != 0){
        $getal =  $number1 % $number2;
        $number1 = $number2;
        $number2 = $getal;
    }

    return $number1;

}


$result = GCD(15,5);

echo $result;

?>