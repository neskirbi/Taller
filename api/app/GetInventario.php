<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class GetInventario{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
		}

		public function Inventario(){
			$id_coordinador=base64_decode($_SESSION['ref']);

			$sql="SELECT inv.id_inventario,ref.descripcion,inv.fecha,inv.precio_entrada as entrada,inv.precio_salida as salida from inventario as inv join refacciones as ref on ref.id_refaccion=inv.id_refaccion where vendido = '0' ";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function Ventas(){
			$id_coordinador=base64_decode($_SESSION['ref']);

			$sql="SELECT inv.id_inventario,ref.descripcion,inv.fecha,inv.precio_entrada as entrada,inv.precio_salida as salida from inventario as inv join refacciones as ref on ref.id_refaccion=inv.id_refaccion where vendido = '1' ";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

	}


?>