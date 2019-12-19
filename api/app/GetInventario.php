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


		public function StockVenta(){
			$ids=Inyeccion((param('ids')),$this->mysqli);
			$filtro="";
			/*if($ids!=''){
				$filtro=" inv.id_inventario NOT IN ($ids) and";
				
			}*/
			

			$sql="SELECT count(inv.id_inventario) as stock,MAX(inv.precio_salida)as precio,ref.id_refaccion,ref.descripcion,ref.codigo,ref.modelo from inventario as inv join refacciones as ref on ref.id_refaccion=inv.id_refaccion where $filtro inv.vendido = '0' group by inv.id_refaccion order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}	

		public function Stock(){

			$sql="SELECT count(inv.id_inventario) as stock,ref.id_refaccion,ref.descripcion,ref.codigo,ref.modelo from inventario as inv join refacciones as ref on ref.id_refaccion=inv.id_refaccion where inv.vendido = '0' group by inv.id_refaccion order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}		

		public function Inventario(){

			$sql="SELECT inv.id_inventario,ref.descripcion,inv.fecha,inv.precio_entrada as costo,inv.precio_salida as venta from inventario as inv join refacciones as ref on ref.id_refaccion=inv.id_refaccion where vendido = '0' order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function InventariopP(){
			$id_refaccion=param('id_refaccion');

			$sql="SELECT inv.id_inventario,ref.descripcion,ref.modelo,inv.precio_salida  as precio,inv.precio_salida as venta from inventario as inv join refacciones as ref on ref.id_refaccion=inv.id_refaccion where inv.vendido = '0' and ref.id_refaccion='$id_refaccion' order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function Ventas(){


			$sql="SELECT ven.id_venta,ven.nombre,sum(precio_entrada)as costo,sum(precio_salida)as venta,count(inv.id_inventario)as piezas,ven.fecha from ventas as ven join inventario as inv on inv.id_venta = ven.id_venta group by ven.id_venta";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function GetVentaspP(){

			$sql="SELECT inv.id_inventario,ref.descripcion,inv.fecha,inv.precio_entrada as costo,inv.precio_salida as venta from inventario as inv join refacciones as ref on ref.id_refaccion=inv.id_refaccion where vendido = '1' order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

	}


?>