<?php

if(isset($_POST['abortar_despliegue'])) {
  unset($_SESSION["datos_proyecto"]);
  unset($_SESSION["infraestructura"]);
  unset($_SESSION["tipo_servicio"]);
  unset($_SESSION["servicios"]);
  unset($_SESSION["servicio"]);
  unset($_SESSION["baremetal"]);
  unset($_SESSION["vagrant"]);
  unset($_SESSION["docker"]);
  unset($_SESSION["ec2"]);
  unset($_SESSION["openstack"]);
}
?>

<div class="col-md-12 fjg-content">

  <div class="col-md-8 fjg-col">
    <div class="control-group fjg-separation" id="fields">


      <?php
      if (!isset($_POST["desplegar_servicios"])) {
        ?>

        <div class="controls"> 

<form action="" method="POST">
          <h4>Datos de conexión</h4>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="projectname">Nombre del proyecto</label>
              <input class="form-control" id="nombre_proyecto" name="nombre_proyecto" placeholder="Nombre del proyecto" type="text" 
              <?php
               if(isset($_POST["nombre_proyecto"])) { 
                echo 'disabled value="'.$_POST["nombre_proyecto"].'"';
               }
               elseif(isset($_SESSION["datos_proyecto"][1])) {
                echo 'disabled value ="'.$_SESSION["datos_proyecto"][1].'"';
               }
               ?>
              required>
            </div>

            <div class="col-md-6">
              <label for="Sistema operativo">Sistema operativo</label>
              <select class="form-control" name="sistema_operativo" id="sistema_operativo" required <?php
               if(isset($_POST["sistema_operativo"])) { 
                echo 'disabled';
               }
               elseif(isset($_SESSION["datos_proyecto"][2])) {
                echo 'disabled';
               }
               ?>
               >
                <option value="" <?php
               if(!isset($_POST["sistema_operativo"]) && !isset($_SESSION["datos_proyecto"][2])) { 
                echo 'selected';
               }
               ?>
               >Selecciona un sistema operativo</option>
                <option value="ubuntu_16_server"
                <?php
               if(isset($_POST["sistema_operativo"])) { 
                echo 'selected';
               }
               elseif(isset($_SESSION["datos_proyecto"][2])) {
                echo 'selected';
               }
               ?>
               >Ubuntu 16 Server</option>
              </select>
            </div>
          </div>

  <?php
  if( (isset($_POST["nombre_proyecto"]) && isset($_POST["sistema_operativo"])) || isset($_SESSION["datos_proyecto"])) {
    $_SESSION["datos_proyecto"];
  }
  else {
    ?>
    <button class="btn btn-block btn-success" type="submit">
      <span class="glyphicon glyphicon-cloud-download"></span>Siguiente »
    </button>

    <?php
  }
  ?>


</form>

    <?php
    if(isset($_POST["nombre_proyecto"]) && isset($_POST["sistema_operativo"]) && $_POST["abortar_despliegue"] != "eliminar") {
      $_SESSION["datos_proyecto"][1] = $_POST["nombre_proyecto"];
      $_SESSION["datos_proyecto"][2] = $_POST["sistema_operativo"];
    }
    ?>

          <?php
          if(isset($_SESSION["datos_proyecto"])) {
          include('./desplegar-infraestructura.php');
          }

          if( isset($_SESSION["infraestructura"]) && ($_POST["baremetal_ip"] || $_POST["vagrant_ip"] || $_POST["ec2_tipo"] || $_POST["openstack_ip"] ) || isset($_SESSION["servicios"]) ) {
            //include('./desplegar-seleccionservicios.php');
            //if(isset($_SESSION["tipo_servicio"]) && $_SESSION["tipo_servicio"] == "servicio" ) {
              include('./desplegar-servicios.php');
            //}
            //elseif(isset($_SESSION["tipo_servicio"]) && $_SESSION["tipo_servicio"] == "microservicio" ) {
            //  include('./desplegar-microservicios.php');
            //}
          }

          if( isset($_SESSION["infraestructura"]) && ($_POST["docker_ip_equipo"]) || ( isset($_SESSION["tipo_servicio"]) && $_SESSION["tipo_servicio"] = "microservicio" ) ) {
            include('./desplegar-microservicios.php');
          }
          ?>

        </div>

        <?php
      }
      ?>






    </div>
  </div>

  <div class="col-md-4 fjg-col">

    <h3>Resumen</h3>

    <br>
    <h5>Infraestructura</h5>
    <p>
      <?php

      if(isset($_SESSION["infraestructura"])) {
        echo ucfirst($_SESSION["infraestructura"]);
      }
      ?>
    </p>
    <hr>
    <h5>Servicios</h5>
    <p>      <?php
    if(isset($_SESSION["servicio"])) {
      foreach($_SESSION["servicio"] AS $servicio) {
        echo '<form action="" method="POST">
        '.$servicio.'
        <button class="btn btn-outline-danger fjg-eliminar-servicio" type="submit" name="'.$servicio.'" value="eliminar">Borrar</button>
        </form>';
      }
    }
    ?>
  </p>


  <form action="" method="POST">
    <button  value="eliminar" class="btn btn-block btn-danger" type="submit" name="abortar_despliegue">
      <span class="glyphicon glyphicon-cloud-download"></span>Borrar datos
    </button>
  </form>

</div>


</div>