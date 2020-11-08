<?php
    session_start();

    include('conexion.php');
    $sql="SELECT * FROM usuarios WHERE usuario = '$_POST[usuario]'";
    $result=mysqli_query($conexion,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(($_POST['usuario']) == ($row['usuario'])) {
        if((md5($_POST['clave'])) == ($row['clave'])) {
            $_SESSION['iniciada'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['usuario'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            header('Location: /');
        }
        else {
            echo "La clave no es correcta";
        }
    }
    else {
        echo "No existe el usuario ".$_POST['usuario'];
    }
    mysqli_close($conexion);
?>