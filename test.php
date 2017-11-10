<?php
require 'vendor/autoload.php';
$app =new \atk4\ui\App('Random game');
$app->initLayout('Centered');
$min=$_GET['min'];
$max=$_GET['max'];
$mid=round(($max+$min)/2);
$label=$app->add(['Label','Твое число '.$mid.' ?']) 
