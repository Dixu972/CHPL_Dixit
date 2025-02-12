<?php 

class concat{

    public $str1,$str2;

    public static function message($str1,$str2) {
       echo $str1.$str2 ."<br>";
    }

    public function __construct(){
        self::message("Dixit","patel");
    }

}

concat::message("a","b");

new concat();

?>