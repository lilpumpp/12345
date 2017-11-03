<?php
require 'vendor/autoload.php';
$app =new \atk4\ui\App('Shops');
$app->initLayout('Centered');

$C=$_GET['name'];
$label1=$app->add(['Label',$C]);
$C=$_GET['surname'];
$label1=$app->add(['Label',$C]);
