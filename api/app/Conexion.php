<?php

class Conexion{

	private $datos=array();
	private $mysqli;

	public function __construct(){

		if($_SERVER['HTTP_HOST']==='localhost'){
		
		
			$this->datos['host']="localhost";
			$this->datos['user']="root";
			$this->datos['pass']="986532";
			$this->datos['db']="taller";
		}else{

			$this->datos['host']="localhost";
			$this->datos['user']="id11975811_taller";
			$this->datos['pass']="ramira1983";
			$this->datos['db']="id11975811_taller";
		}
/*
			
			*/
	
		

		
	
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