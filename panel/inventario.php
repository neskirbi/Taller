<?php
include"../api/funciones/funciones.php";
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <?php include"header.php";?>
  <title>Inventario</title>

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
                <div class="Box-Header content-header">
                  Refacciones
                   <button type="button"  class="btn btn-primary float-right"  data-toggle="modal" data-target="#refacciones"><i class="fas fa-plus"></i> Refaccion</button>
                  
                </div>
                <div class="Box-Body">
                  <input class="form-control" type="text" placeholder="Buscar" onkeyup="FiltroRefacciones(this);">                 
                  <div id="tab_refacciones"></div>
                  
                </div>
                <div class="Box-Footer">
                  
                </div>        
              </div> 
            </div> 

            <div class="col-md-6 ">
              <div class="Box-Info h500-overflow" >
                <div class="Box-Header">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#inventario">Inventario</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#ventas">Ventas</a>
                    </li>
                    
                    
                  </ul>
                </div>
                <div class="Box-Body alto" data-alto="80">
                  

                  <!-- Tab panes -->
                  <div class="tab-content alto" data-alto="100">
                    <div id="inventario" class="container tab-pane active align-center alto " data-alto="100" >
                      <button onclick="GetRefaccionesSelect();" type="button"  class="btn btn-primary float-right"  data-toggle="modal" data-target="#inventariom"><i class="fas fa-plus"></i> Agregar</button>
                      <input class="form-control" type="text" placeholder="Buscar" onkeyup="FiltroInventario(this);">
                      <div id="tab_inventario"></div>
                      
                      
                    </div>
                    <div id="ventas" class="container tab-pane fade">
                    <input class="form-control" type="text" placeholder="Buscar" onkeyup="FiltroVentas(this);">
                      <div id="tab_ventas"></div>
                    </div>
                    
                    
                  </div>

                </div>
                <div class="Box-Footer">
                  
                </div>        
              </div> 
            </div>
          </div> 
        </div>




        <!-- Modal Cargar refacciones-->
        <div class="modal fade" id="refacciones">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4  class="modal-title">Cargar Refacción</h4>
                <button type="button" class="close" onclick="closemodal('refacciones');">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body ">
                <label>Código</label>
                <br>
                <input class="form-control" type="text" id="codigo" placeholder="Código">

                <label>Descripción</label>
                <br>
                <input class="form-control" type="text" id="descripcion" placeholder="Descripción">

                <label>Modelo</label>
                <br>
                <input class="form-control" type="text" id="modelo" placeholder="Modelo">

              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                <button onclick="CargarRefaccion();" type="button" class="btn btn-info" data-dismiss="modal-pregunta">Crear</button>

                <button type="button" class="btn btn-danger" onclick="closemodal('refacciones');">Cancelar</button>
              </div>
              
            </div>
          </div>
        </div>




        <!-- Modal Cargar refacciones-->
        <div class="modal fade" id="inventariom">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4  class="modal-title">Cargar en Inventario</h4>
                <button type="button" class="close" onclick="closemodal('inventariom');">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body ">
                <label>Refacción</label>
                <br>
                <select id="id_refaccion" class="form-control">
                  
                </select>
                <br>
                <label>Precio de Entrada</label>
                <br>
                <input class="form-control" type="number" maxlength="6" id="precio_entrada" placeholder="Precio">
                <label>Precio de Salida</label>
                <br>
                <input class="form-control" type="number" maxlength="6" id="precio_salida" placeholder="Precio">

              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                <button onclick="CargarInventario();" type="button" class="btn btn-info" data-dismiss="modal-pregunta">Crear</button>

                <button type="button" class="btn btn-danger" onclick="closemodal('inventariom');">Cancelar</button>
              </div>
              
            </div>
          </div>
        </div>



       

  </body>
  <script type="text/javascript">GetRefacciones();</script> 
  <script type="text/javascript">GetInventario();</script>
  <script type="text/javascript">GetVentas();</script>
  <script type="text/javascript"></script>
  
</html>