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

			$sql="SELECT ref.fotos,count(inv.id_inventario) as stock,MAX(inv.precio_salida)as precio,ref.id_producto,ref.descripcion,ref.codigo,ref.modelo 
			from inventario as inv 
			join productos as ref on ref.id_producto=inv.id_producto 
			where inv.vendido = '0' group by ref.id_producto order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}	

		public function Stock(){

			$sql="SELECT count(inv.id_inventario) as stock,ref.id_producto,ref.descripcion,ref.codigo,ref.modelo from inventario as inv join productos as ref on ref.id_producto=inv.id_producto where inv.vendido = '0' group by inv.id_producto order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}		

		public function Inventario(){

			$sql="SELECT inv.id_inventario,ref.descripcion,inv.fecha,inv.precio_entrada as costo,inv.precio_salida as venta from inventario as inv join productos as ref on ref.id_producto=inv.id_producto where vendido = '0' order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function InventariopP(){
			$id_producto=param('id_producto');

			$sql="SELECT inv.id_inventario,ref.descripcion,ref.modelo,inv.precio_salida  as precio,inv.precio_salida as venta from inventario as inv join productos as ref on ref.id_producto=inv.id_producto where inv.vendido = '0' and ref.id_producto='$id_producto' order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function Ventas(){


			$sql="SELECT ven.id_venta,ven.nombre,sum(precio_entrada)as costo,sum(precio_salida)as venta,count(inv.id_inventario)as piezas,ven.fecha from ventas as ven join inventario as inv on inv.id_venta = ven.id_venta group by ven.id_venta order by ven.fecha asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function GetVentaspP(){

			$sql="SELECT inv.id_inventario,ref.descripcion,inv.fecha,inv.precio_entrada as costo,inv.precio_salida as venta from inventario as inv join productos as ref on ref.id_producto=inv.id_producto where vendido = '1' order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

	}


?>