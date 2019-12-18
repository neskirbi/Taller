<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class BorrarGasto{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Borrar();
		}

		public function Borrar(){
			$id_gasto=param('id_gasto');
			
			$sql="DELETE from gastos where id_gasto = '$id_gasto' ";

			if($this->mysqli->query($sql)){

				echo ('{"response":"1"}');
					
			}else{
				echo ('{"response":"0","porque":"No se pudo eliminar"}');
			}
			

			



			
			
		}

	}


?>