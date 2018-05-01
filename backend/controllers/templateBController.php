<?php 
/*

CONTROLLER TEMPLATE DE BACKEND

*/
class TemplateController
{
	public function template()
	{
		include("views/templateBack.php");
	}

	public function enlacesPaginasController()
	{
		if (isset($_POST["action"])) {
			$enlace = $_POST["action"];
			$response = enlacesPaginas::EnlacesPaginasModel($enlace);
			include $response;
		}
		else
		{
			$enlace = "";
			$response = enlacesPaginas::EnlacesPaginasModel($enlace);
			include $response;
		}
	}
}