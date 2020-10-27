<?php

if(isset($_POST['apache'])) {
  unset($_SESSION["servicio"][1]);
}
if(isset($_POST['nginx'])) {
  unset($_SESSION["servicio"][2]);
}
if(isset($_POST['vsftpd'])) {
  unset($_SESSION["servicio"][3]);
}
if(isset($_POST['mysql'])) {
  unset($_SESSION["servicio"][4]);
}
if(isset($_POST['postgresql'])) {
  unset($_SESSION["servicio"][5]);
}
if(isset($_POST['postfix'])) {
  unset($_SESSION["servicio"][6]);
}
?>
<form action="" method="post" enctype="multipart/form-data" class="mis-servicios">
  <?php
  if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][1] == "apache" && $_POST["apache"] != "eliminar") {
    ?>
    <!-- Servicio (Apache) -->
    <div class="col-md-12 fjg-servicio" id="apache" style="padding-top: 10px">
      <h5>Apache</h5>
      <div class="form-group row">

        <div class="col-md-4">
          <label for="Dominio">Dominio</label>
          <input type="text" class="form-control" id="apache_dominio" placeholder="Nombre de dominio" name="apache_dominio" required>
        </div>
        <div class="col-md-4">
          <label for="Puerto">Puerto</label>
          <input type="number" class="form-control" id="apache_puerto" placeholder="Puerto" value="80" name="apache_puerto" required>
        </div>
        <div class="col-md-4">
          <label for="Directorio raíz">Directorio raíz</label>
          <input type="text" class="form-control" id="apache_documentroot" placeholder="Directorio raíz" value="/var/www" name="apache_documentroot" required>
        </div>

      </div>

    </div>


        <?php
        if(isset($_SESSION["tipo_servicio"]) && $_SESSION["tipo_servicio"] == "microservicio" ) {
          ?>
    <div class="col-md-12 fjg-servicio" id="apache" style="padding-top: 10px">
      <h6>Datos del contenedor</h6>
      <div class="form-group row">


          <div class="col-md-6">
            <label for="Hostname">Hostname</label>
            <input type="text" class="form-control" id="apache_docker_hostname" placeholder="Hostname" name="apache_docker_hostname" required
            <?php
            if(isset($_POST["apache_docker_hostname"])) { 
              echo 'value="'.$_POST["apache_docker_hostname"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][4])) {
              echo 'value="'.$_SESSION["apache_docker"][4].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-3">
            <label for="Puerto externo">Puerto externo</label>
            <input type="text" class="form-control" id="apache_docker_puerto_externo" placeholder="Puerto externo" name="apache_docker_puerto_externo" required
            <?php
            if(isset($_POST["apache_docker_puerto_externo"])) { 
              echo 'value="'.$_POST["apache_docker_puerto_externo"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][5])) {
              echo 'value="'.$_SESSION["apache_docker"][5].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-3">
            <label for="Puerto interno">Puerto interno</label>
            <input type="text" class="form-control" id="apache_docker_puerto_interno" placeholder="Puerto interno" name="apache_docker_puerto_interno" required
            <?php
            if(isset($_POST["apache_docker_puerto_interno"])) { 
              echo 'value="'.$_POST["apache_docker_puerto_interno"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][6])) {
              echo 'value="'.$_SESSION["apache_docker"][6].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-6">
            <label for="Directorio volumen externo">Directorio volumen externo</label>
            <input type="text" class="form-control" id="apache_docker_directorio_volumen_externo" placeholder="Directorio volumen externo" name="apache_docker_directorio_volumen_externo" required
            <?php
            if(isset($_POST["apache_docker_directorio_volumen_externo"])) { 
              echo 'value="'.$_POST["apache_docker_directorio_volumen_externo"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][7])) {
              echo 'value="'.$_SESSION["apache_docker"][7].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-6">
            <label for="Puerto interno">Directorio volumen externo</label>
            <input type="text" class="form-control" id="apache_docker_directorio_volumen_interno" placeholder="Directorio volumen interno" name="apache_docker_directorio_volumen_interno" required
            <?php
            if(isset($_POST["apache_docker_directorio_volumen_interno"])) { 
              echo 'value="'.$_POST["apache_docker_directorio_volumen_interno"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][8])) {
              echo 'value="'.$_SESSION["apache_docker"][8].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="Nombre de la red">Nombre de la red</label>
            <input type="text" class="form-control" id="apache_docker_nombre_red" placeholder="Nombre de la red" name="apache_docker_nombre_red" required
            <?php
            if(isset($_POST["apache_docker_nombre_red"])) { 
              echo 'value="'.$_POST["apache_docker_nombre_red"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][9])) {
              echo 'value="'.$_SESSION["apache_docker"][9].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="Direccionamiento de red">Direccionamiento de red</label>
            <input type="text" class="form-control" id="apache_docker_direccionamiento_red" placeholder="Direccionamiento de red" name="apache_docker_direccionamiento_red" required
            <?php
            if(isset($_POST["apache_docker_direccionamiento_red"])) { 
              echo 'value="'.$_POST["apache_docker_direccionamiento_red"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][10])) {
              echo 'value="'.$_SESSION["apache_docker"][10].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="IP del contenedor">IP del contenedo</label>
            <input type="text" class="form-control" id="apache_docker_ip_contenedor" placeholder="IP del contenedor" name="apache_docker_ip_contenedor" required
            <?php
            if(isset($_POST["apache_docker_ip_contenedor"])) { 
              echo 'value="'.$_POST["apache_docker_ip_contenedor"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][11])) {
              echo 'value="'.$_SESSION["apache_docker"][11].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

      </div>
      <hr>
    </div>

          <?php
        }
        ?>

    <?php
  }
  if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][2] == "nginx" && $_POST["nginx"] != "eliminar") {
    ?>
    <!-- Servicio (Nginx) -->
    <div class="col-md-12 fjg-servicio" id="nginx" style="padding-top: 15px">
      <h5>Nginx</h5>  
      <div class="form-group row">
        <div class="col-md-4">
          <label for="Dominio">Dominio</label>
          <input type="text" class="form-control" id="nginx_dominio" placeholder="Nombre de dominio" name="nginx_dominio" required>
        </div>
        <div class="col-md-4">
          <label for="Puerto">Puerto</label>
          <input type="number" class="form-control" id="nginx_puerto" placeholder="Puerto" value="80" name="nginx_puerto" required>
        </div>
        <div class="col-md-4">
          <label for="Directorio raíz">Directorio raíz</label>
          <input type="text" class="form-control" id="nginx_documentroot" placeholder="Directorio raíz" value="/var/www" name="nginx_documentroot" required>
        </div>
      </div>

    </div>


        <?php
        if(isset($_SESSION["tipo_servicio"]) && $_SESSION["tipo_servicio"] == "microservicio" ) {
          ?>
<div class="col-md-12 fjg-servicio" id="apache" style="padding-top: 10px">
      <h6>Datos del contenedor</h6>
      <div class="form-group row">

          
          <div class="col-md-6">
            <label for="Hostname">Hostname</label>
            <input type="text" class="form-control" id="apache_docker_hostname" placeholder="Hostname" name="apache_docker_hostname" required
            <?php
            if(isset($_POST["apache_docker_hostname"])) { 
              echo 'value="'.$_POST["apache_docker_hostname"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][4])) {
              echo 'value="'.$_SESSION["apache_docker"][4].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-3">
            <label for="Puerto externo">Puerto externo</label>
            <input type="text" class="form-control" id="apache_docker_puerto_externo" placeholder="Puerto externo" name="apache_docker_puerto_externo" required
            <?php
            if(isset($_POST["apache_docker_puerto_externo"])) { 
              echo 'value="'.$_POST["apache_docker_puerto_externo"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][5])) {
              echo 'value="'.$_SESSION["apache_docker"][5].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-3">
            <label for="Puerto interno">Puerto interno</label>
            <input type="text" class="form-control" id="apache_docker_puerto_interno" placeholder="Puerto interno" name="apache_docker_puerto_interno" required
            <?php
            if(isset($_POST["apache_docker_puerto_interno"])) { 
              echo 'value="'.$_POST["apache_docker_puerto_interno"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][6])) {
              echo 'value="'.$_SESSION["apache_docker"][6].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-6">
            <label for="Directorio volumen externo">Directorio volumen externo</label>
            <input type="text" class="form-control" id="apache_docker_directorio_volumen_externo" placeholder="Directorio volumen externo" name="apache_docker_directorio_volumen_externo" required
            <?php
            if(isset($_POST["apache_docker_directorio_volumen_externo"])) { 
              echo 'value="'.$_POST["apache_docker_directorio_volumen_externo"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][7])) {
              echo 'value="'.$_SESSION["apache_docker"][7].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-6">
            <label for="Puerto interno">Directorio volumen externo</label>
            <input type="text" class="form-control" id="apache_docker_directorio_volumen_interno" placeholder="Directorio volumen interno" name="apache_docker_directorio_volumen_interno" required
            <?php
            if(isset($_POST["apache_docker_directorio_volumen_interno"])) { 
              echo 'value="'.$_POST["apache_docker_directorio_volumen_interno"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][8])) {
              echo 'value="'.$_SESSION["apache_docker"][8].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="Nombre de la red">Nombre de la red</label>
            <input type="text" class="form-control" id="apache_docker_nombre_red" placeholder="Nombre de la red" name="apache_docker_nombre_red" required
            <?php
            if(isset($_POST["apache_docker_nombre_red"])) { 
              echo 'value="'.$_POST["apache_docker_nombre_red"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][9])) {
              echo 'value="'.$_SESSION["apache_docker"][9].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="Direccionamiento de red">Direccionamiento de red</label>
            <input type="text" class="form-control" id="apache_docker_direccionamiento_red" placeholder="Direccionamiento de red" name="apache_docker_direccionamiento_red" required
            <?php
            if(isset($_POST["apache_docker_direccionamiento_red"])) { 
              echo 'value="'.$_POST["apache_docker_direccionamiento_red"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][10])) {
              echo 'value="'.$_SESSION["apache_docker"][10].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="IP del contenedor">IP del contenedo</label>
            <input type="text" class="form-control" id="apache_docker_ip_contenedor" placeholder="IP del contenedor" name="apache_docker_ip_contenedor" required
            <?php
            if(isset($_POST["apache_docker_ip_contenedor"])) { 
              echo 'value="'.$_POST["apache_docker_ip_contenedor"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][11])) {
              echo 'value="'.$_SESSION["apache_docker"][11].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

      </div>
      <hr>
    </div>

          <?php
        }
        ?>

    <?php
  }
  if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][3] == "vsftpd") {
    ?>
    <!-- Servicio (Nginx) -->
    <div class="col-md-12 fjg-servicio" id="vsftpd" style="padding-top: 15px">
      <h5>Vsftpd</h5>

      <div class="form-group row">

        <div class="col-md-4">
          <label for="Usuario">Usuario</label>
          <input type="text" class="form-control" id="vsftpd_usuario" placeholder="Usuario" name="vsftpd_usuario" required>
        </div>

        <div class="col-md-4">
          <label for="Contraseña">Contraseña</label>
          <input type="password" class="form-control" id="vsftpd_clave" placeholder="Contraseña" name="vsftpd_clave" required>
        </div>

        <div class="col-md-4">
          <label for="Crear home del usuario">Crear home del usuario</label>
          <select class="form-control" name="vsftpd_home_select" id="vsftpd_home_select" required>
            <option value="yes" selected>Sí</option>
            <option value="no">No</option>
          </select>
        </div>

        <div class="col-md-4">
          <label for="Directorio FTP">Directorio FTP</label>
          <input type="text" class="form-control" id="vsftpd_home" placeholder="Directorio FTP" value="/home" name="vsftpd_home" required>
        </div>

        <div class="col-md-4">
          <label for="Puerto">Puerto</label>
          <input type="number" class="form-control" id="vsftpd_puerto" placeholder="Puerto" value="21" name="vsftpd_puerto" required>
        </div>

        <div class="col-md-4">
          <label for="Puerto pasivo (mínimo)">Puerto pasivo (mínimo)</label>
          <input type="number" class="form-control" id="vsftpd_min_port" placeholder="Puerto pasivo (mínimo)" value="40000" name="vsftpd_min_port" required>
        </div>

        <div class="col-md-4">
          <label for="Puerto pasivo (máximo)">Puerto pasivo (máximo)</label>
          <input type="number" class="form-control" id="vsftpd_max_port" placeholder="Puerto pasivo (máximo)" value="50000" name="vsftpd_max_port" required>
        </div>

        <div class="col-md-4">
          <label for="Permitir escritura">Permitir escritura</label>
          <select class="form-control" name="vsftpd_write_enable" id="vsftpd_write_enable" required>
            <option value="yes" selected>Sí</option>
            <option value="no">No</option>
          </select>
        </div>

        <div class="col-md-4">
          <label for="Permitir usuario anónimo">Permitir usuario anónimo</label>
          <select class="form-control" name="vsftpd_anonymous_user" id="vsftpd_anonymous_user" required>
            <option value="yes" selected>Sí</option>
            <option value="no">No</option>
          </select>
        </div>

        <div class="col-md-4">
          <label for="Local enabled">Local enabled</label>
          <select class="form-control" name="vsftpd_local_enabled" id="vsftpd_local_enabled" required>
            <option value="yes" selected>Sí</option>
            <option value="no">No</option>
          </select>
        </div>

        <div class="col-md-4">
          <label for="vsftpd_chroot_local_user">Chroot local user</label>
          <select class="form-control" name="vsftpd_chroot_local_user" id="vsftpd_chroot_local_user" required>
            <option value="yes" selected>Sí</option>
            <option value="no">No</option>
          </select>
        </div>

      </div>

    </div>



        <?php
        if(isset($_SESSION["tipo_servicio"]) && $_SESSION["tipo_servicio"] == "microservicio" ) {
          ?>


    <div class="col-md-12 fjg-servicio" id="apache" style="padding-top: 10px">
      <h6>Datos del contenedor</h6>
      <div class="form-group row">

          
          <div class="col-md-6">
            <label for="Hostname">Hostname</label>
            <input type="text" class="form-control" id="apache_docker_hostname" placeholder="Hostname" name="apache_docker_hostname" required
            <?php
            if(isset($_POST["apache_docker_hostname"])) { 
              echo 'value="'.$_POST["apache_docker_hostname"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][4])) {
              echo 'value="'.$_SESSION["apache_docker"][4].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-3">
            <label for="Puerto externo">Puerto externo</label>
            <input type="text" class="form-control" id="apache_docker_puerto_externo" placeholder="Puerto externo" name="apache_docker_puerto_externo" required
            <?php
            if(isset($_POST["apache_docker_puerto_externo"])) { 
              echo 'value="'.$_POST["apache_docker_puerto_externo"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][5])) {
              echo 'value="'.$_SESSION["apache_docker"][5].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-3">
            <label for="Puerto interno">Puerto interno</label>
            <input type="text" class="form-control" id="apache_docker_puerto_interno" placeholder="Puerto interno" name="apache_docker_puerto_interno" required
            <?php
            if(isset($_POST["apache_docker_puerto_interno"])) { 
              echo 'value="'.$_POST["apache_docker_puerto_interno"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][6])) {
              echo 'value="'.$_SESSION["apache_docker"][6].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-6">
            <label for="Directorio volumen externo">Directorio volumen externo</label>
            <input type="text" class="form-control" id="apache_docker_directorio_volumen_externo" placeholder="Directorio volumen externo" name="apache_docker_directorio_volumen_externo" required
            <?php
            if(isset($_POST["apache_docker_directorio_volumen_externo"])) { 
              echo 'value="'.$_POST["apache_docker_directorio_volumen_externo"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][7])) {
              echo 'value="'.$_SESSION["apache_docker"][7].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-6">
            <label for="Puerto interno">Directorio volumen externo</label>
            <input type="text" class="form-control" id="apache_docker_directorio_volumen_interno" placeholder="Directorio volumen interno" name="apache_docker_directorio_volumen_interno" required
            <?php
            if(isset($_POST["apache_docker_directorio_volumen_interno"])) { 
              echo 'value="'.$_POST["apache_docker_directorio_volumen_interno"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][8])) {
              echo 'value="'.$_SESSION["apache_docker"][8].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="Nombre de la red">Nombre de la red</label>
            <input type="text" class="form-control" id="apache_docker_nombre_red" placeholder="Nombre de la red" name="apache_docker_nombre_red" required
            <?php
            if(isset($_POST["apache_docker_nombre_red"])) { 
              echo 'value="'.$_POST["apache_docker_nombre_red"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][9])) {
              echo 'value="'.$_SESSION["apache_docker"][9].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="Direccionamiento de red">Direccionamiento de red</label>
            <input type="text" class="form-control" id="apache_docker_direccionamiento_red" placeholder="Direccionamiento de red" name="apache_docker_direccionamiento_red" required
            <?php
            if(isset($_POST["apache_docker_direccionamiento_red"])) { 
              echo 'value="'.$_POST["apache_docker_direccionamiento_red"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][10])) {
              echo 'value="'.$_SESSION["apache_docker"][10].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="IP del contenedor">IP del contenedo</label>
            <input type="text" class="form-control" id="apache_docker_ip_contenedor" placeholder="IP del contenedor" name="apache_docker_ip_contenedor" required
            <?php
            if(isset($_POST["apache_docker_ip_contenedor"])) { 
              echo 'value="'.$_POST["apache_docker_ip_contenedor"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][11])) {
              echo 'value="'.$_SESSION["apache_docker"][11].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

      </div>
      <hr>
    </div>

          <?php
        }
        ?>


    <?php
  }
  if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][4] == "mysql") {
    ?>
    <!-- Servicio (Nginx) -->
    <div class="col-md-12 fjg-servicio" id="mysql">
      <hr>
      <h5>MySQL</h5>
      <div class="form-group row">
        <div class="col-md-4">
          <label for="Clave del usuario root">Clave del usuario root</label>
          <input type="password" class="form-control" id="mysql_password_root" placeholder="Clave del usuario root" name="mysql_password_root" required>
        </div>
        <div class="col-md-4">
          <label for="Puerto">Puerto</label>
          <input type="number" class="form-control" id="mysql_puerto" placeholder="Puerto" value="3306" name="mysql_puerto" required>
        </div>
        <div class="col-md-4">
          <label for="Bind address">Bind address</label>
          <input type="text" class="form-control" id="mysql_bind_address" placeholder="Bind address" value="127.0.0.1" name="mysql_bind_address" required>
        </div>
        <div class="col-md-4">
          <label for="Usuario">Usuario</label>
          <input type="text" class="form-control" id="mysql_user" placeholder="Usuario" name="mysql_user" required>
        </div>
        <div class="col-md-4">
          <label for="Contraseña">Contraseña</label>
          <input type="password" class="form-control" id="mysql_password_user" placeholder="Contraseña" name="mysql_password_user" required>
        </div>
        <div class="col-md-4">
          <label for="Host permitido">Host permitido</label>
          <input type="text" class="form-control" id="mysql_host" placeholder="Host permitido" value="localhost" name="mysql_host" required>
        </div>
        <div class="col-md-6">
          <label for="Nombre base de datos">Nombre base de datos</label>
          <input type="text" class="form-control" id="mysql_database" placeholder="Nombre base de datos" name="mysql_database" required>
        </div>
        <div class="col-md-6">
          <label for="Importar base de datos">Importar base de datos</label>
          <input class="form-control" id="mysql_sql" name="mysql_sql" type="file" accept=".sql" required>
        </div>
      </div>

      <hr>
    </div>

    <?php
  }
  if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][5] == "postgresql") {
    ?>

    <!-- Servicio (Nginx) -->
    <div class="col-md-12 fjg-servicio" id="postgresql">
      <hr>
      <h5>PostgreSQL</h5>
      <div class="form-group row">

        <div class="col-md-4">
          <label for="Usuario">Usuario</label>
          <input type="text" class="form-control" id="postgresql_user" placeholder="Usuario" name="postgresql_user" required>
        </div>
        <div class="col-md-4">
          <label for="Contraseña">Contraseña</label>
          <input type="password" class="form-control" id="postgresql_password_user" placeholder="Contraseña" name="postgresql_password_user" required>
        </div>
        <div class="col-md-4">
          <label for="Puerto">Puerto</label>
          <input type="number" class="form-control" id="postgresql_puerto" placeholder="Puerto" value="5432" name="postgresql_puerto" required>
        </div>
        <div class="col-md-4">
          <label for="Permitir la conexión desde">Permitir la conexión desde</label>
          <input type="text" class="form-control" id="postgresql_listen" placeholder="Permitir la conexión desde" value="*" name="postgresql_listen" required>
        </div>
        <div class="col-md-4">
          <label for="Accesos">Accesos</label>
          <input type="text" class="form-control" id="postgresql_accesos" placeholder="Permitir la conexión desde" value="0.0.0.0/0" name="postgresql_accesos" required>
        </div>

        <div class="col-md-6">
          <label for="Nombre base de datos">Nombre base de datos</label>
          <input type="text" class="form-control" id="postgresql_database" placeholder="Nombre base de datos" name="postgresql_database" required>
        </div>
        <div class="col-md-6">
          <label for="Importar base de datos">Importar base de datos</label>
          <input class="form-control" id="postgresql_sql" name="postgresql_sql" type="file" accept=".sql" required>
        </div>
      </div>

      <hr>
    </div>

        <?php
        if(isset($_SESSION["tipo_servicio"]) && $_SESSION["tipo_servicio"] == "microservicio" ) {
          ?>


    <div class="col-md-12 fjg-servicio" id="apache" style="padding-top: 10px">
      <h6>Datos del contenedor</h6>
      <div class="form-group row">

          
          <div class="col-md-6">
            <label for="Hostname">Hostname</label>
            <input type="text" class="form-control" id="apache_docker_hostname" placeholder="Hostname" name="apache_docker_hostname" required
            <?php
            if(isset($_POST["apache_docker_hostname"])) { 
              echo 'value="'.$_POST["apache_docker_hostname"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][4])) {
              echo 'value="'.$_SESSION["apache_docker"][4].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-3">
            <label for="Puerto externo">Puerto externo</label>
            <input type="text" class="form-control" id="apache_docker_puerto_externo" placeholder="Puerto externo" name="apache_docker_puerto_externo" required
            <?php
            if(isset($_POST["apache_docker_puerto_externo"])) { 
              echo 'value="'.$_POST["apache_docker_puerto_externo"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][5])) {
              echo 'value="'.$_SESSION["apache_docker"][5].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-3">
            <label for="Puerto interno">Puerto interno</label>
            <input type="text" class="form-control" id="apache_docker_puerto_interno" placeholder="Puerto interno" name="apache_docker_puerto_interno" required
            <?php
            if(isset($_POST["apache_docker_puerto_interno"])) { 
              echo 'value="'.$_POST["apache_docker_puerto_interno"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][6])) {
              echo 'value="'.$_SESSION["apache_docker"][6].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-6">
            <label for="Directorio volumen externo">Directorio volumen externo</label>
            <input type="text" class="form-control" id="apache_docker_directorio_volumen_externo" placeholder="Directorio volumen externo" name="apache_docker_directorio_volumen_externo" required
            <?php
            if(isset($_POST["apache_docker_directorio_volumen_externo"])) { 
              echo 'value="'.$_POST["apache_docker_directorio_volumen_externo"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][7])) {
              echo 'value="'.$_SESSION["apache_docker"][7].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-6">
            <label for="Puerto interno">Directorio volumen externo</label>
            <input type="text" class="form-control" id="apache_docker_directorio_volumen_interno" placeholder="Directorio volumen interno" name="apache_docker_directorio_volumen_interno" required
            <?php
            if(isset($_POST["apache_docker_directorio_volumen_interno"])) { 
              echo 'value="'.$_POST["apache_docker_directorio_volumen_interno"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][8])) {
              echo 'value="'.$_SESSION["apache_docker"][8].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="Nombre de la red">Nombre de la red</label>
            <input type="text" class="form-control" id="apache_docker_nombre_red" placeholder="Nombre de la red" name="apache_docker_nombre_red" required
            <?php
            if(isset($_POST["apache_docker_nombre_red"])) { 
              echo 'value="'.$_POST["apache_docker_nombre_red"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][9])) {
              echo 'value="'.$_SESSION["apache_docker"][9].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="Direccionamiento de red">Direccionamiento de red</label>
            <input type="text" class="form-control" id="apache_docker_direccionamiento_red" placeholder="Direccionamiento de red" name="apache_docker_direccionamiento_red" required
            <?php
            if(isset($_POST["apache_docker_direccionamiento_red"])) { 
              echo 'value="'.$_POST["apache_docker_direccionamiento_red"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][10])) {
              echo 'value="'.$_SESSION["apache_docker"][10].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="IP del contenedor">IP del contenedo</label>
            <input type="text" class="form-control" id="apache_docker_ip_contenedor" placeholder="IP del contenedor" name="apache_docker_ip_contenedor" required
            <?php
            if(isset($_POST["apache_docker_ip_contenedor"])) { 
              echo 'value="'.$_POST["apache_docker_ip_contenedor"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][11])) {
              echo 'value="'.$_SESSION["apache_docker"][11].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

      </div>
      <hr>
    </div>

          <?php
        }
        ?>


    <?php
  }
  if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][6] == "postfix") {
    ?>
    <!-- Servicio (Nginx) -->
    <div class="col-md-12 fjg-servicio" id="postfix">
      <hr>
      <h5>Postfix</h5>

      <div class="form-group row">
        <div class="col-md-4">
          <label for="Hostname">Hostname</label>
          <input type="text" class="form-control" id="postfix_hostname" placeholder="Hostname" name="postfix_hostname" required>
        </div>
        <div class="col-md-4">
          <label for="Dominio">Dominio</label>
          <input type="text" class="form-control" id="postfix_domain" placeholder="Dominio" name="postfix_domain" required>
        </div>
        <div class="col-md-4">
          <label for="Directorio mailbox">Directorio mailbox</label>
          <input type="text" class="form-control" id="postfix_mailbox" placeholder="Directorio mailbox" name="postfix_mailbox" required>
        </div>
      </div>


      <hr>
    </div>

        <?php
        if(isset($_SESSION["tipo_servicio"]) && $_SESSION["tipo_servicio"] == "microservicio" ) {
          ?>


    <div class="col-md-12 fjg-servicio" id="apache" style="padding-top: 10px">
      <h6>Datos del contenedor</h6>
      <div class="form-group row">

          
          <div class="col-md-6">
            <label for="Hostname">Hostname</label>
            <input type="text" class="form-control" id="apache_docker_hostname" placeholder="Hostname" name="apache_docker_hostname" required
            <?php
            if(isset($_POST["apache_docker_hostname"])) { 
              echo 'value="'.$_POST["apache_docker_hostname"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][4])) {
              echo 'value="'.$_SESSION["apache_docker"][4].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-3">
            <label for="Puerto externo">Puerto externo</label>
            <input type="text" class="form-control" id="apache_docker_puerto_externo" placeholder="Puerto externo" name="apache_docker_puerto_externo" required
            <?php
            if(isset($_POST["apache_docker_puerto_externo"])) { 
              echo 'value="'.$_POST["apache_docker_puerto_externo"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][5])) {
              echo 'value="'.$_SESSION["apache_docker"][5].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-3">
            <label for="Puerto interno">Puerto interno</label>
            <input type="text" class="form-control" id="apache_docker_puerto_interno" placeholder="Puerto interno" name="apache_docker_puerto_interno" required
            <?php
            if(isset($_POST["apache_docker_puerto_interno"])) { 
              echo 'value="'.$_POST["apache_docker_puerto_interno"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][6])) {
              echo 'value="'.$_SESSION["apache_docker"][6].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-6">
            <label for="Directorio volumen externo">Directorio volumen externo</label>
            <input type="text" class="form-control" id="apache_docker_directorio_volumen_externo" placeholder="Directorio volumen externo" name="apache_docker_directorio_volumen_externo" required
            <?php
            if(isset($_POST["apache_docker_directorio_volumen_externo"])) { 
              echo 'value="'.$_POST["apache_docker_directorio_volumen_externo"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][7])) {
              echo 'value="'.$_SESSION["apache_docker"][7].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-6">
            <label for="Puerto interno">Directorio volumen externo</label>
            <input type="text" class="form-control" id="apache_docker_directorio_volumen_interno" placeholder="Directorio volumen interno" name="apache_docker_directorio_volumen_interno" required
            <?php
            if(isset($_POST["apache_docker_directorio_volumen_interno"])) { 
              echo 'value="'.$_POST["apache_docker_directorio_volumen_interno"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][8])) {
              echo 'value="'.$_SESSION["apache_docker"][8].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="Nombre de la red">Nombre de la red</label>
            <input type="text" class="form-control" id="apache_docker_nombre_red" placeholder="Nombre de la red" name="apache_docker_nombre_red" required
            <?php
            if(isset($_POST["apache_docker_nombre_red"])) { 
              echo 'value="'.$_POST["apache_docker_nombre_red"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][9])) {
              echo 'value="'.$_SESSION["apache_docker"][9].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="Direccionamiento de red">Direccionamiento de red</label>
            <input type="text" class="form-control" id="apache_docker_direccionamiento_red" placeholder="Direccionamiento de red" name="apache_docker_direccionamiento_red" required
            <?php
            if(isset($_POST["apache_docker_direccionamiento_red"])) { 
              echo 'value="'.$_POST["apache_docker_direccionamiento_red"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][10])) {
              echo 'value="'.$_SESSION["apache_docker"][10].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

          <div class="col-md-4">
            <label for="IP del contenedor">IP del contenedo</label>
            <input type="text" class="form-control" id="apache_docker_ip_contenedor" placeholder="IP del contenedor" name="apache_docker_ip_contenedor" required
            <?php
            if(isset($_POST["apache_docker_ip_contenedor"])) { 
              echo 'value="'.$_POST["apache_docker_ip_contenedor"].'"';
              echo 'disabled';
            }
            elseif(isset($_SESSION["apache_docker"][11])) {
              echo 'value="'.$_SESSION["apache_docker"][11].'"';
              echo 'disabled';
            }
            ?>
            >
          </div>

      </div>
      <hr>
    </div>

          <?php
        }
        ?>

    <?php
  }
  if (isset($_SESSION["servicio"][1]) || $_SESSION["servicio"][2] || $_SESSION["servicio"][3] || $_SESSION["servicio"][4] || $_SESSION["servicio"][5] || $_SESSION["servicio"][6] ) {
    ?>



    <button class="btn btn-block btn-success btn-final" type="submit">
      <span class="glyphicon glyphicon-cloud-download"></span>Siguiente »
    </button>
    <?php
  }
  ?>
</form>

<?php
if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][1] == "apache" && isset($_POST["apache_puerto"]) && isset($_POST["apache_dominio"]) && isset($_POST["apache_documentroot"])) {
  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/tmp');
  exec('echo puerto: '.$_POST["apache_puerto"].' > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/tmp/apache/vars.yml');
  exec('echo dominio: '.$_POST["apache_dominio"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/apache/vars.yml');
  exec('echo docroot: '.$_POST["apache_documentroot"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/apache/vars.yml');

  exec('cp -R /hdd-ext/aprovisionamiento/vagrant/* /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios');

  //exec('sudo ansible-playbook -i /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/apache/apache.yml &');
}

if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][2] == "nginx" && isset($_POST["nginx_puerto"]) && isset($_POST["nginx_dominio"]) && isset($_POST["nginx_documentroot"])) {
  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/nginx');
  exec('echo puerto: '.$_POST["nginx_puerto"].' > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/tmp/vars.yml');
  exec('echo dominio: '.$_POST["nginx_dominio"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/nginx/vars.yml');
  exec('echo docroot: '.$_POST["nginx_documentroot"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/nginx/vars.yml');

  exec('cp -R /hdd-ext/aprovisionamiento/ansible/web/nginx/* /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/nginx');

  exec('sudo ansible-playbook -i /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/nginx/nginx.yml &');
}

if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][3] == "vsftpd" && isset($_POST["vsftpd_usuario"]) && isset($_POST["vsftpd_clave"]) && isset($_POST["vsftpd_home_select"]) && isset($_POST["vsftpd_puerto"]) && isset($_POST["vsftpd_anonymous_user"]) && isset($_POST["vsftpd_local_enabled"]) && isset($_POST["vsftpd_write_enable"]) && isset($_POST["vsftpd_chroot_local_user"]) && isset($_POST["vsftpd_home"]) && isset($_POST["vsftpd_min_port"]) && isset($_POST["vsftpd_max_port"]) ) {
  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd');
  exec('echo usuario: '.$_POST["vsftpd_usuario"].' > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo password: '.$_POST["vsftpd_clave"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo homeuser: '.$_POST["vsftpd_home_select"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo puerto: '.$_POST["vsftpd_puerto"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo anonymous_enable: '.$_POST["vsftpd_anonymous_user"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo local_enable: '.$_POST["vsftpd_local_enabled"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo write_enable: '.$_POST["vsftpd_write_enable"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo chroot_local_user: '.$_POST["vsftpd_chroot_local_user"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo local_root: '.$_POST["vsftpd_home"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo pasv_enable: YES >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo pasv_min_port: '.$_POST["vsftpd_min_port"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');
  exec('echo pasv_max_port: '.$_POST["vsftpd_max_port"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vars.yml');

  exec('cp -R /hdd-ext/aprovisionamiento/ansible/ftp/vsftpd/* /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd');

  exec('sudo ansible-playbook -i /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/vsftpd/vsftpd.yml &');
}

if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][4] == "mysql" && isset($_POST["mysql_bind_address"]) && isset($_POST["mysql_user"]) && isset($_POST["mysql_password_user"]) && isset($_POST["mysql_host"]) && isset($_POST["mysql_database"]) && isset($_POST["mysql_password_root"]) && isset($_POST["mysql_puerto"])) {

  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/mysql/datos');

  exec('echo bind_address: '.$_POST["mysql_bind_address"].' > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/mysql/vars.yml');
  exec('echo user: '.$_POST["mysql_user"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/mysql/vars.yml');
  exec('echo user_password: '.$_POST["mysql_password_user"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/mysql/vars.yml');
  exec('echo "host: \"'.$_POST["mysql_host"].'\"" >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/mysql/vars.yml');
  exec('echo database: '.$_POST["mysql_database"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/mysql/vars.yml');
  exec('echo root_password: '.$_POST["mysql_password_root"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/mysql/vars.yml');
  exec('echo puerto: '.$_POST["mysql_puerto"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/mysql/vars.yml');

  move_uploaded_file($_FILES['mysql_sql']['tmp_name'],"/hdd-ext/usuarios/".$_SESSION["username"]."/historial/".$_SESSION["fecha_despliegue"]."/servicios/mysql/datos/" . 'database.sql');
  exec('cp -R /hdd-ext/aprovisionamiento/ansible/bd/mysql/* /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/mysql');

  exec('sudo ansible-playbook -i /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/mysql/mysql.yml &');
  echo "OK";
}

if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][5] == "postgresql" && isset($_POST["postgresql_listen"]) && isset($_POST["postgresql_accesos"]) && isset($_POST["postgresql_user"]) && isset($_POST["postgresql_password_user"]) && isset($_POST["postgresql_database"]) && isset($_POST["postgresql_puerto"])) {

  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postgresql/datos');

  exec('echo "listen: \"'.$_POST["postgresql_listen"].'\"" > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postgresql/vars.yml');
  exec('echo acceso: '.$_POST["postgresql_accesos"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postgresql/vars.yml');
  exec('echo user: '.$_POST["postgresql_user"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postgresql/vars.yml');
  exec('echo "user_password: \"'.$_POST["postgresql_password_user"].'\"" >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postgresql/vars.yml');
  exec('echo database: '.$_POST["postgresql_database"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postgresql/vars.yml');
  exec('echo puerto: '.$_POST["postgresql_puerto"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postgresql/vars.yml');

  move_uploaded_file($_FILES['postgresql_sql']['tmp_name'],"/hdd-ext/usuarios/".$_SESSION["username"]."/historial/".$_SESSION["fecha_despliegue"]."/servicios/postgresql/datos/" . 'database.sql');
  exec('cp -R /hdd-ext/aprovisionamiento/ansible/bd/postgresql/* /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postgresql');

  exec('sudo ansible-playbook -i /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postgresql/postgresql.yml &');

  echo "OK";
}

if(isset($_SESSION["servicio"]) && $_SESSION["servicio"][6] == "postfix" && isset($_POST["postfix_hostname"]) && isset($_POST["postfix_domain"]) && isset($_POST["postfix_mailbox"]) ) {


  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postfix');

  exec('echo myhostname: '.$_POST["postfix_hostname"].' > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postfix/vars_server.yml');
  exec('echo mydomain: '.$_POST["postfix_domain"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postfix/vars.yml');
  exec('echo home_mailbox: '.$_POST["postfix_mailbox"].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postfix/vars_server.yml');
  exec('echo message_size_limit: 10485760 >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postfix/vars_server.yml');
  exec('echo mailbox_size_limit: 1073741824 >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postfix/vars_server.yml');

  exec('cp -R /hdd-ext/aprovisionamiento/ansible/correo/postfix/* /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postfix');

  exec('sudo ansible-playbook -i /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/servicios/postfix/postfix_server.yml &');

}


?>