<?php

// parent class 
abstract class fruit
{

    public $fru1, $fru2, $fru3;

    public function __construct($fru1,$fru2,$fru3){
        $this->fru1 =$fru1;
        $this->fru2 =$fru2;
        $this->fru3=$fru3;
    }

    abstract public function display() : string;
}

// child class 
class show extends fruit{
    public function display(): string  {
        return $this->fru1 . "Very Delicious !" ."<br>" . $this->fru2 . " sweet and sour !" ."<br>". $this->fru3 . " A crisp, juicy !";
    }
}

$obj = new show("mango","grapes","apple");
echo $obj->display()
?>