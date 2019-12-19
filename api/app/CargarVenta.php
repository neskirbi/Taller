<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class CargarVenta{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Cargar();
		}

		public function Cargar(){
			$id_venta=uuid();
			$id_administrador=base64_decode($_SESSION['ref']);
			$cliente=Inyeccion((param('cliente')),$this->mysqli);			
			$ids=param('ids');
			$fecha=fechahora();
			

			$sql="INSERT INTO ventas (id_venta,fecha,nombre) values ('$id_venta','$fecha','$cliente')";

			if($this->mysqli->query($sql)){

				$sql="UPDATE inventario set id_venta = '$id_venta', vendido='1' where id_inventario in($ids) ";

				if($this->mysqli->query($sql)){
					echo ('{"response":"1"}');
				}else{
				echo ('{"response":"0","porque":"'.$this->mysqli->error.'"}');
			}
				
				
			}else{
				echo ('{"response":"0","porque":"'.$this->mysqli->error.'"}');
			}
		}

	}


?>