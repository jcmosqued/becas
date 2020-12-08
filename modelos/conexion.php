<?php
class Conexion{

	public function conectar(){

		
		$con = new PDO("mysql:host=127.0.0.1;dbname=db_se_becas", "root", "", array(PDO::ATTR_ERRMODE=> PDO:: ERRMODE_EXCEPTION, PDO:: MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		
		
		/*$con = new PDO("mysql:host=localhost;dbname=wetbuy", "wetbuy", "W3tbuy", array(PDO::ATTR_ERRMODE=> PDO:: ERRMODE_EXCEPTION, PDO:: MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));*/
		
		return $con;
	}
}
