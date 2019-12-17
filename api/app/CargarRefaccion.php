<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class CargarRefaccion{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Cargar();
		}

		public function Cargar(){
			$codigo=Inyeccion((param('codigo')),$this->mysqli);
			$descripcion=Inyeccion(param('descripcion'),$this->mysqli);			
			$modelo=Inyeccion(param('modelo'),$this->mysqli);
			$id_refaccion=uuid();
			$fecha=fechahora();
			

			$sql="INSERT INTO refacciones (activo,codigo,descripcion,modelo,id_refaccion,fecha) values('1','$codigo','$descripcion','$modelo','$id_refaccion','$fecha') ";

			if($this->mysqli->query($sql)){
				
				
				echo ('{"response":"1"}');
				
			}else{
				echo ('{"response":"0","porque":"'.$this->mysqli->error.'"}');
			}
		}

	}


?>