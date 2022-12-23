<?php
require 'Car.php';

$toyota = new Car();
 $toyota->setMerk("toyota");
$toyota->setWarna("Blue");
$toyota->setCepat(0);

echo $toyota->getMerk();
echo $toyota->getWarna();
echo $toyota->getCepat();

$honda = new Car();
 $honda->setMerk("honda");
$honda->setWarna("RED");
$honda->setCepat(-1);

echo $honda->getMerk();
echo $honda->getWarna();
echo $honda->getCepat();

