<?php
include"../api/funciones/funciones.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
   <?php include"header.php";?>
	<title>Ubicación</title>

<body>

  <div class="nav-bar">
    <?php include"cabecera.php";?>      
  </div>
  <div id="sidebar" class="sidebar-close">
    <?php include"sidebar.php";?>     
  </div>
  <div id="content-wrapper" class="content-wrapper-close">
    
    <div class="content-header with-bborder"><i class="fa fa-map"></i> Ubicación </div>
      <div class="content-body">

        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-3">
              <div class="Box-Primary altoto"  data-alto="90" data-element="content-wrapper" style=" overflow-y: scroll;">
                
                <div class="Box-Header content-header">
                  Equipo <input class="form-control" type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>">
                </div>

                <div id="content-equipo" class="Box-Body">
                </div>

                <div class="Box-Footer">
                  
                </div>

              </div>
            </div>


            <div class="col-sm-9 ">

              <div class="Box-Primary altoto" data-alto="90" data-element="content-wrapper">
                <div class="Box-Header content-header">
                  
                </div>
                <div class="Box-Body altoto" data-alto="80"  data-element="content-wrapper">                   
                  <div id="content" class="altoto" data-alto="78"  data-element="content-wrapper"></div>
                </div>
                <div class="Box-Footer">
                  
                </div>        
              </div> 
            </div>

          </div>
        </div>

      </div>
      <div class="content-footer">pie</div>
    </div>
  </div>

  <div id="time" class="time border-round"></div>
  

</body>
<script type="text/javascript">
	

  $(document).ready(function(){
    setTimeout(function(){ Location_gps(); }, 500);
    setInterval(function(){ Clock();},1000);
  });
  
</script>
</html>