<?php

require_once 'ParentClass.php';

use Parent\ChildClass;

$class = new ChildClass();
echo $class->prefixName("ifa", "female");
echo $class->prefixName("izam", "male");
echo $class->prefixName("oyen", "cat");

