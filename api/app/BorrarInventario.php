<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class BorrarInventario{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Borrar();
		}

		public function Borrar(){
			$id_inventario=param('id_inventario');

			$sql="DELETE from inventario where id_inventario = '$id_inventario' and vendido='0' ";

			if($this->mysqli->query($sql)){

				echo ('{"response":"1"}');
					
			}else{
				echo ('{"response":"0","porque":"No se pudo eliminar"}');
			}



			
			
		}

	}


?>