<?php
require_once"funciones/funciones.php";
include "app/Conexion.php";

class Ingresar{

	
	private $mysqli=null;
	
	public function __construct(){
		//$this->mysqli=new Conexion::Conectar();
		if(!isset($_SESSION['data'])){
			$mysql=new Conexion();
			$this->mysqli=$mysql->Conectar();
			$this->Usuarios();
		}else{
			echo '{"response":"1"}';
		}
	}

	private function Usuarios(){

		$user=Inyeccion(param('user'),$this->mysqli);
		$pass=Inyeccion(param('pass'),$this->mysqli);
		
		$sql="SELECT * from clientes where user='$user' and pass='$pass' ";
		if($rows=$this->mysqli->query($sql))
		{
			$this->Log_Usuarios($rows,$user,$pass);
		}else{
			echo '{"response":"0","porque":"¡No existe registro!"}';
		}
		
		
		
	}

	private function Log_Usuarios($rows,$user,$pass){

				
		
		if($row=$rows->fetch_array(MYSQLI_ASSOC)){
			//echo json_encode($row);
			if($user==$row['user'] && $pass==$row['pass']){
				$_SESSION['user']=base64_encode($row['user']);
				$_SESSION['nombre']=base64_encode($row['nombre']);
				$_SESSION['foto']=base64_encode($row['foto']);
				$_SESSION['data']=base64_encode($row['data']);
				$_SESSION['ref']=base64_encode($row['id_cliente']);
				$_SESSION['tipo']=base64_encode('1');
				echo '{"response":"1"}';

			}else{
				echo '{"response":"0","porque":"¡Error en los datos!"}';
			}
		}else{
			echo '{"response":"0","porque":"¡Error en los datos!"}';
		}
	}

	
	


}


?>