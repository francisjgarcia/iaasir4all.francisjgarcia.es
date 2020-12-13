<?php
    $mensaje = $_POST['mensaje'];
    $mensaje.= "\n--------------";
    $mensaje.= "\nNombre: ". $_POST['nombre'];
    $mensaje.= "\nAsunto: ". $_POST['asunto'];
    $mensaje.= "\nEmail: ". $_POST['email'];
    $destino= "";
    $remitente = $_POST['email'];
    $asunto = $_POST['asunto'];
    mail($destino,$asunto,$mensaje,"FROM: $remitente");
    echo "Mensaje enviado correctamente.";
?>