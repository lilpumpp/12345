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