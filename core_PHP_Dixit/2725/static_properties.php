<?php
class equation {
  public static $eq="2πr";

  public function staticValue() {
    return self::$eq;
  }
}

$obj = new equation();
echo "Your Equation of circle perimeter = ".$obj->staticValue();
?>