<?php
 require_once 'Motor.php';
use Vehicle\Motor;

$kawasaki = new Motor("kawasaki", "black", 1);
var_dump($kawasaki);
echo $kawasaki->getSpeed();
echo $kawasaki->getColor();
echo $kawasaki->getName();
echo $kawasaki->showMotor();

$yamaha = new Motor("yamaha", "white", -1);
var_dump($yamaha);
echo $yamaha->showMotor();
// Destructor
unset($yamaha);


