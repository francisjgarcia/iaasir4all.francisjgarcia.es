<?php
	session_start();
    include('conexion.php');
    	$sql="SELECT nombre FROM ssh_keys WHERE nombre = '$_POST[nombre_key]' AND usuario = $_SESSION[id]";
		$result=mysqli_query($conexion,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(($_POST['nombre_key']) == ($row['nombre'])) {
			echo "Ya existe una clave SSH con ese nombre.";
		}
		else {
				$sql2="INSERT ssh_keys (nombre, usuario) VALUES('$_POST[nombre_key]', $_SESSION[id])";
				mysqli_query($conexion, $sql2);

  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["usuario"].'/ssh_keys/');
  move_uploaded_file($_FILES['upload_key']['tmp_name'],"/hdd-ext/usuarios/".$_SESSION["usuario"]."/ssh_keys/" . $_POST['nombre_key']);

            header('Location: /dashboard/desplegar');
		}
		mysqli_free_result($result);
		mysqli_close($conexion);
?>