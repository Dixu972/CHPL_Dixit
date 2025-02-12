<?php   

class morning{

    public $msg1;
    public $msg2;

    public function morning($msg1){
        echo "Good ". $this->msg1=$msg1;
    }

}

class evening extends morning{
    function msg2($msg2){
        echo "Good ". $this->msg2=$msg2."<br>";
    }
    function msg1($msg1){
        echo  $this->morning($msg1);
    }
}

$obj= new evening();

$obj->msg2("evening");
$obj->msg1("morning");


?>