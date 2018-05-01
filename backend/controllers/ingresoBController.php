<?php 

/*
CONTROLADOR QUE PERMITE INGRESO DE USUARIO EN BACKEND

*/

class ingresoAdminControllers
{
	public function ingresarController()
	{
		$datosController = [
			"usuario" => $_POST["usuarioIngreso"],
			"password" => $_POST["passwordIngreso"]
		];

		$response = IngresoAdminModels::ingresoAdminModel($datosController);
		
		$user = $response["usuario"];
		$pass = $response["password"];

		if (!empty($response)) {
			if ($user == $datosController["usuario"] && $pass == $datosController["password"]) {
				header("location:index.php?action=inicio");
			}
			else
			{
				echo "Error al ingresar";
			}
		}
		else
		{
			echo "Porfavor ingresa datos válidos";
		}
	}
}