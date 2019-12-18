<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class BorrarRefaccion{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Borrar();
		}

		public function Borrar(){
			$id_refaccion=param('id_refaccion');
			if(Verificar("SELECT * from inventario where id_refaccion = '$id_refaccion' ",$this->mysqli)){

				$sql="DELETE from refacciones where id_refaccion = '$id_refaccion' ";

				if($this->mysqli->query($sql)){

					echo ('{"response":"1"}');
						
				}else{
					echo ('{"response":"0","porque":"No se pudo eliminar"}');
				}
			}else{
					echo ('{"response":"0","porque":"No se pudo eliminar, porque tiene refacciones en inventario."}');
				}

			



			
			
		}

	}


?>