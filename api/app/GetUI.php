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

		
	}


?>