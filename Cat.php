<?php
Class Cat {
public $age;
public $name;
public $sex;
public $colour= 'White';
public function age_check(){
if($this->age<1){
return $answer='negoden';
} else {
  return  $answer='goden';
}
}
