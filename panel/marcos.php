<?php
include"../api/funciones/funciones.php";
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
   <?php include"header.php";?>
	<title>Marcos</title>

<body>

  <div class="nav-bar">
    <?php include"cabecera.php";?>      
  </div>
  <div id="sidebar" class="sidebar-close">
    <?php include"sidebar.php";?>     
  </div>
  <div id="content-wrapper" class="content-wrapper-close">
    <div class="content-header"><i class="far fa-window-maximize"></i> Marcos </div>
    <div class="content-body">

      <!--Box Success-->
      <div class="col-md-3">
        <div class="Box-Success">
          <div class="Box-Header content-header">
            Encabezado
          </div>
          <div class="Box-Body">
            Cuerpo
          </div>
          <div class="Box-Footer">
            Pie
          </div>        
        </div> 
      </div>

      <!--Box Info-->
      <div class="col-md-3">
        <div class="Box-Info">
          <div class="Box-Header content-header">
            Encabezado
          </div>
          <div class="Box-Body">
            Cuerpo
          </div>
          <div class="Box-Footer">
            Pie
          </div>        
        </div> 
      </div>  

      <!--Box Primary-->
      <div class="col-md-3">
        <div class="Box-Primary">
          <div class="Box-Header content-header">
            Encabezado
          </div>
          <div class="Box-Body">
            Cuerpo
          </div>
          <div class="Box-Footer">
            Pie
          </div>        
        </div> 
      </div>

      <!--Box Warning-->
      <div class="col-md-3">
        <div class="Box-Warning">
          <div class="Box-Header content-header">
            Encabezado
          </div>
          <div class="Box-Body">
            Cuerpo
          </div>
          <div class="Box-Footer">
            Pie
          </div>        
        </div> 
      </div>

      <!--Box Danger-->
      <div class="col-md-3">
        <div class="Box-Danger">
          <div class="Box-Header content-header">
            Encabezado
          </div>
          <div class="Box-Body"> 
          </div>
          <div class="Box-Footer">
            Pie
          </div>        
        </div> 
      </div>

      <!--Box Success-->
      <div class="col-md-3">
        <div class="Box-Success">
          <div class="Box-Header content-header">
            Encabezado
          </div>
          <div class="Box-Body">
            <div class="media border-round">
              <div class="media-left">
                <a href="#">
                  <img class="media-object img-circle" data-src="holder.js/64x64" alt="64x64" src="https://pickaface.net/gallery/avatar/unr_profe_180618_2120_banm.png" data-holder-rendered="true" style="width: 80px; height: 80px;">
                </a>
              </div>
              <div class="media-body parent">
                <div id="nombre" class="bold">Nombre</div>
                <div id="fecha" class="">Fecha</div>
                <div class="bottom controls">
                  <a class="btn btn-default btn-xs"><img src="iconcolor/map-marker-green.png" ></img></a>
                  <a class="btn btn-default btn-xs"><img src="iconcolor/route.png" ></img></a>
                  <a class="btn btn-default btn-xs"><img src="iconcolor/75.png" ></img></a>
                  <a class="btn btn-default btn-xs"><img src="iconcolor/reportes.png" ></img></a>
                </div>
              </div> 
            </div>
          </div>
          <div class="Box-Footer">
            Pie
          </div>        
        </div> 
      </div>

    </div>
  </div>

  
  

</body>
<script type="text/javascript">
	
</script>
</html>

<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="..." alt="...">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">Media heading</h4>
    ...
  </div>
</div>