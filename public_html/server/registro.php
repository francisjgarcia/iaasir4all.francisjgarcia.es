<?php
	session_start();
    include('conexion.php');
    	$sql="SELECT usuario FROM usuarios WHERE usuario = '$_POST[usuario]'";
		$result=mysqli_query($conexion,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(($_POST['usuario']) == ($row['usuario'])) {
			echo "El usuario ".$_POST['usuario']. " existe en la base de datos.<br>";
		}
		else {
			if ( empty($_POST['clave']) || empty($_POST['clave2']) ) {
				echo "La contraseña no puede estar vacía.<br>";
			}
			else if(($_POST['clave']) == ($_POST['clave2'])) {
				$sql2="INSERT usuarios (usuario, clave, nombre) VALUES('$_POST[usuario]',md5('$_POST[clave]'),'$_POST[nombre]')";
				mysqli_query($conexion, $sql2);
				header('Location: /');
			}
			else {
				echo "Has introducido la clave de forma incorrecta.";
			}
		}
		mysqli_free_result($result);
		mysqli_close($conexion);
?>