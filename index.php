<?php
require 'vendor/autoload.php';
echo 'nik_av';
$app =new \atk4\ui\App('Registration');
$app->initLayout('Centered');
$button = $app->add('Button');
$button->set('Start');
$button->icon = 'plus';
$button->link('https://www.apple.com');
