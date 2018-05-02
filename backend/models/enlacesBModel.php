<?php 

/**
* 
MODELO QUE PERMITE GESTIONAR E INDEXAR LOS URL
*/
class EnlacesModels
{
	public function enlacesModel($enlace)
	{
		$module = "";

		if ($enlace == "inicio" ||
			$enlace == "articulos" ||
			$enlace == "galeria" ||
			$enlace == "ingreso" ||
			$enlace == "mensajes" ||
			$enlace == "perfil" ||
			$enlace == "slide" ||
			$enlace == "suscriptores" ||
			$enlace == "videos" ||
			$enlace == "salir")
		{
			$module = "views/modules/".$enlace.".php";
		}
		else if($enlace == "index")
		{
			$module = "views/modules/ingreso.php";
		}
		else if($enlace == "captcha")
		{
			$module = "views/modules/ingreso.php";
		}
		else if ($enlace == "out") {
			$module = "views/modules/ingreso.php";
		}
		else
		{
			$module = "views/modules/ingreso.php";
		}
		
		return $module;
	}
}