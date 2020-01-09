<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class CargarInventario{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Cargar();
		}

		public function Cargar(){
			
			$id_producto=Inyeccion((param('id_producto')),$this->mysqli);
			$precio_entrada=Inyeccion(param('precio_entrada'),$this->mysqli);
			$precio_salida=Inyeccion(param('precio_salida'),$this->mysqli);
			$cantidad=intval(Inyeccion(param('cantidad'),$this->mysqli));
			$fecha=fechahora();

			$values=array();
			for ($i=0; $i < $cantidad; $i++) { 
				//Un nuevo id_inventario por producto
				$id_inventario=uuid();
				

				$values[]="('$id_inventario','$id_producto','$precio_entrada','$precio_salida','$fecha')";
			}
			

			if(!Verificar("SELECT * from productos where id_producto = '$id_producto' ",$this->mysqli)){

				$sql="INSERT INTO inventario(id_inventario,id_producto,precio_entrada,precio_salida,fecha) values ".implode(",", $values);

				if($this->mysqli->query($sql)){			
					
					echo ('{"response":"1"}');
					
				}else{
					echo ('{"response":"0","porque":"'.$this->mysqli->error.'"}');
				}
			}else{
				echo ('{"response":"0","porque":"El producto no está en el catálogo."}');
			}
		}

	}


?>