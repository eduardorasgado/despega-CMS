<?php 
/**
* 
CONTROLADOR QUE PERMITE GESTIONAR E INDEXAR LOS URL
*/

class EnlacesControllers
{
	public function enlacesController()
	{
		$enlace = "";

		if (isset($_GET["action"])) 
		{
			$enlace = $_GET["action"];			
		}
		else
		{
			$enlace = "index";
		}

		$response = EnlacesModels::enlacesModel($enlace);
			
		include $response;
	}
}