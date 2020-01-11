<?php
include"../api/funciones/funciones.php";
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
   <?php include"header.php";?>
	<title>Dashboard</title>

<body>

  <div class="nav-bar">
    <?php include"cabecera.php";?>      
  </div>
  <div id="sidebar" class="sidebar-close">
    <?php include"sidebar.php";?>     
  </div>
  <div id="content-wrapper" class="content-wrapper-close">
    <div class="content-header"><i class="fas fa-chart-line"></i> Graficos</div>
    <div class="content-body full">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-6">
            <div class="Box-Info margin-top-20">
              <div class="Box-Header content-header">
                <i class="fas fa-coins"></i> Ventas por mes
                <div class=" width-30 float-right">
                  <input type="year" class="form-control datepicker_anios" onchange="GVentasMeses();">
                </div>                
              </div>
              <div class="Box-Body">
                <div id="gventas-mes"></div>
              </div>
              <div class="Box-Footer">
                
              </div>        
            </div> 
          </div>

          <div class="col-md-6">
            <div class="Box-Info margin-top-20">
              <div class="Box-Header content-header">
                <i class="fas fa-coins"></i> Ventas                
              </div>
              <div class="Box-Body">
                <div id="gventas"></div>
                
              </div>
              <div class="Box-Footer">
                
              </div>        
            </div> 
          </div>

        </div>

        <div class="row">

          <div class="col-md-6">
            <div class="Box-Info margin-top-20">
              <div class="Box-Header content-header">
                <i class="fas fa-box-open"></i> Inventario por mes
                <div class=" width-30 float-right">
                  <input type="year" class="form-control datepicker_anios" onchange="GInventarioMeses();">
                </div>                
              </div>
              <div class="Box-Body">
                <div id="ginventario-mes"></div>
              </div>
              <div class="Box-Footer">
                
              </div>        
            </div> 
          </div>

          <div class="col-md-6">
            <div class="Box-Info margin-top-20">
              <div class="Box-Header content-header">
                <i class="fas fa-box-open"></i> Inventario                
              </div>
              <div class="Box-Body">
                <div id="ginventario" ></div>
                
              </div>
              <div class="Box-Footer">
                
              </div>        
            </div> 
          </div>

        </div>
      </div>
    </div>
  </div>
  

</body>
<script type="text/javascript">
  GVentas();
  GInventario();
  GVentasMeses();	
  GInventarioMeses();
</script>
</html>