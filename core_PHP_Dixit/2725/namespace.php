<?php

namespace Divided;

function result($num1,$num2)
{
    echo "Your Answer Is : " . $num1 / $num2 ;
}

function welcome(){
    echo "Welcome Dixit ";
}

use Divided;

Divided\result(10,25);
echo "<br>";
Divided\welcome();

?>
