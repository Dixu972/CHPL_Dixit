<?php

class sum{

    public $num1;
    public $num2;

    function get_value($num1,$num2){
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    function ans(){
        return $this->num1 + $this->num2;
    }
}

$obj= new sum();
$obj->get_value(5,7);
echo "Your Two Values Sum is :" . $obj->ans();


?>