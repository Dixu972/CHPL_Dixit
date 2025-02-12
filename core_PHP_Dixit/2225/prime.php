<?php

echo "Prime Number Between 1 to 50.<br> ";

for ($i = 2; $i <= 50; $i++) {
    $prime_no = true;
    for ($j = 2; $j < $i; $j++) {
        if ($i % $j == 0) {
            $prime_no = false;
            break;
        }
    }
    if($prime_no){
        echo "<b>$i</b> <br>";
    }

}


?>