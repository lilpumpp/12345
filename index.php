<?php
require 'vendor/autoload.php';
echo 'nik';
$app =new \atk4\ui\App('Shops');
$app->initLayout('Centered');
$button1 = $app->add('Signal');
$button1->set('Apple');
$button1->addClass("red");
$button1->link('https://www.apple.com');
$button2 = $app->add('Browser');
$button2->set('Samsung');
$button2->addClass("yellow");
$button2->link('https://www.samsung.com');
$button = $app->add('Feed');
$button->set('Asus');
$button->addClass("green");
$button->link('https://www.asus.com');
