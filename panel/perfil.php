<?php
include"../api/funciones/funciones.php";
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
   <?php include"header.php";?>
	<title></title>

<body>

  <div class="nav-bar">
    <?php include"cabecera.php";?>      
  </div>
  <div id="sidebar" class="sidebar-close">
    <?php include"sidebar.php";?>     
  </div>
  <div id="content-wrapper" class="content-wrapper-close">
    <div class="content-header">
      <i class="fa fa-user"></i> Perfil 
    </div>
    
    <div class="content-body">

      <div class="col-md-3">

        <div class="Box-Primary">
          <div class="Box-Header"></div>
          <div class="Box-Body">
            <img class="profile-user-img img-circle" src="" id="foto" alt="User profile picture">

            <h3 class="profile-username text-center" id="nombre">Undefined</h3>

            <!--<p class="text-muted text-center" id="ult_ingreso">0000-00-00 00:00:00</p>-->

            <ul class="list-group list-group-unbordered">              
              <li class="list-group-item">
                <b>Telefono</b> <a class="pull-right" id="telefono">Undefined</a>
              </li>
              <li class="list-group-item">
                <b>E-mail</b> <a class="pull-right" id="mail">Undefined</a>
              </li>
              <li class="list-group-item">
                <b>Usuario</b> <a class="pull-right" id="user">Undefined</a>
              </li>
              <li class="list-group-item">
                <b>Contraseña</b> <a class="pull-right" id="pass">Undefined</a>
              </li>

              <!--<li class="list-group-item">
                <b>Asistencia</b> <a class="pull-right" id="asistencia">NaN%</a>
              </li>             
              <li class="list-group-item">
                <b>Tarea</b> <a class="pull-right" id="tarea">NaN%</a>
              </li>
              <li class="list-group-item">
                <b>Tiempo</b> <a class="pull-right" id="tiempo">0<sup style="">&nbsp;</sup></a>
              </li>-->
            </ul>
          </div>
          <div class="Box-Footer"></div>
        </div>   
      </div>

      <div class="col-md-9">

        <div class="Box-Primary">
          <div class="Box-Header"></div>
          <div class="Box-Body">
            <div id="content" style="height: 575px; width: 100%;"></div>
          </div>
          <div class="Box-Footer"></div>
        </div>   
      </div>
      
    </div>
  </div>
  

</body>
<script type="text/javascript">
  //var id_usuario="<?php echo $_POST['id']; ?>";
  $( document ).ready(function() {

	  CargarPerfil("<?php echo $_POST['id']; ?>");
    setInterval(  function() { Rastreando("<?php echo $_POST['id']; ?>"); }, 1000);
    
  });
</script>
</html>