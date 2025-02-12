<?php

interface fruits
{

    public function display($msg);
}

class Show implements fruits
{
    public function  display($msg)
    {
        return " Your Fruit Name is : $msg";
    }
}

class show1 implements fruits{

    public function display($msg){
        return "your 2nd class Fruit Name is : $msg";
    }
}

$obj = new Show();

echo $obj->display("cherry")."<br>";

$obj1=new show1();

echo $obj1->display("grapes")
?>