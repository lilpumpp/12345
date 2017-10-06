<?php
require 'vendor/autoload.php';
echo 'nik_av';
$app =new \atk4\ui\App('Registration');
$app->initLayout('Centered');
$button1 = $app->add('Button');
$button1->set('Apple');
$button1->addClass("red");
$button1->link('https://www.apple.com');
$button2 = $app->add('Button');
$button2->set('Samsung');
$button2->addClass("yellow");
$button2->link('https://www.samsung.com');
$button = $app->add('Button');
$button->set('Asus');
$button->addClass("green");
$button->link('https://www.asus.com');
