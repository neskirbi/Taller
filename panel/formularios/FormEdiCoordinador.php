<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="modal-title" class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="Box-Primary">
           
            <div id="Box-Body" class="Box-Body">
              <form id="Usuario">
                <div class="form-group">
                  <center><img id="preview" src="https://cdn.pixabay.com/photo/2017/01/25/17/35/picture-2008484_960_720.png" width="40%" onclick="CargarImagen(this);" style="cursor: pointer;"><br>
                    <input onchange="VerImagen(this);" type="file" style="visibility: hidden;" class="form-control" name="foto" id="foto">
                    <input type="text"  name="foto64" id="foto64" style="visibility: hidden;" />
                    <input type="text"  name="foto_name" id="foto_name" style="visibility: hidden;" />
                  </center>
                </div>

                <div class="form-group">
                  <label class="">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                 
                </div>

                <div class="form-group">
                  <label class="">Telefono</label>
                  <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
                 
                </div>

                <div class="form-group">
                  <label class="">Correo</label>
                  <input type="text" class="form-control" name="mail" id="mail" placeholder="Correo">
                 
                </div>

                <div class="form-group">
                  <label class="">Usuario</label>                                    
                 
                  <div class="width-100">
                    <input type="text" class="form-control" name="user" id="user" placeholder="Usuario">
                  </div>
                </div>

                <div class="form-group">
                  <label class="">Contraseña</label>                                    
                 
                  <div class="width-100">
                    <input type="text" class="form-control" name="pass" id="pass" placeholder="Contraseña">
                  </div>
                </div>
              </form> 
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="enviar" type="button" class="btn btn-primary" onclick="Actializar_Usuario();">Enviar</button>
          <button id="cancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      
    </div>