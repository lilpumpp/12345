<?php
require 'vendor/autoload.php';
echo 'nik';
$app =new \atk4\ui\App('Shops');
$app->initLayout('Centered');
$label1=$app->add('Label');
$label1->set('BOOM');
$label1->addClass('big purple');
$img='https://pbs.twimg.com/media/Cx7rFspXcAAkOP_.jpg' ;
$icon=$app->add(['Image',$img]);
$text=$app->add(['Text','here goes some text']);
$text->addParagraph(':)');
$a='test';
if($a=='test') {
 $name='Verno';
} else {
$name= 'Neverno';
}
$label=$app->add(['Label',$name]);

$a=3;
if($a!=0) {
 $name='Verno';
} else {
$name= 'Neverno';
}
$label=$app->add(['Label',$name]);

$a=3;
if($a<=0) {
 $name='Verno';
} else {
$name= 'Neverno';
}
$label=$app->add(['Label',$name]);

$a=3;
if($a>=0) {
 $name='Verno';
} else {
$name= 'Neverno';
}
$label=$app->add(['Label',$name]);

$a=3;
if($a<0) {
 $name='Verno';
} else {
$name= 'Neverno';
}
$label=$app->add(['Label',$name]);

$a=3;
if($a>0) {
 $name='Verno';
 $color = 'green';
} else {
$name= 'Neverno';
$color='red';
}
$label=$app->add(['Label',$name,$color]);

$a=3;
if($a==0) {
 $name='Verno';
} else {
$name= 'Neverno';
}
$label=$app->add(['Label',$name]);
