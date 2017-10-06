<?php
require 'vendor/autoload.php';
echo 'nik_av';
$app =new \atk4\ui\App('Registration');
$app->initLayout('Centered');
$button = $app->add('Button');
$button->set('Apple');
$button->icon = 'shop';
$button->link('https://www.apple.com');
$button = $app->add('Button');
$button->set('Samsung');
$button->icon = 'yellow';
$button->link('https://www.samsung.com');
$button = $app->add('Button');
$button->set('Asus');
$button->icon = 'red';
$button->link('https://www.asus.com');
