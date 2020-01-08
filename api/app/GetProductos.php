<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class GetProductos{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Productos();
		}

		public function Productos(){
			$id_coordinador=base64_decode($_SESSION['ref']);

			$sql="SELECT * from productos order by descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

	}


?>