<?php 

/*
CONTROLADOR QUE PERMITE INGRESO DE USUARIO EN BACKEND

*/

class ingresoAdminControllers
{
	public function ingresarController()
	{
		if (isset($_POST["passwordIngreso"]) && isset($_POST["usuarioIngreso"]))
		{
			$datosController = [
				"usuario" => $_POST["usuarioIngreso"],
				"password" => $_POST["passwordIngreso"]
			];

			$response = IngresoAdminModels::ingresoAdminModel($datosController);
			
			$user = $response["usuario"];
			$pass = $response["password"];

			if (!empty($response))
			{
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
				echo "<div class='alert alert-danger'>Porfavor ingresa datos válidos y completos</div>";
			}
		}
		
	}
}