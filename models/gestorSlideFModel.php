<?php 

require_once("backend/models/conexionBModel.php");

class slideModels
{
	public function showSlidesInViewModel($tabla)
	{
		$query = "SELECT id, ruta, titulo, descripcion FROM $tabla ORDER BY orden ASC";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		if ($stmt->execute())
		{		
			//Entregando todos los slides
			$data = $stmt->fetchAll();
			$stmt = null;
			return $data;
		}
		return false;
	}
}