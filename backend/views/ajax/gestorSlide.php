<?php 

require_once("../../models/gestorSlideBModel.php");
require_once("../../controllers/gestorSlideBController.php");

class Ajax
{
	public $nombreImagen;
	public $imagenTemporal;

	public function gestorSlideAjax()
	{
		$datos = [
			"nombreImagen" => $this->nombreImagen,
			"imagenTemporal" => $this->imagenTemporal
		];

		$respuesta = slideControllers::mostrarImagenController($datos);
		//Mostrar imagen que estamos subiendo
		echo $respuesta;
	}
}

$a = new Ajax();
$a->nombreImagen = $_FILES["imagen"]["name"];
$a->imagenTemporal = $_FILES["imagen"]["tmp_name"];
$a->gestorSlideAjax();