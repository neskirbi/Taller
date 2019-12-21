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
      <div class="content-header">
      <i class="fas fa-clipboard-check"></i> Inventario</div>
      <div class="content-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="Box-Info h500-overflow">
                <div class="Box-Header content-header">
                  Refacciones
                   <button type="button"  class="btn btn-primary float-right"  data-toggle="modal" data-target="#refaccionesm"><i class="fas fa-plus"></i> Refaccion</button>
                  
                </div>
                <div class="Box-Body">
                  <input class="form-control" type="text" placeholder="Buscar" onkeyup="Filtro(this,'table_refacciones');">                 
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
                      <a class="nav-link active" data-toggle="tab" href="#stock">
                        Stock
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link " data-toggle="tab" href="#inventario">
                        Inventario
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#ventas">
                        Ventas
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#ventaspP">
                        Piezas Vendidas
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#gastos">
                        Gastos
                      </a>
                    </li>
                    
                    
                  </ul>
                </div>
                <div class="Box-Body alto" data-alto="80">
                  

                  <!-- Tab panes -->
                  <div class="tab-content alto" data-alto="100">

                    <div id="stock" class="container tab-pane active">                      
                      <input class="form-control" type="text" placeholder="Buscar" onkeyup="FiltroStock(this);">
                      <div id="tab_stock"></div>
                    </div>
                    
                    <div id="inventario" class="container tab-pane fade" data-alto="100" >
                      <!--<button onclick="GetRefaccionesSelect();" type="button"  class="btn btn-primary float-right"  data-toggle="modal" data-target="#inventariom"><i class="fas fa-plus"></i> Agregar</button>-->
                      <input class="form-control" type="text" placeholder="Buscar" onkeyup="FiltroInventario(this);">
                      <div id="tab_inventario"></div>   
                    </div>

                    <div id="ventas" class="container tab-pane fade">
                      <input class="form-control" type="text" placeholder="Buscar" onkeyup="FiltroVentas(this);">
                      <div id="tab_ventas"></div>
                    </div>

                    <div id="ventaspP" class="container tab-pane fade">
                      <input class="form-control" type="text" placeholder="Buscar" onkeyup="FiltroVentaspP(this);">
                      <div id="tab_ventaspP"></div>
                    </div>

                    <div id="gastos" class="container tab-pane fade">
                      <button type="button"  class="btn btn-primary float-right"  data-toggle="modal" data-target="#gastom"><i class="fas fa-plus"></i> Agregar</button>
                      <input class="form-control" type="text" placeholder="Buscar" onkeyup="FiltroGastos(this);">
                      <div id="tab_gastos"></div>
                    </div>
                    
                    
                  </div>

                </div>
                <div class="Box-Footer">
                  
                </div>        
              </div> 
            </div>
          </div> 
        </div>
      </div>




        <!-- Modal Cargar refacciones-->
        <div class="modal fade" id="refaccionesm">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4  class="modal-title">Cargar Refacción</h4>
                <button type="button" class="close" onclick="closemodal('refaccionesm');">&times;</button>
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

                <button type="button" class="btn btn-danger" onclick="closemodal('refaccionesm');">Cancelar</button>
              </div>
              
            </div>
          </div>
        </div>




        <!-- Modal Cargar inventario-->
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
                <input type="text" id="descripcion_temp" class="form-control">
                <input type="hidden" id="id_refaccion" class="form-control">

                <label>Precio de Costo</label>
                <input class="form-control" type="number" maxlength="6" id="precio_entrada" placeholder="Precio">

                <label>Precio de Venta</label>
                <input class="form-control" type="number" maxlength="6" id="precio_salida" placeholder="Precio">

                <label>Cantidad</label>
                <input class="form-control" type="number" id="cantidad" placeholder="Catidad" value="1">

              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                <button onclick="CargarInventario();" type="button" class="btn btn-info" data-dismiss="modal-pregunta">Crear</button>

                <button type="button" class="btn btn-danger" onclick="closemodal('inventariom');">Cancelar</button>
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
                <label>Descripción</label>                
                <input type="text" id="descripciong" class="form-control" placeholder="Descripción">

                <label>Salida</label>
                <input class="form-control" type="number" maxlength="6" id="salida" placeholder="Precio">

                <label>Fecha</label>
                <input class="form-control" type="date" id="fecha_gasto" placeholder="Precio">
 
              </div            
              <!-- Modal footer -->
              <div class="modal-footer">
                <button onclick="CargarGasto();" type="button" class="btn btn-info" data-dismiss="modal-pregunta">Crear</button>

                <button type="button" class="btn btn-danger" onclick="closemodal('gastom');">Cancelar</button>
              </div>
              
            </div>
          </div>
        </div>

        <!-- Modal Cargar fotos-->
        <div class="modal fade" id="cargafotosm">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4  class="modal-title"><i class="far fa-plus-square"></i> Cargar Fotos</h4>
                <button type="button" class="close" onclick="closemodal('cargafotosm');">&times;</button>                
              </div>

              <div style="padding: 10px;">
                <input type="text" id="descripcion_fotos" class="form-control">
                <input type="hidden" id="id_refaccion_fotos" class="form-control">
                <div class="float-right margin-top-5">
                  <button onclick="ImagMenos();" class="btn btn-danger btn-sm"><i class="fas fa-minus"></i></button>
                  <button onclick="ImagMas();" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                </div> 
              </div>
              
              <!-- Modal body -->
              <div class="modal-body align-center" id="fotos">
                <div class="margin-top-15 imgps">
                  <img id="f0" src="images/misimagenes/sinfotos.png" onclick="CargarImagen('0');" >
                  <input onchange="VerImagen(this);" id="b0" type="file" style="visibility: hidden;" />
                  <input type="hidden" id="t0" class="form-control">
                </div>
              </div>            
                
            
              <!-- Modal footer -->
              <div class="modal-footer">
                <button onclick="SubirImagenes();" type="button" class="btn btn-info" data-dismiss="modal-pregunta">Guardar</button>

                <button type="button" class="btn btn-danger" onclick="closemodal('cargafotosm');">Cancelar</button>
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
  <script type="text/javascript">GetRefacciones();</script> 
  <script type="text/javascript">GetStock();</script>
  <script type="text/javascript">GetInventario();</script>
  <script type="text/javascript">GetVentas();</script>
  <script type="text/javascript">GetVentaspP();</script>
  <script type="text/javascript">GetGastos();</script>
  <script type="text/javascript"></script>
  
</html>