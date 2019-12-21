<?php
	require_once"funciones/funciones.php";
	include "app/Conexion.php";

	class CargarFotosCatalogo{

		
		private $mysqli=null;
		
		public function __construct(){
			//$this->mysqli=new Conexion::Conectar();
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Cargar();
		}

		public function Cargar(){
			
			$id_refaccion=Inyeccion(param('id_refaccion'),$this->mysqli);
			$fotos=param('fotos');			
			
			

			if(!Verificar("SELECT id_refaccion from refacciones where id_refaccion='$id_refaccion' ",$this->mysqli)){
				
				$sql="SELECT modelo from refacciones where id_refaccion='$id_refaccion' ";
				if($query=$this->mysqli->query($sql)){
					$row=$query->fetch_array(MYSQLI_ASSOC);
						
					$fots_temp=array();
					$cont=0;
					foreach ($fotos as $key => $value) {
						//print_r($fotos[$key]);
						$path=rx_trim("../panel/images/catalogo/".$row['modelo']."_".$cont.'.jpg');
						$status = file_put_contents($path,base64_decode($fotos[$key]['foto']));
						if($status){
							$fots_temp[]='{"foto":"'.$path.'"}';
							$cont++;
						}
					
					}
					$todas="[".implode($fots_temp,",")."]";

				}
			}

				

			$sql="UPDATE refacciones set fotos='$todas' where id_refaccion='$id_refaccion'  ";



			if($this->mysqli->query($sql)){				
				
				echo ('{"response":"1"}');
				
			}else{
				echo ('{"response":"0","porque":"'.$this->mysqli->error.'"}');
			}

		
		}

	}


?>