<?php
require 'vendor/autoload.php';
echo 'nik';
$app =new \atk4\ui\App('Shops');
$app->initLayout('Centered');
$button->icon = "Signal";
$button1 = $app->add('Button');
$button1->set('Apple');
$button1->addClass("red");
$button1->link('https://www.apple.com');
$button->icon = "Signal";
$button2 = $app->add('Button');
$button2->set('Samsung');
$button2->addClass("yellow");
$button2->link('https://www.samsung.com');
$button3 = $app->add('Button');
$button3->icon = "Signal";
$button3->set('Asus');
$button3->addClass("green");
$button3->link('https://www.supremenewyork.com');
$button3= $app-.(["Button" ,"Supreme" , "iconRight"=>"right arrow"]);
