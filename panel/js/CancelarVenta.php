<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class CancelarVenta{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Cancelar();
		}

		public function Cancelar(){
			$id_inventario=param('id_inventario');
			
			$sql="UPDATE inventario set id_venta = '', vendido='0' where id_inventario='$id_inventario' ";

			if($this->mysqli->query($sql)){

				echo ('{"response":"1"}');
					
			}else{
				echo ('{"response":"0","porque":"No se pudo eliminar"}');
			}
			

			



			
			
		}

	}


?>