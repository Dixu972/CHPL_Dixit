<?php

class clg_details
{

    // Properties
    public $clg_name, $stu_name, $el_no;

    // method

    function clg_name($clg_name)
    {
       echo "public class = " .$this->clg_name = $clg_name ."<br>";
    }

    protected function name($stu_name)
    {
        echo "Student Name is (protected) : " .$this->stu_name = $stu_name;
    }

    private function roll_no($el_no)
    {
        echo $this->el_no = $el_no;
    }
}


// protected class 

class child extends clg_details
{

    function display($stu_name)
    {
        $this->name($stu_name);
    }

    function private($el_no){
        $this->roll_no( $el_no );
    }
}

// public

$obj = new clg_details(); 

$obj->clg_name("BAOU"); 

//  protected
$obj1 = new child();

$obj1->display("dixit");

// private

$obj->roll_no(821000128937);

?>
