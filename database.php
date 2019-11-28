
<?php
	date_default_timezone_set('America/Bogota');
	$server   = "localhost";
	#$port = "3306";
	$username = "ganadero_sg1";
	$password = "administrado";
	$database = "ganadero_sg1";


$mysqli = new mysqli($server, $username, $password, $database);


if ($mysqli->connect_error) {
    die('error'.$mysqli->connect_error);
}
?> 