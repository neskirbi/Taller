<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class GetData{

		
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
			$fecha=Inyeccion(param('fecha'),$this->mysqli);
			
			if($fecha==""){
				$fecha=fecha();
			}
			$where=" where year(inv.fecha)='".date("Y",strtotime ($fecha))."' and month(inv.fecha)='".date("m",strtotime ($fecha))."' ";

			$sql="SELECT inv.id_inventario,inv.fecha,inv.precio_entrada as costo,sum(inv.precio_salida) as venta 
				from inventario as inv 
				join productos as ref on ref.id_producto=inv.id_producto $where
				group by year(inv.fecha),month(inv.fecha),day(inv.fecha)
				order by inv.fecha asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function InventarioMes(){
			$fecha=Inyeccion(param('fecha'),$this->mysqli);
			
			if($fecha==""){
				$fecha=fecha();
			}
			$where=" where year(inv.fecha)='".date("Y",strtotime ($fecha))."' ' ";

			$sql="SELECT inv.id_inventario,inv.fecha,inv.precio_entrada as costo,sum(inv.precio_salida) as venta 
				from inventario as inv 
				join productos as ref on ref.id_producto=inv.id_producto $where  
				group by year(inv.fecha),month(inv.fecha)
				order by inv.fecha asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function InventariopP(){
			$id_producto=param('id_producto');

			$sql="SELECT inv.id_inventario,ref.descripcion,ref.modelo,inv.precio_salida  as precio,inv.precio_salida as venta from inventario as inv join productos as ref on ref.id_producto=inv.id_producto where inv.vendido = '0' and ref.id_producto='$id_producto' order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function Ventas(){
			$fecha=Inyeccion(param('fecha'),$this->mysqli);
			if($fecha==""){
				$fecha=fecha();
			}
			$where=" where year(ven.fecha)='".date("Y",strtotime ($fecha))."' and month(ven.fecha)='".date("m",strtotime ($fecha))."' ";
			


			$sql="SELECT ven.id_venta,ven.nombre,sum(precio_entrada)as costo,sum(precio_salida)as venta,count(inv.id_inventario)as piezas,ven.fecha from ventas as ven join inventario as inv on inv.id_venta = ven.id_venta $where group by year(ven.fecha),month(ven.fecha),day(ven.fecha) order by ven.fecha asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}
		public function VentasMes(){
			$fecha=Inyeccion(param('fecha'),$this->mysqli);
			
			if($fecha==""){
				$fecha=fecha();
			}
			$where=" where year(ven.fecha)='".date("Y",strtotime ($fecha))."'  ";


			$sql="SELECT ven.id_venta,ven.nombre,sum(precio_entrada)as costo,sum(precio_salida)as venta,count(inv.id_inventario)as piezas,ven.fecha from ventas as ven join inventario as inv on inv.id_venta = ven.id_venta $where group by year(ven.fecha),month(ven.fecha) order by ven.fecha asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

		public function GetVentaspP(){

			$sql="SELECT inv.id_inventario,ref.descripcion,inv.fecha,inv.precio_entrada as costo,inv.precio_salida as venta from inventario as inv join productos as ref on ref.id_producto=inv.id_producto where vendido = '1' order by ref.descripcion asc";	

			GetRowsJson($this->mysqli->query($sql));

			
		}

	}


?>