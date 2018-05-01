<?php 

/*
MODELO PARA LA CONECCION A LA BASE DE DATOS

*/

class ConexionModels
{
	public function conexionModel()
	{
		$host = "host=localhost;";
		$database = "dbname=despegacms";
		$username = "root";
		$pass = "";

		#OBJETO PDO PARA MANEJO DE DB
		$conectado = new PDO("mysql:".$host.$database, $username, $pass);

		return $conectado;
	}
}
