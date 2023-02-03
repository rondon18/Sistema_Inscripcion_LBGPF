<?php 

session_start();

var_dump($_SESSION);

foreach ($_SESSION as $key => $value) {
	echo $key;
	echo "<br><br>";
	var_dump($value);
	echo "<br><br><br><br>";
}

?>