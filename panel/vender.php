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
      <div class="content-header"><i class="fa  fa-bar-chart"></i> Panel</div>
      <div class="content-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="Box-Info h500-overflow">
                <div class="Box-Header content-header with-bborder">
                  <i class="fas fa-tools"></i> Refacciones
                </div>
                <div class="Box-Body">
                  <input class="form-control" type="text" placeholder="Buscar" onkeyup="Filtro(this,'tab_refacciones');">
                  <table id="tab_refacciones" class="table table-striped" ></table>
                </div>
                <div class="Box-Footer">
                  
                </div>        
              </div> 
            </div> 

            <div class="col-md-6 ">
              <div class="Box-Info h500-overflow" >
                <div class="Box-Header  with-bborder">
                <font class="content-header"><i class="fas fa-shopping-cart"></i> Pedido </font>
                <b class="float-right"> Total:&nbsp;<span id="total">0.0</span> </font>             
                </b>
                <div class="Box-Body alto" data-alto="80">
                  <button onclick="CerrarVenta();" class="btn btn-success float-right" ><i class="fas fa-plus"></i> Enviar</button>
                  <input type="text" class="form-control" id="cliente" placeholder="Nombre del Cliente" />                  

                  <table class="table table-striped" >
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

                </div>
                <div class="Box-Footer">
                  
                </div>        
              </div> 
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



       

  </body>
  <script type="text/javascript">GetInventarioVentas();</script> 
  <script type="text/javascript"></script>
  
</html>