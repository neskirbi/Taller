<?php
include"../api/funciones/funciones.php";
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <?php include"header.php";?>
  <title>Equipo</title>

<body>

  <div class="nav-bar">
    <?php include"cabecera.php";?>      
  </div>
  <div id="sidebar" class="sidebar-close">
    <?php include"sidebar.php";?>     
  </div>
  <div id="content-wrapper" class="content-wrapper-close">
    <div class="content-header  with-bborder">
      <i class="fa fa-users"></i> Equipo 
    </div>
    
    <div class="content-body">

      <div class="Box-Danger">
        <div class="Box-Header">
          <div class=" in-line width-20">
            <input class="form-control" id="filtrar" placeholder="Buscar" onkeyup="Filtro(this);">
          </div>
          <div class="in-line   float-right">            
            <button onclick="AgregarUsuario();" class="btn btn-primary" data-toggle="modal" data-target="#modal"><i class="fa fa-user-plus"></i> Agregar</button>
          </div>
          
          
        </div>
        <div class="Box-Body">
          <ul class="users-list clearfix"  id="list"></ul>
        </div>
        <div class="Box-Footer">
          
        </div>
        
      </div>    
      
      
    </div>
  </div>
  
 <!-- Modal -->
  <div class="modal fade" id="modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="modal-title" class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="Box-Primary">
           
            <div id="Box-Body" class="Box-Body">
                           
                
            </div>
          </div>
        </div>
        <div id="modal-footer" class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

</body>
<script type="text/javascript">
  var ref="<?php echo $ref; ?>";
  CargarBrigada(ref);
</script>
</html>