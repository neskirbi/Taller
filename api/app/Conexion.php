<?php

class Conexion{

	private $datos=array();
	private $mysqli;

	public function __construct(){

		if(!isset($_SESSION['data'])){
			//echo"1";
			$this->datos['host']="localhost";
			$this->datos['user']="id11975811_root";
			$this->datos['pass']="ramira1983";
			$this->datos['db']="id11975811_clientes";
		}else{
			//echo"2";
			$this->datos=GetConexion();
		}
		
	
		$this->mysqli=new mysqli($this->datos['host'],$this->datos['user'],$this->datos['pass'],$this->datos['db']);

		if ($this->mysqli->connect_error) {
		    printf("Falló la conexión failed: %s\n", $this->mysqli->connect_error);
		    //return null;
		}else{
			
			//$this->Conectar();
			
		}

		
			
		

		
	}
		

	public function Conectar(){
		if($this->mysqli!==null){
			$this->mysqli->set_charset('utf8');
			//echo"Conectado";
			return $this->mysqli;
		}
		else{
			return null;
		}
	}
	

	

	
}

?>