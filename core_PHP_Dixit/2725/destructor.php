<?php

class Destructor
{

    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function __destruct(){
        echo "This is Destruct function for script stopped.";
    }
}

$obj = new Destructor("Dixit"); 


?>
