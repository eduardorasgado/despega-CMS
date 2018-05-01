<?php 

/*
MODELO QUE PERMITE INGRESO DE USUARIO EN BACKEND

*/

class IngresoAdminModels
{
	public function ingresoAdminModel($datos, $tabla)
	{
		
		$query = "SELECT usuario, password, intentos FROM $tabla WHERE usuario = :usuario";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		$stmt->execute();

		$pileUser = $stmt->fetch();

		$stmt = null;

		return $pileUser;
	}

	public function intentosAdminModel($datos,$tabla)
	{
		$query = "UPDATE $tabla SET intentos = :intentos WHERE usuario = :usuario";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":intentos", $datos["intentos"], PDO::PARAM_INT);

		if ($stmt->execute())
		{
			$stmt = null;
			return true;
		}
		else
		{
			#cerrando conexiones abiertas a la DB
			$stmt = null;
			return false;
		}
	}
}