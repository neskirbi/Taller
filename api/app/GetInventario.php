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

		public function Stock(){
			$id_coordinador=base64_decode($_SESSION['ref']);

			$sql="SELECT count(inv.id_inventario) as stock,ref.id_refaccion,ref.descripcion,ref.codigo,ref.modelo from inventario as inv join refacciones as ref on ref.id_refaccion=inv.id_refaccion where inv.vendido = '0' group by inv.id_refaccion order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}		

		public function Inventario(){
			$id_coordinador=base64_decode($_SESSION['ref']);

			$sql="SELECT inv.id_inventario,ref.descripcion,inv.fecha,inv.precio_entrada as entrada,inv.precio_salida as salida from inventario as inv join refacciones as ref on ref.id_refaccion=inv.id_refaccion where vendido = '0' order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function Ventas(){
			$id_coordinador=base64_decode($_SESSION['ref']);

			$sql="SELECT inv.id_inventario,ref.descripcion,inv.fecha,inv.precio_entrada as entrada,inv.precio_salida as salida from inventario as inv join refacciones as ref on ref.id_refaccion=inv.id_refaccion where vendido = '1' order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

	}


?>