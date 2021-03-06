<?php 
require_once "conexionBModel.php";
class slideModels
{
	//traer la base de datos para traer imagen
	public function mostrarImagenModel($ruta, $tabla)
	{
		$query = "SELECT id, ruta FROM $tabla WHERE ruta=:ruta";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);

		$stmt->execute();

		//Entregando el slide especifico
		$data = $stmt->fetch();
		$stmt = null;
		return $data;
	}

	//Para subir la imagen slide (ruta) a la db
	public function subirImagenSlideModel($ruta, $tabla)
	{

		$query = "INSERT INTO $tabla (ruta) VALUES (:ruta)";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);

		if ($stmt->execute()) {
			$stmt = null;
			return true;
		}
		$stmt = null;
		return false;

	}

	//traer las imagenes para mostrarlas todas
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

	//eliminar ruta del slide enviado por ajax en la db
	public function deleteSlideModel($datos, $tabla)
	{
		$query = "DELETE FROM $tabla WHERE id=:id";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":id",$datos["idSlide"], PDO::PARAM_INT);

		if ($stmt->execute()) {
			$stmt = null;
			return true;
		}
		$stmt = null;
		return false;

	}

	//actualizar slide especifico desde la DB
	public function updateSlideModel($datos, $tabla)
	{

		$query = "UPDATE $tabla SET titulo=:titulo, descripcion=:descripcion WHERE id=:id";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":id", $datos["enviarId"], PDO::PARAM_INT);
		$stmt->bindParam(":titulo", $datos["enviarTitulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["enviarDescripcion"], PDO::PARAM_STR);
		

		if ($stmt->execute()) 
		{
			$stmt = null;
			return true;
		}
		$stmt = null;
		return false;
	}

	//entregar el slide que se actualizó
	public function selectUpdatedSlide($datos, $tabla)
	{
		$query = "SELECT id, ruta, titulo, descripcion FROM $tabla WHERE id=:id";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":id", $datos["enviarId"], PDO::PARAM_INT);

		if ($stmt->execute()) {
			$slideData = $stmt->fetch();
			$stmt = null;
			return $slideData;
		}
		return false;
	}

	//orden de los items
	public function orderSlideAjaxModel($datos, $tabla)
	{
		$query = "UPDATE $tabla SET orden=:orden WHERE id=:id";
		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":id",$datos["almacenarOrdenId"],PDO::PARAM_INT);
		$stmt->bindParam(":orden",$datos["ordenItem"],PDO::PARAM_INT);

		if ($stmt->execute()) 
		{
			$stmt = null;
			return true;
		}
		$stmt = null;
		return false;
	}
}