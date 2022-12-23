<?php
require_once 'Person.php';
use Human\Person;

$person = new Person("John");

// Output: "Object was created with name 'John'.

unset($person);

// Output: "Object with name 'John' is being destroyed."