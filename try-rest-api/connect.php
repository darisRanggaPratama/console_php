<?php
define('HOST', 'localhost');
define('USER', 'rangga');
define('PASSWORD', 'rangga');
define('DATABASE', 'avengers');

$connects = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die('UNABLE CONNECTING');


?>
