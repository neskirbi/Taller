<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class GetUI{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
		}

		public function AutoRefacciones(){
			$id_coordinador=base64_decode($_SESSION['ref']);

			$sql="SELECT * from gastos as gas join administradores as adm on adm.id_administrador=gas.id_administrador order by gas.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

	}


?>