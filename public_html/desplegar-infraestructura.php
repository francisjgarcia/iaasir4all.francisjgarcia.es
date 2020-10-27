<hr>
<h4>Infraestructuras</h4>
<div class="form-group row fjg-services-group">
  <div class="col-md-12">
    <form method="POST" class="fjg-row-form">

      <select class="form-control fjg-select-menu" name="seleccionar_infraestructura" id="seleccionar_infraestructura" 
      <?php
      if(isset($_POST["seleccionar_infraestructura"]) || isset($_SESSION["infraestructura"])) { 
        echo 'disabled';
      }
      ?>
      >
      <option value="" disabled <?php
      if(!isset($_POST["seleccionar_infraestructura"])) { 
        echo 'selected';
      }
      ?>>Seleccionar infraestructura</option>
      <option value="baremetal"<?php
      if( (isset($_POST["seleccionar_infraestructura"]) && $_POST["seleccionar_infraestructura"] == "baremetal") || isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "baremetal" ) { 
        echo 'selected';
      }
      ?>>Baremetal</option>
      <option disabled value="vagrant"<?php
      if( (isset($_POST["seleccionar_infraestructura"]) && $_POST["seleccionar_infraestructura"] == "vagrant") || isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "vagrant" ) { 
        echo 'selected';
      }
      ?>>Vagrant</option>
      <option disabled value="docker"<?php
      if( (isset($_POST["seleccionar_infraestructura"]) && $_POST["seleccionar_infraestructura"] == "docker") || isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "docker" ) { 
        echo 'selected';
      }
      ?>>Docker</option>
      <optgroup label="Nube">
        <option value="ec2"<?php
        if( (isset($_POST["seleccionar_infraestructura"]) && $_POST["seleccionar_infraestructura"] == "ec2") || isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "ec2" ) { 
          echo 'selected';
        }
        ?>>Pública (AWS EC2)</option>
        <option disabled value="openstack"<?php
        if( (isset($_POST["seleccionar_infraestructura"]) && $_POST["seleccionar_infraestructura"] == "openstack") || isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "openstack" ) { 
          echo 'selected';
        }
        ?>>Privada (OpenStack)</option>
      </optgroup>
    </select>
    <?php
    if(isset($_POST["seleccionar_infraestructura"]) || isset($_SESSION["infraestructura"])) { 
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
  if(isset($_POST["seleccionar_infraestructura"]) && $_POST["abortar_despliegue"] != "eliminar") {
    $_SESSION["infraestructura"] = $_POST["seleccionar_infraestructura"];
  }
  ?>

  <form action="" method="POST">

    <div class="form-group row fjg-infraestructura-group">

      <?php
      if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "baremetal") {
        ?>
        <div class="col-md-12 fjg-servicio" id="baremetal">
          <hr>
          <h5>Baremetal</h5>
          <div class="form-group row">
            <div class="col-md-5">
              <label for="IP">Dirección IP</label>
              <input type="text" class="form-control" id="baremetal_ip" placeholder="Dirección IP" pattern="(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)_*(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)_*){3}" name="baremetal_ip" required 
              <?php
              if(isset($_POST["baremetal_ip"])) { 
                echo 'value="'.$_POST["baremetal_ip"].'"';
                echo 'disabled';
              }
              elseif(isset($_SESSION["baremetal"][1])) {
                echo 'value="'.$_SESSION["baremetal"][1].'"';
                echo 'disabled';
              }
              ?>
              >
            </div>
            <div class="col-md-2">
              <label for="Puerto">Puerto</label>
              <input type="number" class="form-control" id="baremetal_puerto" placeholder="Puerto" name="baremetal_puerto" required 
              <?php
              if(isset($_POST["baremetal_puerto"])) { 
                echo 'value="'.$_POST["baremetal_puerto"].'"';
                echo 'disabled';
              }
              elseif(isset($_SESSION["baremetal"][2])) {
                echo 'value="'.$_SESSION["baremetal"][2].'"';
                echo 'disabled';
              }
              else {
                echo 'value="22"';
              }
              ?>
              >
            </div>
            <div class="col-md-4 fjg-ssh-key">
              <label for="SSH">Seleccionar clave SSH</label>
              <select class="form-control" name="baremetal_key" id="baremetal_key" required 
              <?php
              if(isset($_POST["baremetal_key"]) || isset($_SESSION["baremetal"][3])) { 
                echo 'disabled';
              }
              ?>
              >
              <option value="" <?php
              if(!isset($_POST["baremetal_key"]) && !isset($_SESSION["baremetal"][3])) { 
                echo 'selected';
              }
              ?>
              >Seleccionar SSH Key</option>

              <?php

// Create connection
              $conn = new mysqli("localhost", "pasir_user", "RvK~6?XFuU.", "dbpasir_web");
// Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              } 

              $sql3 = "SELECT * FROM ssh_keys WHERE usuario = $_SESSION[id]";
              $result = $conn->query($sql3);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  ?>

                  <option value="<?=$row["nombre"]?>" <?php
                  if(isset($_POST["baremetal_key"]) || isset($_SESSION["baremetal"][3]) ) { 
                    echo 'selected';
                  }
                  ?>><?=$row["nombre"]?></option>
                  <?php
                }
              } else {
                echo "0 results";
              }
              $conn->close();
              ?>

            </select>
          </div>
          <div class="col-md-1 fjg-ssh-key-btn">
            <button type="button" style="cursor: pointer; margin-top: 33px; margin-left: -26px; max-height: 35px" class="btn btn-success" data-toggle="modal" data-target="#ssh-key">
              <span class="glyphicon glyphicon-plus">+</span>
            </button>
          </div>
        </div>
      </div>
      <?php
    }

    if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "vagrant") {
     ?>
     <div class="col-md-12 fjg-servicio" id="vagrant">
      <hr>
      <h5>Vagrant</h5>
      <div class="form-group row">
        <div class="col-md-5">
          <label for="IP">Dirección IP</label>
          <input type="text" class="form-control" id="vagrant_ip" placeholder="Dirección IP" pattern="(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)_*(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)_*){3}" name="vagrant_ip" required
          <?php
          if(isset($_POST["vagrant_ip"])) { 
            echo 'value="'.$_POST["vagrant_ip"].'"';
            echo 'disabled';
          }
          elseif(isset($_SESSION["vagrant"][1])) {
            echo 'value="'.$_SESSION["vagrant"][1].'"';
            echo 'disabled';
          }
          ?>
          >
        </div>
        <div class="col-md-2">
          <label for="Puerto">Puerto</label>
          <input type="number" class="form-control" id="vagrant_puerto" placeholder="Puerto"name="vagrant_puerto" required 
          <?php
          if(isset($_POST["vagrant_puerto"])) { 
            echo 'value="'.$_POST["vagrant_puerto"].'"';
            echo 'disabled';
          }
          elseif(isset($_SESSION["vagrant"][2])) {
            echo 'value="'.$_SESSION["vagrant"][2].'"';
            echo 'disabled';
          }
          else {
            echo 'value="22"';
          }
          ?>
          >
        </div>
        <div class="col-md-5">
          <label for="SSH">Seleccionar clave SSH</label>
          <select class="form-control" name="vagrant_key" id="vagrant_key" required 
          <?php
          if(isset($_POST["vagrant_key"]) || isset($_SESSION["vagrant"][3])) { 
            echo 'disabled';
          }
          ?>
          >
          <option value="" <?php
          if(!isset($_POST["vagrant_key"]) && !isset($_SESSION["vagrant"][3])) { 
            echo 'selected';
          }
          ?>
          >Seleccionar SSH Key</option>
          <option value="FJG" <?php
          if(isset($_POST["vagrant_key"]) || isset($_SESSION["vagrant"][3]) ) { 
            echo 'selected';
          }
          ?>
          >FJG</option>
        </select>
      </div>

      <div class="col-md-7">
        <label for="Hostname">Hostname</label>
        <input type="text" class="form-control" id="vagrant_hostname" placeholder="Hostname" name="vagrant_hostname" required
        <?php
        if(isset($_POST["vagrant_hostname"])) { 
          echo 'value="'.$_POST["vagrant_hostname"].'"';
          echo 'disabled';
        }
        elseif(isset($_SESSION["vagrant"][4])) {
          echo 'value="'.$_SESSION["vagrant"][4].'"';
          echo 'disabled';
        }
        ?>
        >
      </div>

      <div class="col-md-5">
        <label for="Imagen">Seleccionar imagen</label>

        <select class="form-control" name="vagrant_imagen" id="vagrant_imagen" required 
        <?php
        if(isset($_POST["vagrant_imagen"]) || isset($_SESSION["vagrant"][5])) { 
          echo 'disabled';
        }
        ?>
        >
        <option value="" <?php
        if(!isset($_POST["vagrant_imagen"]) && !isset($_SESSION["vagrant"][5])) { 
          echo 'selected';
        }
        ?>
        >Seleccionar imagen</option>
        <option value="ubuntu/trusty64" <?php
        if(isset($_POST["vagrant_imagen"]) || isset($_SESSION["vagrant"][5]) ) { 
          echo 'selected';
        }
        ?>
        >Ubuntu 16 x64</option>
      </select>


    </div>

    <div class="col-md-5">
      <label for="IP VM">IP pública VM</label>
      <input type="text" class="form-control" id="vagrant_ip_publica" placeholder="IP pública VM" pattern="(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)_*(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)_*){3}" name="vagrant_ip_publica" required
      <?php
      if(isset($_POST["vagrant_ip_publica"])) { 
        echo 'value="'.$_POST["vagrant_ip_publica"].'"';
        echo 'disabled';
      }
      elseif(isset($_SESSION["vagrant"][6])) {
        echo 'value="'.$_SESSION["vagrant"][6].'"';
        echo 'disabled';
      }
      ?>
      >
    </div>

    <div class="col-md-5">
      <label for="Directorio remoto">Directorio remoto</label>
      <input type="text" class="form-control" id="vagrant_directorio_remoto" placeholder="Directorio remoto" name="vagrant_directorio_remoto" required
      <?php
      if(isset($_POST["vagrant_directorio_remoto"])) { 
        echo 'value="'.$_POST["vagrant_directorio_remoto"].'"';
        echo 'disabled';
      }
      elseif(isset($_SESSION["vagrant"][9])) {
        echo 'value="'.$_SESSION["vagrant"][9].'"';
        echo 'disabled';
      }
      ?>
      >
    </div>

    <div class="col-md-5">
      <label for="IP VM">IP privada VM</label>
      <input type="text" class="form-control" id="vagrant_ip_privada" placeholder="IP privada VM" pattern="(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)_*(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)_*){3}" name="vagrant_ip_privada" required
      <?php
      if(isset($_POST["vagrant_ip_privada"])) { 
        echo 'value="'.$_POST["vagrant_ip_privada"].'"';
        echo 'disabled';
      }
      elseif(isset($_SESSION["vagrant"][7])) {
        echo 'value="'.$_SESSION["vagrant"][7].'"';
        echo 'disabled';
      }
      ?>
      >
    </div>

    <div class="col-md-5">
      <label for="Directorio externo">Directorio externo</label>
      <input type="text" class="form-control" id="vagrant_directorio_externo" placeholder="Directorio externo" name="vagrant_directorio_externo" required
      <?php
      if(isset($_POST["vagrant_directorio_externo"])) { 
        echo 'value="'.$_POST["vagrant_directorio_externo"].'"';
        echo 'disabled';
      }
      elseif(isset($_SESSION["vagrant"][10])) {
        echo 'value="'.$_SESSION["vagrant"][10].'"';
        echo 'disabled';
      }
      ?>
      >
    </div>

    <div class="col-md-5">
      <label for="Directorio interno">Directorio interno</label>
      <input type="text" class="form-control" id="vagrant_directorio_interno" placeholder="Directorio interno" name="vagrant_directorio_interno" required
      <?php
      if(isset($_POST["vagrant_directorio_interno"])) { 
        echo 'value="'.$_POST["vagrant_directorio_interno"].'"';
        echo 'disabled';
      }
      elseif(isset($_SESSION["vagrant"][11])) {
        echo 'value="'.$_SESSION["vagrant"][11].'"';
        echo 'disabled';
      }
      ?>
      >
    </div>

    <div class="col-md-2">
      <label for="Adaptador">Adaptador</label>
      <input type="text" class="form-control" id="vagrant_adaptador_red" placeholder="Adaptador de red"name="vagrant_adaptador_red" required
      <?php
      if(isset($_POST["vagrant_adaptador_red"])) { 
        echo 'value="'.$_POST["vagrant_adaptador_red"].'"';
        echo 'disabled';
      }
      elseif(isset($_SESSION["vagrant"][8])) {
        echo 'value="'.$_SESSION["vagrant"][8].'"';
        echo 'disabled';
      }
      else {
        echo 'value="eth0"';
      }
      ?>
      >
    </div>

  </div>
</div>
<?php
}

if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "docker") {
  ?>
  <div class="col-md-12 fjg-servicio" id="docker">
    <hr>
    <h5>Docker</h5>
    <div class="form-group row">
      <div class="col-md-5">
        <label for="IP equipo anfitrión">IP equipo anfitrión</label>
        <input type="text" class="form-control" id="docker_ip_equipo" placeholder="IP equipo anfitrión" pattern="(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)_*(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)_*){3}" name="docker_ip_equipo" required
        <?php
        if(isset($_POST["docker_ip_equipo"])) { 
          echo 'value="'.$_POST["docker_ip_equipo"].'"';
          echo 'disabled';
        }
        elseif(isset($_SESSION["docker"][1])) {
          echo 'value="'.$_SESSION["docker"][1].'"';
          echo 'disabled';
        }
        ?>
        >
      </div>
      <div class="col-md-2">
        <label for="Puerto equipo anfitrión">Puerto</label>
        <input type="number" class="form-control" id="docker_puerto_equipo" placeholder="Puerto equipo anfitrion" name="docker_puerto_equipo" required
        <?php
        if(isset($_POST["docker_puerto_equipo"])) { 
          echo 'value="'.$_POST["docker_puerto_equipo"].'"';
          echo 'disabled';
        }
        elseif(isset($_SESSION["docker"][2])) {
          echo 'value="'.$_SESSION["docker"][2].'"';
          echo 'disabled';
        }
        else {
          echo 'value="22"';
        }
        ?>
        >
      </div>
      <div class="col-md-5">
        <label for="SSH">Seleccionar clave SSH</label>
        <select class="form-control" name="docker_key" id="docker_key" required 
        <?php
        if(isset($_POST["docker_key"]) || isset($_SESSION["docker"][3])) { 
          echo 'disabled';
        }
        ?>
        >
        <option value="" <?php
        if(!isset($_POST["docker_key"]) && !isset($_SESSION["docker"][3])) { 
          echo 'selected';
        }
        ?>
        >Seleccionar SSH Key</option>
        <option value="FJG" <?php
        if(isset($_POST["docker_key"]) || isset($_SESSION["docker"][3]) ) { 
          echo 'selected';
        }
        ?>
        >FJG</option>
      </select>
    </div>

  </div>
</div>
<?php
}

if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "ec2") {
  ?>
  <div class="col-md-12 fjg-servicio" id="ec2">
    <hr>
    <h5>AWS EC2</h5>
    <div class="form-group row">
      <div class="col-md-4">
        <label for="Tipo de instancia">Tipo de instancia</label>

        <select class="form-control" name="ec2_tipo" id="ec2_tipo" required 
        <?php
        if(isset($_POST["ec2_tipo"]) || isset($_SESSION["ec2"][1])) { 
          echo 'disabled';
        }
        ?>
        >
        <option value="" <?php
        if(!isset($_POST["ec2_tipo"]) && !isset($_SESSION["ec2"][1])) { 
          echo 'selected';
        }
        ?>
        >Tipo de instancia</option>
        <option value="t2.micro" <?php
        if(isset($_POST["ec2_tipo"]) || isset($_SESSION["ec2"][1]) ) { 
          echo 'selected';
        }
        ?>
        >t2.micro</option>
      </select>
    </div>
    <div class="col-md-4">
      <label for="Imagen">Imagen</label>

      <select class="form-control" name="ec2_imagen" id="ec2_imagen" required 
      <?php
      if(isset($_POST["ec2_imagen"]) || isset($_SESSION["ec2"][2])) { 
        echo 'disabled';
      }
      ?>
      >
      <option value="" <?php
      if(!isset($_POST["ec2_imagen"]) && !isset($_SESSION["ec2"][2])) { 
        echo 'selected';
      }
      ?>
      >Imagen</option>
      <option value="t2.ubuntu_16_x64" <?php
      if(isset($_POST["ec2_imagen"]) || isset($_SESSION["ec2"][2]) ) { 
        echo 'selected';
      }
      ?>
      >Ubuntu 16 Server</option>
    </select>

  </div>

  <div class="col-md-4">
    <label for="Región">Región</label>


    <select class="form-control" name="ec2_region" id="ec2_region" required 
    <?php
    if(isset($_POST["ec2_region"]) || isset($_SESSION["ec2"][3])) { 
      echo 'disabled';
    }
    ?>
    >
    <option value="" <?php
    if(!isset($_POST["ec2_region"]) && !isset($_SESSION["ec2"][3])) { 
      echo 'selected';
    }
    ?>
    >Región</option>
    <option value="eu-west-3" <?php
    if(isset($_POST["ec2_region"]) || isset($_SESSION["ec2"][3]) ) { 
      echo 'selected';
    }
    ?>
    >París</option>
    <option value="ap-southeast-2" <?php
    if(isset($_POST["ec2_region"]) || isset($_SESSION["ec2"][3]) ) { 
      echo 'selected';
    }
    ?>
    >Sídney</option>
  </select>
</div>
<div class="col-md-5 fjg-ssh-key">
  <label for="SSH">Clave SSH</label>
  <select class="form-control" name="ec2_key" id="ec2_key" required 
  <?php
  if(isset($_POST["ec2_key"]) || isset($_SESSION["ec2"][4])) { 
    echo 'disabled';
  }
  ?>
  >
  <option value="" <?php
  if(!isset($_POST["ec2_key"]) && !isset($_SESSION["ec2"][4])) { 
    echo 'selected';
  }
  ?>
  >Seleccionar SSH Key</option>

  <?php

// Create connection
  $conn = new mysqli("localhost", "pasir_user", "RvK~6?XFuU.", "dbpasir_web");
// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  $sql3 = "SELECT * FROM ssh_keys WHERE usuario = $_SESSION[id]";
  $result = $conn->query($sql3);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      ?>

      <option value="<?=$row["nombre"]?>" <?php
      if(isset($_POST["ec2_key"]) || isset($_SESSION["ec2"][4]) ) { 
        echo 'selected';
      }
      ?>><?=$row["nombre"]?></option>
      <?php
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  ?>

</select>
</div>
<div class="col-md-1 fjg-ssh-key-btn">
  <button type="button" style="cursor: pointer; margin-top: 33px; margin-left: -26px; max-height: 35px" class="btn btn-success" data-toggle="modal" data-target="#ssh-key">
    <span class="glyphicon glyphicon-plus">+</span>
  </button>
</div>

<div class="col-md-6">
  <label for="Secret Key">Secret Key</label>
  <input type="text" class="form-control" id="ec2_secret_key" placeholder="Secret Key" name="ec2_secret_key" required
  <?php
  if(isset($_POST["ec2_secret_key"])) { 
    echo 'value="'.$_POST["ec2_secret_key"].'"';
    echo 'disabled';
  }
  elseif(isset($_SESSION["ec2"][6])) {
    echo 'value="'.$_SESSION["ec2"][6].'"';
    echo 'disabled';
  }
  ?>
  >
</div>

<div class="col-md-4">
  <label for="Access Key">Access Key</label>
  <input type="text" class="form-control" id="ec2_access_key" placeholder="Access Key" name="ec2_access_key" required
  <?php
  if(isset($_POST["ec2_access_key"])) { 
    echo 'value="'.$_POST["ec2_access_key"].'"';
    echo 'disabled';
  }
  elseif(isset($_SESSION["ec2"][5])) {
    echo 'value="'.$_SESSION["ec2"][5].'"';
    echo 'disabled';
  }
  ?>
  >
</div>

<div class="col-md-4">
  <label for="Hostname">Hostname</label>
  <input type="text" class="form-control" id="ec2_hostname" placeholder="Hostname" name="ec2_hostname" required
  <?php
  if(isset($_POST["ec2_hostname"])) { 
    echo 'value="'.$_POST["ec2_hostname"].'"';
    echo 'disabled';
  }
  elseif(isset($_SESSION["ec2"][7])) {
    echo 'value="'.$_SESSION["ec2"][7].'"';
    echo 'disabled';
  }
  ?>
  >
</div>

<div class="col-md-4">
  <label for="Puerto externo">Puerto externo</label>
  <input type="text" class="form-control" id="ec2_puerto_externo" placeholder="Puerto externo" name="ec2_puerto_externo" required
  <?php
  if(isset($_POST["ec2_puerto_externo"])) { 
    echo 'value="'.$_POST["ec2_puerto_externo"].'"';
    echo 'disabled';
  }
  elseif(isset($_SESSION["ec2"][8])) {
    echo 'value="'.$_SESSION["ec2"][8].'"';
    echo 'disabled';
  }
  ?>
  >
</div>
<div class="col-md-4">
  <label for="Puerto interno">Puerto interno</label>
  <input type="text" class="form-control" id="ec2_puerto_interno" placeholder="Puerto interno" name="ec2_puerto_interno" required
  <?php
  if(isset($_POST["ec2_puerto_interno"])) { 
    echo 'value="'.$_POST["ec2_puerto_interno"].'"';
    echo 'disabled';
  }
  elseif(isset($_SESSION["ec2"][9])) {
    echo 'value="'.$_SESSION["ec2"][9].'"';
    echo 'disabled';
  }
  ?>
  >
</div>

</div>
</div>
<?php
}
?>

</div>

<?php
if(isset($_SESSION["servicios"]) || ( isset($_POST["baremetal_ip"]) || isset($_POST["vagrant_ip"]) || isset($_POST["docker_ip_equipo"]) || isset($_POST["ec2_tipo"]) || isset($_POST["openstack_ip"]) ) ) {
}
elseif(isset($_POST["seleccionar_infraestructura"]) || isset($_SESSION["infraestructura"])) {
  ?>
  
  <button class="btn btn-block btn-success" type="submit">
    <span class="glyphicon glyphicon-cloud-download"></span>Siguiente »
  </button>
  <?php
}
?>

</form>
</div>
</div>

<?php

if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "baremetal" && isset($_POST["baremetal_ip"])) {
  $_SESSION["servicios"] = "OK";
  $_SESSION["baremetal"][1] = $_POST["baremetal_ip"];
  $_SESSION["baremetal"][2] = $_POST["baremetal_puerto"];
  $_SESSION["baremetal"][3] = $_POST["baremetal_key"];
  $_SESSION["fecha_despliegue"] = exec('date +%Y%m%d%s');
  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/');
  exec('echo [hosts] > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts');
  exec('echo '.$_SESSION["baremetal"][1].':'.$_SESSION["baremetal"][2].' ansible_ssh_private_key_file=/hdd-ext/usuarios/'.$_SESSION["username"].'/ssh_keys/'.$_SESSION["baremetal"][3].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts');

  exec('echo "" >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts');

  exec('echo "[hosts:vars]" >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts');
  exec('echo "ansible_ssh_common_args=\'-o StrictHostKeyChecking=no\'" >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura/hosts');
}

if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "vagrant" && isset($_POST["vagrant_ip"])) {
  $_SESSION["servicios"] = "OK";
  echo "VAGRANT";

  $_SESSION["vagrant"][1] = $_POST["vagrant_ip"];
  $_SESSION["vagrant"][2] = $_POST["vagrant_puerto"];
  $_SESSION["vagrant"][3] = $_POST["vagrant_key"];
  $_SESSION["vagrant"][4] = $_POST["vagrant_hostname"];
  $_SESSION["vagrant"][5] = $_POST["vagrant_imagen"];
  $_SESSION["vagrant"][6] = $_POST["vagrant_ip_publica"];
  $_SESSION["vagrant"][7] = $_POST["vagrant_ip_privada"];
  $_SESSION["vagrant"][8] = $_POST["vagrant_adaptador_red"];
  $_SESSION["vagrant"][9] = $_POST["vagrant_directorio_remoto"];
  $_SESSION["vagrant"][10] = $_POST["vagrant_directorio_externo"];
  $_SESSION["vagrant"][11] = $_POST["vagrant_directorio_interno"];
  
  $_SESSION["fecha_despliegue"] = exec('date +%Y%m%d%s');

  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"]);
  exec('echo ip:'.$_SESSION["vagrant"][1].' > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
  exec('echo puerto:'.$_SESSION["vagrant"][2].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
  exec('echo key:'.$_SESSION["vagrant"][3].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
  exec('echo directorioremoto:'.$_SESSION["vagrant"][9].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
  exec('echo hostname:'.$_SESSION["vagrant"][4].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
  exec('echo imagen:'.$_SESSION["vagrant"][5].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
  exec('echo ipprivada:'.$_SESSION["vagrant"][7].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
  exec('echo ippublica:'.$_SESSION["vagrant"][6].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
  exec('echo direrctorioexterno:'.$_SESSION["vagrant"][10].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
  exec('echo directoriointerno:'.$_SESSION["vagrant"][11].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
  exec('echo adaptador:'.$_SESSION["vagrant"][8].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/infraestructura.tmp');
}

if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "docker" && isset($_POST["docker_ip_equipo"])) {
  $_SESSION["tipo_servicio"] = "microservicio";


  $_SESSION["docker"][1] = $_POST["docker_ip_equipo"];
  $_SESSION["docker"][2] = $_POST["docker_puerto_equipo"];
  $_SESSION["docker"][3] = $_POST["docker_key"];
  
  $_SESSION["fecha_despliegue"] = exec('date +%Y%m%d%s');
}

if(isset($_SESSION["infraestructura"]) && $_SESSION["infraestructura"] == "ec2" && isset($_POST["ec2_tipo"])) {
  $_SESSION["servicios"] = "OK";

  $_SESSION["ec2"][1] = $_POST["ec2_tipo"];
  $_SESSION["ec2"][2] = $_POST["ec2_imagen"];
  $_SESSION["ec2"][3] = $_POST["ec2_region"];
  $_SESSION["ec2"][4] = $_POST["ec2_key"];
  $_SESSION["ec2"][5] = $_POST["ec2_access_key"];
  $_SESSION["ec2"][6] = $_POST["ec2_secret_key"];
  $_SESSION["ec2"][7] = $_POST["ec2_hostname"];
  $_SESSION["ec2"][8] = $_POST["ec2_puerto_externo"];
  $_SESSION["ec2"][9] = $_POST["ec2_puerto_interno"];
  
  $_SESSION["fecha_despliegue"] = exec('date +%Y%m%d%s');

  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/');
  exec('sudo echo -e "[hosts]\ninstancia_ec2" > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/hosts');

  exec('mkdir -p /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/');
  exec('echo instance_type: '.$_SESSION["ec2"][1].' > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/vars.yml');
  exec('echo image: '.$_SESSION["ec2"][2].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/vars.yml');
  exec('echo region: '.$_SESSION["ec2"][3].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/vars.yml');
  exec('echo keypair: '.$_SESSION["ec2"][4].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/vars.yml');
  exec('echo aws_access_key: '.$_SESSION["ec2"][5].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/vars.yml');
  exec('echo aws_secret_key: '.$_SESSION["ec2"][6].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/vars.yml');
  exec('echo security_group: '.$_SESSION["ec2"][7].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/vars.yml');
  exec('echo puerto_externo: '.$_SESSION["ec2"][8].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/vars.yml');
  exec('echo puerto_interno: '.$_SESSION["ec2"][9].' >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/vars.yml');
  exec('echo count: 1 >> /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/vars.yml');
  exec('cp /hdd-ext/aprovisionamiento/nube/ec2/ansible/ec2.yml /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/');

  exec('sudo ansible-playbook -i /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/hosts /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/ec2.yml > /hdd-ext/usuarios/'.$_SESSION["username"].'/historial/'.$_SESSION["fecha_despliegue"].'/instancia/salida.txt &');

}

?>

<?php include('./add-key.php') ?>