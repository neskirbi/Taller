<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class BorrarProducto{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Borrar();
		}

		public function Borrar(){
			$id_producto=param('id_producto');
			if(Verificar("SELECT * from inventario where id_producto = '$id_producto' ",$this->mysqli)){

				$sql="DELETE from productos where id_producto = '$id_producto' ";

				if($this->mysqli->query($sql)){

					echo ('{"response":"1"}');
						
				}else{
					echo ('{"response":"0","porque":"No se pudo eliminar"}');
				}
			}else{
					echo ('{"response":"0","porque":"No se pudo eliminar, porque tiene pruductos en inventario."}');
				}

			



			
			
		}

	}


?>