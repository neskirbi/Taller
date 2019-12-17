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
			$id_inventario=uuid();
			$id_refaccion=Inyeccion((param('id_refaccion')),$this->mysqli);
			$precio_entrada=Inyeccion(param('precio_entrada'),$this->mysqli);
			$fecha=fechahora();
			

			$sql="INSERT INTO inventario(id_inventario,id_refaccion,precio_entrada,fecha) values('$id_inventario','$id_refaccion','$precio_entrada','$fecha') ";

			if($this->mysqli->query($sql)){			
				
				echo ('{"response":"1"}');
				
			}else{
				echo ('{"response":"0","porque":"'.$this->mysqli->error.'"}');
			}
		}

	}


?>