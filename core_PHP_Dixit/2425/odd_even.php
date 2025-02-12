<?php 

function checkNo($number){
        if($number % 2 == 0 ){
            echo "Your Number Is $number : Even<br>";
        }
        else{
           echo "Your Number Is $number : odd <br>";
        }
}

checkNo(50);
checkNo(23);
checkNo(70);
checkNo(99);

?>