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
$button->set('Apple');
$button->icon = 'plus';
$button->link('https://www.samsung.com');
