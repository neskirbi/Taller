<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class CargarGasto{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Cargar();
		}

		public function Cargar(){
			$id_gasto=uuid();
			$id_administrador=base64_decode($_SESSION['ref']);
			$descripcion=Inyeccion((param('descripcion')),$this->mysqli);
			$salida=strtoupper(Inyeccion(param('salida'),$this->mysqli));			
			$fecha_gasto=strtoupper(Inyeccion(param('fecha_gasto'),$this->mysqli));
			$fecha=fechahora();
			

			$sql="INSERT INTO gastos (id_gasto,id_administrador,descripcion,salida,fecha_gasto,fecha) values ('$id_gasto','$id_administrador','$descripcion','$salida','$fecha_gasto','$fecha') ";

			if($this->mysqli->query($sql)){
				
				
				echo ('{"response":"1"}');
				
			}else{
				echo ('{"response":"0","porque":"'.$this->mysqli->error.'"}');
			}
		}

	}


?>