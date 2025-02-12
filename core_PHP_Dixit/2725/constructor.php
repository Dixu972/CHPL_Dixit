<?php

class marks
{

    public $maths, $science, $physics;

    function __construct($maths, $science, $physics)
    {
        $this->maths = $maths;
        $this->science = $science;
        $this->physics = $physics;
    }

    function maths()
    {
        return $this->maths;
    }
    function physics()
    {
        return $this->physics;
    }
    function science()
    {
        return  $this->science;
    }
}

$obj = new marks(75,89,98);
echo "Your science Marks is : " . $obj->science() ."<br>";
echo "Your physics Marks is : " . $obj->physics() ."<br>";
echo "Your maths Marks is : " .   $obj->maths();


?>