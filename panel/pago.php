<?php
include"../api/funciones/funciones.php";
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <?php include"header.php";?>
  <title>Pagos</title>

<body>

  <div class="nav-bar">
    <?php include"cabecera.php";?>      
  </div>
  <div id="sidebar" class="sidebar-close">
    <?php include"sidebar.php";?>     
  </div>
  <div id="content-wrapper" class="content-wrapper-close">
    <div class="content-header">Realizar pago</div>
    <div class="content-body">

      <div class="container-fluid">
        <div class="row">
      <!--Boton de pago-->
          <div class="col-md-4">
            <div class="Box-Info">
              <div class="Box-Header content-header">
                Pagar con Pay-Pal
              </div>
              <div class="Box-Body">
                <div id="paypal-button-container"></div>
              </div>
              <div class="Box-Footer">
                
              </div>        
            </div> 
          </div>

          <!--Detalle de pago-->
          <div class="col-md-8">
            <div class="Box-Info">
              <div class="Box-Header content-header">
                Mis Pagos
              </div>
              <div class="Box-Body">
                <div id="pagos"></div>
              </div>
              <div class="Box-Footer">
              </div>        
            </div> 
          </div>
        </div>
      </div>
      
    </div>
    <div class="content-footer"></div>
  </div>
  

</body>
<script>
  Pagar('<?php echo base64_decode($_SESSION['tipo'])?>');
  GetPagos();
</script>
</html>