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
			$descripcion=strtoupper(Inyeccion(param('descripcion'),$this->mysqli));			
			$modelo=strtoupper(Inyeccion(param('modelo'),$this->mysqli));
			$id_refaccion=uuid();
			$fecha=fechahora();
			$fotos='[{"foto":"images/catalogo/sinfotos.png"}]';

			$sql="INSERT INTO refacciones (activo,codigo,descripcion,modelo,id_refaccion,fecha,fotos) values('1','$codigo','$descripcion','$modelo','$id_refaccion','$fecha','$fotos') ";

			if($this->mysqli->query($sql)){
				
				
				echo ('{"response":"1"}');
				
			}else{
				echo ('{"response":"0","porque":"'.$this->mysqli->error.'"}');
			}
		}

	}


?>