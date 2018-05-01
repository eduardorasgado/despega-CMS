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
			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) &&
			 preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"]))
			{

				//ENCRIPTAR PASSWORD / USANDO HASH BLOWFISH
				//CARACTERES ESPECIALES NUMEROS Y MAYUSCULAS
				//$encrypted = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = [
				"usuario" => $_POST["usuarioIngreso"],
				"password" => $_POST["passwordIngreso"]
				];

				$tabla = "usuarios";

				$response = IngresoAdminModels::ingresoAdminModel($datosController, $tabla);
				
				$user = $response["usuario"];
				$pass = $response["password"];
				$intentos = $response["intentos"];
				$maximoIntentos = 4;


				if ($intentos < $maximoIntentos)
				{

					if (!empty($response))
					{
						if ($user == $datosController["usuario"] && $pass == $datosController["password"])
						{
							//INICIO DE SESSION
							//$_SESSION["validar"] = true;
							//$_SESSION["user"] = $datosController["usuario"];

							$intentos = 0;

							$datosController2 = [
								"usuario" => $user,
								"password" => $pass,
								"intentos" => $intentos
							];


							$repose = IngresoAdminModels::intentosAdminModel($datosController2, $tabla);

							//REDIRIGIR EXITOSAMENTE
							header("location:index.php?action=inicio");
						}
						else
						{
							#incremento a numero de intentos
							++$intentos;

							#Datos para actualizar intentos en la tabla y usuario
							$datosController3 = [
								"usuario" => $user,
								"intentos" => $intentos
							];

							#llamado a modelo para actualizar intentos
							$responseActualizarIntentos = IngresoAdminModels::intentosAdminModel($datosController3, "usuarios");

							#SE PROCEDE A MANDAR EL FALLO A VIEWS
							//header("location:index.php?action=index");

							echo "<div class='alert alert-danger'>Porfavor ingresa datos válidos y completos</div>";
						}
					}

				}
				else
				{
					$intentos = 0;
					#Datos para actualizar intentos en la tabla y usuario
					$datosController1 = [
						"usuario" => $usuario,
						"intentos" => $intentos
					];

					#llamado a modelo para actualizar intentos
					$responseActualizarIntentos = IngresoAdminModels::intentosAdminModel($datosController1, "usuarios");

					header("location:index.php?action=captcha");
				}

			}
			else
				{
					echo "<div class='alert alert-danger'>Porfavor ingresa datos válidos y completos</div>";
				}
			
		}
		
	}
}