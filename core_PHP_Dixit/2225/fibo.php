<?php

echo "Fibonacci series of 1 to 20<br>";

$a=0;
$b=1;

for($i=1 ; $i<=20 ; $i++){
    echo "$a <br>";

    $new = $a + $b;

    $a=$b;
    
    $b=$new;
}


?>