<?php
include('./header.php');

if(isset($_SESSION["iniciada"]) && $_SESSION["iniciada"] = true){
  include('./nav-dashboard.php');
  ?>

  <!-- BANNER -->
  <div class="jumbotron text-center">
    <div class="container">
      <h2 class="jumbotron-heading">Despliegue de servicios e infraestructuras</h2>
      <p class="lead text-muted mb-4" style="margin-bottom: 0 !important">Antes de nada, asegúrate de que el equipo o nube privada en la que vas a desplegar los diferentes servicios e infraestructuras es accesible desde internet. Todas las conexiones se van a realizar mediante el protocolo SSH.</p>
    </div>
  </div>
  <!-- FIN BANNER -->

  <!-- CONTENIDO -->
  <div class="container">

    <?php
    if ($_GET['dashboard'] == "proyectos" || !isset($_GET['dashboard'])) {
      $submenu = "Proyectos";
      include('./sub-nav.php');
      include('./proyectos.php');
    }
    else if ($_GET['dashboard'] == "desplegar") {
      $submenu = "Desplegar";
      include('./sub-nav.php');
      include('./desplegar.php');
    }
    else if ($_GET['dashboard'] == "ayuda") {
      $submenu = "Ayuda";
      include('./sub-nav.php');
      include('./ayuda.php');
    }

    ?>

  </div>
  <!-- FIN CONTENIDO -->

  <br>

  <?php
  include('./footer.php');
}
else {
  header('Location: /');
}
?>
