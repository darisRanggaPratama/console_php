<?php
include("lib/ArrayBase.php");

use ArrayTest\ArrayBase;

$array = array();

$BasicArray = new ArrayBase($array, 11, 0, 21);

$BasicArray->displayArray($array);
$BasicArray->indexValueArray($array);
$BasicArray->evenArray($array);
$BasicArray->oddArray($array);
$BasicArray->insertElement($array, 5, 0, 100);
$BasicArray->editElement($array, 3, 99);
$BasicArray->displayDescending($array);
$BasicArray->deleteElement($array, 2);
$BasicArray->displayAscending($array);
