<div class="menu-header">
  <!--<center><input type="text" class="buscar-side" id="buscar" placeholder="Buscar"></center>-->
</div>
  

  <div onclick ="Redireccion('index.php');">
      <i class="fas fa-home"></i> Inicio
    </a>
  </div>
  
  <div onclick ="Redireccion('dashboard.php');">
      <i class="fa  fa-bar-chart"></i> Dashboard
    </a>
  </div>
  

  <?php
  if (base64_decode($_SESSION['tipo'])==1) {
    ?>
  <div onclick ="Redireccion('mapa.php');">
      <i class="fa fa-map"></i> Hubicación
    </a>
  </div>
   
  <div onclick ="Redireccion('brigada.php');">
    <i class="fa fa-users"></i> Equipo
    </a>
  </div>
  <?php
  }
  ?>

  <?php 
  if (base64_decode($_SESSION['tipo'])==2) {
    ?>
  <div onclick ="Redireccion('coordinadores.php');">
    <i class="fa fa-users"></i> Equipo
    </a>
  </div>    
  <?php
  }
  ?> 
  <div onclick ="Redireccion('salir.php');">
      <i class="fa fa-sign-out"></i>Salir
    </a>
  </div>
 
