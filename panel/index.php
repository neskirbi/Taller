<?php
include"../api/funciones/funciones.php";
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
   <?php include"header.php";?>
	<title>Inicio</title>

<body>

  <div class="nav-bar">
    <?php include"cabecera.php";?>      
  </div>
  <div id="sidebar" class="sidebar-close">
    <?php include"sidebar.php";?>     
  </div>
  <div id="content-wrapper" class="content-wrapper-close">
    <div class="content-header"><i class="fas fa-home"></i> Inicio </div>
    <div class="content-body align-center">

      <!--Card Success-->
      <div class="menu-card border-round10" onclick="//Redireccion('dashboard.php');">
        <div class="card-Header content-header">
          Dashboard
        </div>
        <div class="card-Body">
          <img src="images/misimagenes/dash.png" width="300px">
          
        </div>
        <div class="card-Footer">
          
        </div> 
      </div>

       <!--Card Success-->
      
      <div class="menu-card border-round10" onclick="Redireccion('inventario.php');">
        <div class="card-Header content-header">
          Inventario
        </div>
        <div class="card-Body">
          <img src="images/misimagenes/inventario.jpg" width="300px">          
        </div>
        <div class="card-Footer">
          
        </div> 
      </div>

       <!--Card Success-->
     


       <!--Card Success-->
      <!--<div class="menu-card border-round10" onclick="Redireccion('pago.php');">
        <div class="card-Header content-header">
          Mis Pagos
        </div>
        <div class="card-Body">
          <img src="images/misimagenes/pago.png" width="300px">
          
        </div>
        <div class="card-Footer">
          
        </div> 
      </div>
-->
      
    </div>
  </div>
  
  

</body>
<script type="text/javascript">
	
</script>
</html>