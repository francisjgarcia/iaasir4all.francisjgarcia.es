<hr style="margin-top: -10px">
<h4>Tipo de servicio</h4>
<div class="form-group row fjg-services-group">
  <div class="col-md-12">
    <form method="POST" class="fjg-row-form">

      <select class="form-control fjg-select-menu" name="seleccionar_tipo_servicio" id="seleccionar_tipo_servicio" 
      <?php
      if(isset($_POST["seleccionar_tipo_servicio"]) || isset($_SESSION["tipo_servicio"])) { 
        echo 'disabled';
      }
      ?>
      >
      <option value="" disabled <?php
      if(!isset($_POST["seleccionar_tipo_servicio"])) { 
        echo 'selected';
      }
      ?>>Seleccionar tipo de servicio</option>
      <option value="servicio"<?php
      if( (isset($_POST["seleccionar_tipo_servicio"]) && $_POST["seleccionar_tipo_servicio"] == "servicio") || isset($_SESSION["tipo_servicio"]) && $_SESSION["tipo_servicio"] == "servicio" ) { 
        echo 'selected';
      }
      ?>>Servicio</option>
      <option value="microservicio"<?php
      if( (isset($_POST["seleccionar_tipo_servicio"]) && $_POST["seleccionar_tipo_servicio"] == "microservicio") || isset($_SESSION["tipo_servicio"]) && $_SESSION["tipo_servicio"] == "microservicio" ) { 
        echo 'selected';
      }
      ?>>Microservicio</option>
    </select>
    <?php
    if(isset($_POST["seleccionar_tipo_servicio"]) || isset($_SESSION["tipo_servicio"])) { 
    }
    else {
      ?>
      <button class="btn btn-success" id="btn-add-infraestructura">
        <span class="glyphicon glyphicon-plus">+</span>
      </button>
      <?php
    }
    ?>
  </form>
  <?php
  if(isset($_POST["seleccionar_tipo_servicio"]) && $_POST["abortar_despliegue"] != "eliminar") {
    $_SESSION["tipo_servicio"] = $_POST["seleccionar_tipo_servicio"];
  }
  ?>
</div>
</div>