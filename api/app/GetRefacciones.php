<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class GetRefacciones{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Refacciones();
		}

		public function Refacciones(){
			$id_coordinador=base64_decode($_SESSION['ref']);

			$sql="SELECT * from refacciones ";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

	}


?>