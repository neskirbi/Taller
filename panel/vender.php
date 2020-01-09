<?php
include"../api/funciones/funciones.php";
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <?php include"header.php";?>
  <title>Vender</title>

  <body>

    <div class="nav-bar">
      <?php include"cabecera.php";?>      
    </div>
    <div id="sidebar" class="sidebar-close">
      <?php include"sidebar.php";?>     
    </div>
    <div id="content-wrapper" class="content-wrapper-close">
      <div class="content-header"><i class="fas fa-coins"></i> Ventas</div>
      
      <div class="content-body full">
        <div class="Box-Info alto" data-alto="100" >
          <div class="Box-Body alto" data-alto="96">
            <table border="0px"  style="width: 100%;" class="alto" data-alto="100" >
              <tr>
                <td style="width: 60%;">
                  <input class="form-control" type="text" placeholder="Buscar" onkeyup="FiltroLi(this,'filtro');">
                  <div style="width: 100%; overflow-y: scroll; padding: 10px;" class="alto" data-alto="100">
                    <!--<table id="tab_productos" class="table table-striped alto"  data-alto="100" ></table>-->
                    <ul class="users-list clearfix"  id="list"></ul>
                  </div>
                  
                </td>
                <td style="width: 40%;">
                  <div class="alto" data-alto="100" data-menos="56" style="width: 100%; overflow-y: scroll;">
                    <input type="text" class="form-control" id="cliente" placeholder="Nombre del Cliente" />
                    <table class="table table-striped" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>Descripción</th>
                          <th>Modelo</th>
                          <th>Precio</th>
                          <th>Opciones</th>
                        </tr> 
                      </thead>
                      <tbody id="table_pedido"></tbody>
                    </table>
                  </div>
                  <div class="Box-Header " style="vertical-align: bottom;">
                    <font class="content-header"><i class="fas fa-shopping-cart"></i> Pedido </font>
                     <button onclick="CerrarVenta();" class="btn btn-success float-right" >Total:&nbsp;<i class="fas fa-coins"></i> <span id="total">0.0</span></button>
                  </div>
                </td>
              </tr>
            </table>
            
          </div>
                 
        </div> 

      </div>

       

      <!-- Modal Cargar gastos-->
      <div class="modal fade" id="gastom">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4  class="modal-title">Cargar en Gasto</h4>
              <button type="button" class="close" onclick="closemodal('gastom');">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body ">
            

            </div            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button onclick="CargarGasto();" type="button" class="btn btn-info" data-dismiss="modal-pregunta">Crear</button>

              <button type="button" class="btn btn-danger" onclick="closemodal('gastom');">Cancelar</button>
            </div>
            
          </div>
        </div>
      </div>

    </div>

    <!-- Modal Imagenes-->
        <div class="modal fade" id="imagenesm">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">              
              
              <div class="modal-body" style="background-color: #282923;">
                <button type="button" class="close " onclick="closemodal('imagenesm');">&times;</button>
                <br>
                <div id="demo" class="carousel slide" data-ride="carousel">

                  <!-- Indicators -->
                  <ul class="carousel-indicators" id="indicators">
                    <!--
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                  -->
                  </ul>
                  
                  <!-- The slideshow -->
                  <div class="carousel-inner" id="carousel">
                    <!--
                      <div class="carousel-item active">
                      <img src="images/catalogo/REM1979_1.webp" alt="REM1979" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                      <img src="images/catalogo/REM1979_1.webp" alt="REM1979" width="1100" height="500">
                    </div>

                    <div class="carousel-item">
                      <img src="images/catalogo/REM1979_2.webp" alt="REM1979" width="1100" height="500">
                    </div>
                  </div>-->
                  
                  <!-- Left and right controls -->
                  
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>



       

  </body>
  <script type="text/javascript">GetInventarioVentas();</script> 
  <script type="text/javascript"></script>
  
</html>