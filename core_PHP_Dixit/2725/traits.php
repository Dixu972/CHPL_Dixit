<?php

// trait for using multiple inheritance
trait Collage
{
    public function hello()
    {
        echo "Hello BAOU !";
    }
}


trait Name
{
    public function show()
    {
        echo " Dixit <br>";
    }
}

class Sample
{
    use Collage;  // for access 
    use Name;
    public function Display()
    {
        echo "Thanks For Using Trait Method !";
    }
}

$test = new Sample();
$test->hello();
$test->show();
$test->Display();
