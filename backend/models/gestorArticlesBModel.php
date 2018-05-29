<?php 

require_once("conexionBModel.php");

class gestorArticlesModel
{
	public function guardarArticuloModel($datos, $tabla)
	{
		$query = "INSERT INTO $tabla (titulo, introduccion, ruta, contenido) VALUES (:titulo, :introduccion, :ruta, :contenido)";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":introduccion", $datos["introduccion"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
		
		if ($stmt->execute()) {
			$stmt = null;
			return true;
		}
		$stmt = null;
		return false;
	}

	//traer todos los articulos para mostrarlos al
	//frontend del admin
	public function mostrarArticulosModel($tabla)
	{
		$query = "SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		if ($stmt->execute()) {
			$articlesData = $stmt->fetchAll();
			$stmt = null;
			return $articlesData;
		}
		$stmt = null;
		return false;
	}

	//borrar el articulo seleccionado
	public function borrarArticuloModel()
	{
		$query = "";
	}
}