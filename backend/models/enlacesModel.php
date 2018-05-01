<?php 

/**
* 
CLASE QUE PERMITE GESTIONAR E INDEXAR LOS URL
*/
class enlacesPaginas
{
	public function enlacesPaginasModel($enlace)
	{
		
		if ($enlace == "admin")
		{
			return "backend/index.php"
		}
		else
		{
			return "index.php"
		}
		
	}
}