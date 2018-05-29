<?php 

require_once("conexionBModel.php");

class gestorArticlesModel
{
	public function guardarArticuloModel($datos, $tabla)
	{
		$query = "";
		$stmt = ConexionModels::conexionModel()->prepare($query);
		return true;
	}
}