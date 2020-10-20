<?php
	
	// class Conectar {
		
	// 	public static function conexion(){
			
	// 		$conexion = new mysqli("localhost", "root", "", "siccc");
	// 		return $conexion;
			
	// 	}
	// }

	class Connect extends PDO{
		public function __construct(){
			parent::__construct("mysql:host=localhost;dbname=siccc", 'root', '',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
	}
	
?>