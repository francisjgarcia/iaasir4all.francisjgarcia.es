<?php
    $mensaje = $_POST['mensaje'];
    $mensaje.= "\n--------------";
    $mensaje.= "\nNombre: ". $_POST['nombre'];
    $mensaje.= "\nAsunto: ". $_POST['asunto'];
    $mensaje.= "\nEmail: ". $_POST['email'];
    $destino= "francisjgarcia94@gmail.com";
    $remitente = $_POST['email'];
    $asunto = "[FJG] -  ".$_POST['asunto'];
    mail($destino,$asunto,$mensaje,"FROM: $remitente");
    echo "Mensaje enviado correctamente.";
?>