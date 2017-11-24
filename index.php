<?php
require 'vendor/autoload.php';
require 'Cat.php';
$app =new \atk4\ui\App('Random game');
$app->initLayout('Centered');
/*
$button=$app->add("Button");
$button->set("Сlick");
$button->link("15.php");
$button1 = $app->add('Button');
$button1->icon = "signal";
$button1->set('Apple');
$button1->addClass("red");
$button1->link('https://www.apple.com');
$button->icon = "Signal";
$button2 = $app->add('Button');
$button2->icon = "signal";
$button2->set('Samsung');
$button2->addClass("yellow");
$button2->link('https://www.samsung.com');
$button3 = $app->add('Button');
$button3->icon = "Signal";
$button3->set('Supreme');
$button3->addClass("green");
$button3->link('https://www.supremenewyork.com');
$button4= $app->add(["Button" ,"Bape" , "iconRight"=>"right arrow"]);
$button4->link('https://www.bapeonline.com');
$button4->addClass("blue");
$bar=$app->add(["ui"=>"vertical buttons"]);
$bar->add(["Button","Spotify","icon"=>"play"]);
$bar->add(["Button","SoundCloud","icon"=>"pause"]);
$bar->add(["Button","Shazam","icon"=>"shuffle"]);
$button=$app->add("Button");
$button->set("Сlick");
$button->link("15.php");
$button = $app->add('Button');
$button->icon = "signal";
$button->set('Gucci');
$button->addClass("orange");
$button->link('https://www.gucci.com');
*/
/*
$text= $app->add(['Text','Start']);
$button=$app->add('Button');
$button->set('Try');
$button->icon='find';
$button->link(['test','min'=>1,'max'=>100]);
*/
$cat= new Cat;
$cat1 -> name= 'boom';
$cat1->sex='male';
$cat1->age='19';

$cat2-> new Cat;
$cat2->sex= 'female';
$cat2->age= '34';
$cat2->name= 'game';

$cat3->name='man';
$cat3-> new Cat;
$cat3->sex= 'male';
$cat3->age= '0.5';

$cat4->name='wowo';
$cat4-> new Cat;
$cat4->sex= 'male';
$cat4->age= '45';
