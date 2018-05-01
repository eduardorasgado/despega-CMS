<?php 

/*
MODELO QUE PERMITE INGRESO DE USUARIO EN BACKEND

*/

class IngresoAdminModels
{
	public function ingresoAdminModel($datos)
	{
		
		$query = "SELECT usuario, password FROM usuarios WHERE usuario = :usuario AND password :password";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["password"], PDO::PARAM_STR);

		$pileUser = $stmt->execute();

		$stmt = null;

		return $pileUser;
	}
}