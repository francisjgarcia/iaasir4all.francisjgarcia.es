<div class="row">
  <div class="col">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb" style="display: flex;align-items: center; justify-content: space-between;">
        <span style="display: flex;align-items: center; width: auto;">
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
          <?php
          if(isset($submenu)) {
            ?>
            <li class="breadcrumb-item active" aria-current="page"><?=$submenu?></li>
          <?php
          }
          ?>
        </span>
          <li><a class="btn btn-success" href="/dashboard/desplegar" style="font-size: 14px; padding: 6px 8px">DESPLEGAR</a></li>
      </ol>
    </nav>
    
  </div>
</div>