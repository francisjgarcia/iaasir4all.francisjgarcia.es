<?php
require_once __DIR__.'/../../.env';
$conexion=mysqli_connect('iaasir4all_database',$dbUser,$dbPassword,'dbiaasir4all');
if (mysqli_connect_errno()) {
    echo "Error al conectar con la base de datos: " . mysqli_connect_error() ."";
        exit;
}
?>
