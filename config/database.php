
<?php
	date_default_timezone_set('America/Bogota');
	$server   = "localhost";
	#$port = "3306";
	$username = "root";
	$password = "";
	$database = "gestionganadera";


$mysqli = new mysqli($server, $username, $password, $database);


if ($mysqli->connect_error) {
    die('error'.$mysqli->connect_error);
}
?> 