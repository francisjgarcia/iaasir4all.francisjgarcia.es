<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} 

else {
	header('Location: /error');
	exit;
}

$now = time();

if($now > $_SESSION['expire']) {
	session_destroy();
	header('Location: /error');
	exit;
}

include('conexion.php');

?>