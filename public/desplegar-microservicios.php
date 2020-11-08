<hr>
<h4>Microservicios</h4>
<div class="form-group row fjg-services-group">
  <div class="col-md-12">
    <form method="POST" class="fjg-row-form">

      <select class="form-control fjg-select-menu" name="seleccionar_servicio">
        <option value="" disabled selected>Seleccionar microservicio</option>
        <option value="apache">Apache</option>
        <option value="nginx">Nginx</option>
        <option value="vsftpd">Vsftpd</option>
        <option value="mysql">MySQL</option>
        <option value="postgresql">PostgreSQL</option>
        <option value="postfix">Postfix</option>
      </select>

      <button class="btn btn-success" id="btn-add-service">
        <span class="glyphicon glyphicon-plus">+</span>
      </button>

    </form>

    <?php
    if(isset($_POST["seleccionar_servicio"])) {
      if($_POST["seleccionar_servicio"] == "apache") {
        $_SESSION['servicio'][1] = "apache";
      }

      if($_POST["seleccionar_servicio"] == "nginx") {
        $_SESSION['servicio'][2] = "nginx";
      }

      if($_POST["seleccionar_servicio"] == "vsftpd") {
        $_SESSION['servicio'][3] = "vsftpd";
      }

      if($_POST["seleccionar_servicio"] == "mysql") {
        $_SESSION['servicio'][4] = "mysql";
      }

      if($_POST["seleccionar_servicio"] == "postgresql") {
        $_SESSION['servicio'][5] = "postgresql";
      }
      if($_POST["seleccionar_servicio"] == "postfix") {
        $_SESSION['servicio'][6] = "postfix";
      }
    }
    ?>

    <div class="form-group row fjg-services-group">
      <?php
      if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "baremetal") {
        include('./desplegar-baremetal.php');
      }

      if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "vagrant") {
        include('./desplegar-vagrant.php');
      }

      if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "docker") {
        include('./desplegar-docker.php');
      }

      if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "ec2") {
        include('./desplegar-ec2.php');
      }

      if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "openstack") {
        echo "openstack";
        include('./desplegar-openstack.php');
      }
      ?>
    </div>


  </div>
</div>