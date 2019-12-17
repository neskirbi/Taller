<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class GetInventario{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Inventario();
		}

		public function Inventario(){
			$id_coordinador=base64_decode($_SESSION['ref']);

			$sql="SELECT * from inventario ";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

	}


?>